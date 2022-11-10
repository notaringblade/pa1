<?php 
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );

    $que = $con -> prepare("INSERT INTO student_login_info (st_name, DOB, gender, contact, email, address, password) values(?,?,?,?,?,?,?) ");

    $que -> bindParam(1, $_POST['st_name']);
    $que -> bindParam(2, $_POST['DOB']);
    $que -> bindParam(3, $_POST['gender']);
    $que -> bindParam(4, $_POST['contact']);
    $que -> bindParam(5, $_POST['email']);
    $que -> bindParam(6, $_POST['address']);
    $que -> bindParam(7, $_POST['password']);

    $success = $que -> execute();

    if($success){
        echo '<h1 style = "color: green;" > Registered Successfully </h1>';   
    }else{
        echo '<h1 style = "color: red;" > Failed Successfully </h1>';   
    }

    var_dump($_POST);

?>