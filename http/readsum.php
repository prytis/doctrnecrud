<?php
include_once "bootstrap.php";  
$_POST = json_decode(array_keys($_POST)[0], true);
 
if(isset($_POST['name']))
{
  if ($_POST['name'] ==='project') 
  {
  $proj = $entityManager->getRepository('Couple')->findAll();
  $data = [];
    foreach($proj as $elem)
    {
      $line = array("id" => $elem->getPerson() , "name" => $elem->getTool());
      array_push($data, $line);
    }
  }
}
echo json_encode($data);