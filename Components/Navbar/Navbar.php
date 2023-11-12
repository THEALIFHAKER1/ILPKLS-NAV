<?php
class Navbar
{
    private $links;

    public function __construct($links)
    {
        $this->links = $links;
    }

    public function render()
    {
        $navLinks = '';
        foreach ($this->links as $link) {
            $navLinks .= "<a href='{$link['url']}'>{$link['text']}</a>";
        }

        return "<nav>{$navLinks}</nav>";
    }
}
?>