<?php 

$excal = mysqli_connect("localhost","root","","rdsolutions");

//build query
$query = 
  "SELECT 
  *
  FROM crud_users";

$rsPackages = mysqli_query($excal,$query);

$arRows = array();
while ($row_rsPackages = mysqli_fetch_assoc($rsPackages)) {
  array_push($arRows, $row_rsPackages);
}

header('Content-type: application/json');
echo json_encode($arRows);
