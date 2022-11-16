<?php
    // var_dump($_POST);
    $username = "root";
    $password = "";

    // $email = $_POST['c_email'];
    // $id = $_POST['sid'];

    $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );

    
    $que = $con -> prepare("UPDATE student_login_info SET st_name = ?, DOB =?, gender = ?, contact = ?, email = ?, address = ?, password = ? WHERE sid = ?");


    $que -> bindParam(1, $_POST['st_name']);
    $que -> bindParam(2, $_POST['DOB']);
    $que -> bindParam(3, $_POST['gender']);
    $que -> bindParam(4, $_POST['contact']);
    $que -> bindParam(5, $_POST['email']);
    $que -> bindParam(6, $_POST['address']);
    $que -> bindParam(7, $_POST['password']);  
    $que -> bindParam(8, $_POST['sid']);  

    $responseData['st_name'] = $_POST['st_name'];
    $responseData['DOB'] = $_POST['DOB'];
    $responseData['gender'] = $_POST['gender'];
    $responseData['contact'] = $_POST['contact'];
    $responseData['address'] = $_POST['address'];
    $responseData['password'] = $_POST['password'];



    $success = $que -> execute();
    if($success){
        json_encode($responseData);
        echo "<h1 style = 'color: green'> Your data has been updated </h1>";
        header('Location: admin/login.php');
    }else{
        echo "<h1 style = 'color: red'> Your data couold not be updated(check your email and password) </h1>";
    }

?>