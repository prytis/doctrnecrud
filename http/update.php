<?php
include_once "bootstrap.php";
$_POST = json_decode(array_keys($_POST)[0], true);
    
if ( $_POST['table'] === 'members') 
{
    $person=$entityManager->find('Persons',$_POST['id']);
    $person->setPersonName($_POST['name']);
    $entityManager->flush();
    echo '1000';
}

if ( $_POST['table'] === 'projects') 
{
    $tool=$entityManager->find('Tool',$_POST['id']);
    $tool->setName($_POST['name']);
    $entityManager->flush();
    echo '2000';
}

if ( $_POST['selected'] === 'YES') 
{
    $_SESSION['selected'] = $_POST['id'];
    $_SESSION['name'] = $_POST['name'];
    // $sql_insert = "INSERT INTO projectmembers (`projId`) VALUES ('$proj_id')";
    // $conn->query($sql_insert);
    echo $_SESSION['selected'];
}
if ( $_POST['memberselected'] === 'YES') 
{
    $proj_name = $_SESSION['name'];
    $proj_id = $_SESSION['selected'];
    $proj_member_id = $_POST['memberid'];

    $tool = $entityManager->find('Tool',$proj_id);
    // $person = $entityManager->find('Persons',$proj_member_id);
    // $couple = new Couple($tool,$person);
    // $entityManager->persist($couple);
    // $entityManager->flush();
    echo json_encode($couple->getPerson());
}
