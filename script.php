<?php


$name = $_POST['name'];
$email = $_POST['email'];

$class= 'SYBVoc';

$output = array("name"=>$name,"email"=>$email,"class"=>$class);

echo json_encode($output);

?>