<?php
class Card
{
    private $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function render($info)
    {
        $IMG = "data:image/jpeg;base64," . base64_encode($info["IMG"]);
        return "
        <div class=\"rounded-lg relative overflow-hidden center text-white mx-7 mb-7\">
            <a href=\"placeinfo.php?place_id={$info["ID"]}\">
                <img class=\"hover:scale-105 transition ease-in-out delay-150 object-cover drop-shadow-2xl w-full h-32\" src=\"{$IMG}\"/>
            </a>
        </div>
        ";
    }
}
?>