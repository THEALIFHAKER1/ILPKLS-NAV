<?php
// Include head.php, PlacesCard.php, and MemosCard.php files
include 'Components/head.php';
include 'Components/PlacesCard/PlacesCard.php';
include 'Components/MemosCard/MemosCard.php';

// Use prepared statements to prevent SQL injection attacks
$stmt = $con->prepare("SELECT * FROM places LIMIT ?, ?");
$stmt->bind_param("ii", $offset, $limit);

$offset = 0;
$limit = 10;

$stmt->execute();
$result = $stmt->get_result();

$rowcount = $result->num_rows;
?>

<style>
  /* Add styles for tabs */
  .tab-container {
    display: flex;
    /* Change flex direction to row on desktop */
    flex-direction: row;
  }

  .tab-button {
    cursor: pointer;
    padding: 10px;
    background-color: #ddd;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
  }

  .tab-content {
    display: none;
    /* Adjust width for desktop */
    width: 50%;
    /* You can adjust this based on your layout needs */
  }

  .tab-content.active {
    display: block;
  }

  /* Add media query for mobile */
  @media screen and (max-width: 768px) {
    .tab-container {
      flex-direction: column;
    }

    .tab-content {
      width: 100%;
      /* Make each section take full width on mobile */
    }

    .scrollbars {
      height: calc(100vh - 20rem);
    }
  }

  .button-container {
    display: flex;
    justify-content: center;
    padding-left: 30px;
  }

  /* Add styles for search bar */
  .search-container {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
    padding-top: 10px;
  }

  .search-input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 50%;
    margin-right: 10px;
  }

  .search-button {
    cursor: pointer;
    padding: 10px;
    background-color: #ddd;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .card {
    display: block;

  }
</style>
<div class="fade">
  <!-- Search bar -->
  <div class="search-container">
    <input type="text" class="search-input" id="searchInput" placeholder="Search...">
    <div class="search-button" onclick="search()">Search</div>
  </div>

  <!-- Tabs -->
  <div class="tab-container">
    <div class="button-container">
      <div class="tab-button mr-5" onclick="openTab('placesTab')">Places</div>
      <div class="tab-button" onclick="openTab('memosTab')">Memos</div>
    </div>

    <!-- Places tab -->
    <div class="tab-content" id="placesTab">
      <h1 class="text-xl text-white font-bold ml-10 mb-7">PLACES [
        <?php echo $rowcount; ?> ]
      </h1>
      <div class="overflow-y-auto h-[calc(100vh-10rem)] scrollbars">
        <?php while (
          $info = $result->fetch_assoc()
        ) { ?>
          <?php
          $component = new PlacesCard($info);
          echo '<div class="card">' . $component->render($info) . '</div>';
          ?>
        <?php } ?>
      </div>
    </div>

    <!-- Memos tab -->
    <div class="tab-content" id="memosTab">
      <?php
      // Use lazy loading to load data only when it is needed
      $limit = 5;
      $offset = 0;
      $stmt = $con->prepare("SELECT * FROM memos LIMIT ?, ?");
      $stmt->bind_param("ii", $offset, $limit);

      $stmt->execute();
      $result = $stmt->get_result();

      $rowcount = $result->num_rows;
      ?>
      <h1 class="text-xl text-white font-bold ml-10 mb-7">MEMOS [
        <?php echo $rowcount; ?> ]
      </h1>
      <div class="overflow-y-auto h-[calc(100vh-10rem)] scrollbars">
        <?php while (
          $info = $result->fetch_assoc()
        ) { ?>
          <?php
          $TAG = $info["TAG"];
          $tagdata = mysqli_query($con, "SELECT * FROM tags WHERE TAG='$TAG'");
          $taginfo = mysqli_fetch_array($tagdata);
          $component = new MemosCard($info, $taginfo);
          echo '<div class="card">' . $component->render($info, $taginfo) . '</div>';
          ?>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- JavaScript code -->
<script>
  // Search function
  function search() {
    var searchInput = document.getElementById('searchInput').value;
    var tabContent = document.querySelectorAll('.tab-content.active');

    tabContent.forEach(function (tab) {
      var cards = tab.querySelectorAll('.card');

      cards.forEach(function (card) {
        var cardText = card.innerText.toLowerCase();
        if (cardText.includes(searchInput.toLowerCase())) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  }

  // Open tab function
  function openTab(tabName) {
    var i, tabContent;

    // Hide all tab content
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
      tabContent[i].classList.remove("active");
    }

    // Show the selected tab content
    document.getElementById(tabName).classList.add("active");
  }

  // Update tab display function
  function updateTabDisplay() {
    var tabs = document.querySelectorAll('.tab-content');
    var buttons = document.querySelectorAll('.tab-button');

    if (window.innerWidth > 767) {
      tabs.forEach(function (tab) {
        tab.classList.add('active');
      });
      buttons.forEach(function (button) {
        button.style.display = 'none';
      });
    } else {
      tabs.forEach(function (tab) {
        tab.classList.remove('active');
      });
      buttons.forEach(function (button) {
        button.style.display = 'block';
      });

      // Add this line to show the default "Places" tab on mobile
      document.getElementById('placesTab').classList.add('active');
    }
  }

  // Call openTab function to initially show the "Places" tab
  openTab("placesTab");

  // Check window width and update tab display
  window.addEventListener('resize', updateTabDisplay);

  // Trigger the resize event once to set the initial state
  window.dispatchEvent(new Event('resize'));
</script>

<?php
// Include foot.php file
include 'Components/foot.php';
?>