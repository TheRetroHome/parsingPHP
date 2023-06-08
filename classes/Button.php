<?php
require_once 'Element.php';
class Button extends Element
{
    public function render()
    {
        $text = isset($this->payload['text']) ? $this->payload['text'] : '';
        $link = isset($this->payload['link']['payload']) ? $this->payload['link']['payload'] : '#';
        return '<a href="' . htmlspecialchars($link) . '" ' . $this->renderParameters() . '>' . htmlspecialchars($text) . '</a>';
    }
}