<?php
require_once 'classes/ElementFactory.php';

$json = file_get_contents('data.json');
$data = json_decode($json, true);
$element = ElementFactory::createElement($data);
$html = $element->render();
echo $html;
