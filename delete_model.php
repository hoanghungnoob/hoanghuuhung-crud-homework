<?php
include_once './database/database.php';
    $id = $_GET['id'];
    deleteStudent($id);
    header('Location: index.php');
?>