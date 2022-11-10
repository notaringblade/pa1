<?php 
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );

    $que = $con -> prepare("SELECT * FROM paper_details where paper_name=? paper_code=? course_name=? semester=?");
            $que -> bindParam(1, $_POST['paper_name']);
            $que -> bindParam(2, $_POST['paper_code']);
            $que -> bindParam(3, $_POST['course_name']);
            $que -> bindParam(4, $_POST['semester']);
            // $que -> bindParam(5, $_POST['paper_code']);
            // $que -> bindParam(6, $_POST['semester']);
            // $que -> bindParam(7, $_POST['paper_name']);
            // $que -> bindParam(8, $_POST['semester']);

    $que -> execute();
    $papers = $que -> fetch();

    if($papers){
        echo "<h1 style = 'color: red'> Record Already Exists </h1> ";
        
    }else{

        $que2 = $con -> prepare("INSERT INTO paper_details (paper_name, paper_code, course_name, max_marks, semester) values(?,?,?,?,?) ");
        
            $que2 -> bindParam(1, $_POST['paper_name']);
            $que2 -> bindParam(2, $_POST['paper_code']);
            $que2 -> bindParam(3, $_POST['course_name']);
            $que2 -> bindParam(4, $_POST['max_marks']);
            $que2 -> bindParam(5, $_POST['semester']);
        
            $success = $que2 -> execute();
        
            if($success){
                echo '<h1 style = "color: green;" >Paper Registered Successfully </h1>';   
            }else{
                echo '<h1 style = "color: red;" > Paper did not register Successfully </h1>';   
            }
    }
?>


