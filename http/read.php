<?php
include_once "bootstrap.php";  
$_POST = json_decode(array_keys($_POST)[0], true);
 
if(isset($_POST['name']))
{
  if ($_POST['name'] ==='project') 
  {
  $proj = $entityManager->getRepository('Tool')->findAll();
  $data = [];
    foreach($proj as $elem)
    {
      $line = array("id" => $elem->getId() , "name" => $elem->getName());
      array_push($data, $line);
    }
  }
  if ($_POST['name'] ==='members')
  {
    $persons = $entityManager->getRepository('Persons')->findAll();
    $data = [];
    foreach($persons as $person)
    {
      $line = array("id" => $person->getPersonId(), "name" => $person->getPersonName() );
      array_push($data, $line);
    }
  }
}
echo json_encode($data);
