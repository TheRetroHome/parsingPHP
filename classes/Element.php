<?php
abstract class Element
{
protected $payload;
protected $parameters;
protected $children;

public function __construct($payload, $parameters, $children)
{
$this->payload = $payload;
$this->parameters = $parameters;
$this->children = $children;
}

abstract public function render();
protected function renderParameters()
{
    $htmlParameters = '';
    $cssParameters = '';
    foreach ($this->parameters as $key => $value) {
        // проверяем, является ли параметр CSS-свойством
        if (in_array($key, ['fontSize', 'textAlign', 'size', 'style', 'textColor', 'backgroundColor', 'zoom'])) {
            // преобразуем имя параметра к правильному CSS-свойству
            $cssName = str_replace(['fontSize', 'textAlign', 'textColor', 'backgroundColor'], ['font-size', 'text-align', 'color', 'background-color'], $key);
            if ($key == 'size') {
                $cssParameters .= 'font-size: ' . htmlspecialchars($value) . '; ';
            } elseif ($key == 'zoom') {
                $cssParameters .= 'zoom: ' . htmlspecialchars($value) . '; ';
            } else {
                $cssParameters .= $cssName . ': ' . htmlspecialchars($value) . '; ';
            }
        } else {
            $htmlParameters .= $key . '="' . htmlspecialchars($value) . '" ';
        }
    }

    if (!empty($cssParameters)) {
        $htmlParameters .= 'style="' . $cssParameters . '"';
    }

    return $htmlParameters;
}
    
}
