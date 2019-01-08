<?php

chdir('..');
include_once 'services/FonctionService.php';
extract($_POST);

$fs = new FonctionService();

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new Fonction(0, $code, $nom));
    } elseif ($op == 'update') {
        $fs->update(new Fonction($id, $code, $nom));
    } elseif ($op == 'delete') {
        $fs->delete($id);
    }
}

header('Content-type: application/json');
echo json_encode($fs->findAll());

