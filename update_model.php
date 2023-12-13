<?php
include './database/database.php';
$id = intval($_POST['id']);
$newValues = array(
    'name' => htmlspecialchars($_POST['name']),
    'age' => htmlspecialchars($_POST['age']),
    'email' => htmlspecialchars($_POST['email']),
    'profile' => htmlspecialchars($_POST['image_url'])
);

$result = updateStudent($id, $newValues);

if ($result) {
    header('Location: index.php');
} else {
    echo "Error updating student";
}
?>