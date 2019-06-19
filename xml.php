<?php 

Header("Content-Type: text/xml");

$excal = mysqli_connect("localhost","root","","rdsolutions");

//build query
$query = 
  "SELECT 
 *
  FROM crud_users";

$result = mysqli_query($excal, $query);

$_xml = '<?xml version="1.0" encoding="utf-8"?>';

$_xml .= "<employees>";
while($row = mysqli_fetch_array($result)){
	$_xml .= "<employee>";
	$_xml.= "<id>".$row['id']."</id>";
	$_xml.= "<name>".$row['name']."</name>";
	$_xml.= "<email>".$row['email']."</email>";
	$_xml.= "</employee>";
}
$_xml .="</employees>";
//var_dump(mysqli_fetch_array($result));
$xmlobj = new SimpleXMLElement($_xml);
print $xmlobj ->asXML();
