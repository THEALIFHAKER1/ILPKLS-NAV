<?php
class MyComponent
{
    private $property;

    public function __construct($property)
    {
        $this->property = $property;
    }

    public function render()
    {
        return "<div>{$this->property}</div>";
    }
}
?>