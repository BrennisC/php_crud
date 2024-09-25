<?php
include("db.php");


if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $descriptions = $_POST['description'];

    $query = "INSERT INTO task(title, descriptions) VALUES ('$title', '$descriptions')";

    $result = mysqli_query($cont, $query);

    if (!$result) {
        die('Query Failed');
    }

    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';


    header('Location: index.php');
}
