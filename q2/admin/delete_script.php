<?php
    // var_dump($_POST);
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );

    // $email = $_POST['email'];

    
    $que = $con -> prepare("DELETE from student_login_info  WHERE sid = ?");

    // $que -> bindParam(1, $_POST['password']);
    $que -> bindParam(1, $_GET['id']);

    // $que -> execute();

    $success = $que -> execute();

    if($success){

        echo "<h1 style = 'color: green'> Student has been removed </h1>";
        header('Location: login.php');
        
    }else{
        echo "<h1 style = 'color: red'> Student could not be found </h1>";
        
    }

?>