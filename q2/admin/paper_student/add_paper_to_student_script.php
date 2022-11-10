<?php
    // var_dump($_POST);
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );



    $que = $con ->prepare("SELECT * FROM student_paper where sid=? AND pid=?");

    $que -> bindParam(1, $_POST['sid']);
    $que -> bindParam(2, $_POST['pid']);

    $que -> execute();
    $success = $que -> fetch();

    if($success){
        echo '<h1 style="color: red"> this student has already been enrolled in this subjects paper';
    }else if(!$success){
        $que2 = $con -> prepare("INSERT INTO student_paper (sid, pid) values(?,?)");

        $que2 -> bindParam(1, $_POST['sid']);
        $que2 -> bindParam(2, $_POST['pid']);

        $que2 -> execute();
        echo '<h1 style="color: green"> this student has been enrolled successfully';

        // var_dump($_POST);
    }

    

?>