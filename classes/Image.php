<?php
require_once 'Element.php';
class Image extends Element
{
    public function render()
    {
        $imageUrl = isset($this->payload['image']['url']) ? $this->payload['image']['url'] : '';
        return '<img src="' . htmlspecialchars($imageUrl) . '" ' . $this->renderParameters() . '>';
    }
}