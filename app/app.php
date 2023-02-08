<?php
    if (isset($_POST['title'])){
        require '../connect.php';
        $title = $_POST['title'];
        if (empty($title)) {
            header("location: ../index.php?mess=error");
        }
        else {
            $stmt = $conn -> prepare("INSERT INTO todos(title) VALUE(?)");
            $res = $stmt -> execute([$title]);

            if($res) {
                header("location: ../index.php?mess=success");
            }
            $conn = null;
            exit();
        }
    } else {
        header("location: ../index.php?mess=error");
    }
?>