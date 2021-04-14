<?php

chdir('..');
include_once 'services/classesService.php';
extract($_POST);

$fs = new classesService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new classes(0, $code, $filiere));
    } elseif ($op == 'update') {
        $fs->update(new classes($id, $code, $filiere));
    } elseif ($op == 'delete') {
        $fs->delete($id);
    }elseif ($op == 'countFonction') {
        header('Content-type: application/json');
        echo json_encode($fs->countByFonction());
        $r = false;
    }
}else if($op == '' && isset($idfilier)){
    echo json_encode($fs->findByIdFiliere($idfilier));
}else{
  echo json_encode($fs->findAll());
}

header('Content-type: application/json');
?>
