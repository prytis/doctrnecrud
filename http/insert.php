<?php
include_once "bootstrap.php";
$_POST = json_decode(array_keys($_POST)[0], true);


if(isset($_POST['name']))
{
    if ($_POST['table'] === 'members')
    {
        $person = new Persons();
        $person->setPersonName($_POST['name']);
        $entityManager->persist($person);
        $entityManager->flush();
        echo $person->getPersonId();
    }
    if ($_POST['table'] === 'projects')
    {
        $tool = new Tool();
        $tool->setName($_POST['name']);
        $entityManager->persist($tool);
        $entityManager->flush();
        echo $tool->getId();
    }
}