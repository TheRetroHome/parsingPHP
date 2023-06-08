<?php
require_once 'Container.php';
require_once 'Block.php';
require_once 'Text.php';
require_once 'Image.php';
require_once 'Button.php';

class ElementFactory
{
    public static function createElement($data)
    {
        $payload = isset($data['payload']) ? $data['payload'] : [];
        $parameters = isset($data['parameters']) ? $data['parameters'] : [];
        $children = isset($data['children']) ? $data['children'] : [];
        $children = array_map([ElementFactory::class, 'createElement'], $children);

        switch ($data['type']) {
            case 'container':
                return new Container($payload, $parameters, $children);
            case 'block':
                return new Block($payload, $parameters, $children);
            case 'text':
                return new Text($payload, $parameters, $children);
            case 'image':
                return new Image($payload, $parameters, $children);
            case 'button':
                return new Button($payload, $parameters, $children);
            default:
                throw new Exception('Invalid element type: ' . $data['type']);
        }
    }
}
