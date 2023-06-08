<?php
require_once 'Element.php';
class Container extends Element
{
    public function render()
    {
        $html = '<div ' . $this->renderParameters() . '>';
        foreach ($this->children as $child) {
            $html .= $child->render();
        }
        $html .= '</div>';
        return $html;
    }
}
