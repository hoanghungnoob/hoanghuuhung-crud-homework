<?php
    include './database/database.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['image_url'])) {
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);
        $email = htmlspecialchars($_POST['email']);
        $image_url = htmlspecialchars($_POST['image_url']);
    
        $result = createStudent($name, $age, $email, $image_url);
    
        if ($result) {
            echo "Student created successfully";
            header('Location: index.php');
        } else {
            echo "Error creating student";
        }
    }