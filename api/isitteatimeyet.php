<?php
date_default_timezone_set('America/Los_Angeles');
include('../functions.php');
$format = $_GET['format'] || 'json';
$teatime = is_teatime(getdate());

switch($format) {
  case 'json':
    echo json_encode(array('teatime' => $teatime));
    break;
  case 'xml':
    header('Content-type: text/xml');
    $xml_teatime = $teatime ? 'true' : 'false';
    $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<teatime>
  <$xml_teatime />
</teatime>
XML;
    echo $xml;
    break;
  default:
    header("HTTP/1.0 406 Not Acceptable");
    echo "Invalid format";
    die();
}
