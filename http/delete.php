<?php
include_once "bootstrap.php";
$_POST = json_decode(array_keys($_POST)[0], true);

if(isset($_POST['name']))
{
    if ($_POST['table'] === 'members')
    {
        $person=$entityManager->find('Persons',$_POST['name']);
        $entityManager->remove($person);
        $entityManager->flush();
    }
    if ($_POST['table'] === 'projects')
    {
        $tool=$entityManager->find('Tool',$_POST['name']);
        $entityManager->remove($tool);
        $entityManager->flush();
    }
}
