<?php

chdir('..');
include_once 'services/DepartementService.php';
extract($_POST);

$ds = new DepartementService();

if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Departement(0, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new Departement($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($ds->delete($id));
    }
}

header('Content-type: application/json');
echo json_encode($ds->findAll());
