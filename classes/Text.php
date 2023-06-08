<?php
require_once 'Element.php';
class Text extends Element
{
    public function render()
    {
        $text = isset($this->payload['text']) ? $this->payload['text'] : '';
        return '<p ' . $this->renderParameters() . '>' . htmlspecialchars($text) . '</p>';
    }
}