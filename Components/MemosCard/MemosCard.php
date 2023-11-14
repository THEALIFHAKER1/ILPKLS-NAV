<?php
class MemosCard
{
    private $info, $taginfo;

    public function __construct($info, $taginfo)
    {
        $this->info = $info;
        $this->taginfo = $taginfo;
    }

    public function render($info, $taginfo)
    {
        return "
        <div class='relative drop-shadow-2xl center rounded-lg mx-7 mb-7 p-5 bg-gray-400'>
          <div class='h-5 w-10 rounded-full' style='{$this->taginfo["COLOR"]}'>
            <p class='pl-11 text-white pb-3'>{$this->info["TAG"]}</p>
          </div>
          <div class='font-black text-white bg-gray-600 px-2 pt-2 rounded-t-lg inline-block mt-3'>
            {$this->info["TITLE"]}
          </div>
          <div class='text-white bg-gray-600 p-2 rounded-b-lg rounded-tr-lg'>
            {$this->info["CONTENT"]}<br>
          </div>
          <div class='bg-gray-600 w-40 rounded-lg text-white mt-3 px-2'>
            {$this->info["DATE"]}
          </div>
        </div>
        ";
    }
}
?>