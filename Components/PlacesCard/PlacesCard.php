<?php
class PlacesCard
{
    private $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function render($info)
    {
        $IMG = "data:image/jpeg;base64," . base64_encode($info["IMG"]);
        $status = $this->info['STATUS'];
        $datesHtml = '';
        if ($status === 'CLOSE') {
            $statusClass = 'bg-red-500';
            $DATES = $this->info['DATES'];
            $DATEE = $this->info['DATEE'];
            $datesHtml = "{$DATES} > {$DATEE}";
        } else {
            $statusClass = 'bg-green-500';
        }

        return "
    <div class=' rounded-lg relative overflow-hidden center text-white mx-7 mb-7'>
        <a href='placeinfo.php?place_id={$this->info['ID']}'>
            <img class='hover:scale-105 transition ease-in-out delay-150 object-cover drop-shadow-2xl w-full h-32' src='{$IMG}'/>
        </a>
        <div class=' absolute top-3 text-black left-4 font-black px-2 bg-white rounded-lg'>
            {$this->info['NAMES']}
        </div>
        <div class='absolute  left-4 top-10 rounded-lg px-2 {$statusClass}'>
            {$status} {$datesHtml}
        </div>
    </div>
    ";
    }
}
?>