<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page(ADMIN)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
    <style>
        td,th{
            padding: 10px 5px;
        }

        button{
            background: none;
            border: 0;
            outline: none;
        }
    </style>
</head>
<body>
    
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <form method="POST" action="login_script.php">
        
        <div>
            <input name = "paper_name" type = "text" required placeholder="Enter paper name">
        </div>
        
        <div>
            <input name = "paper_code" type = "number" required placeholder="Enter paper code">
        </div>

        <div>
            <input name = "course_name" type = "text" required placeholder="Enter course name">
        </div>

        <div>
            <input name = "max_marks" type = "number" required placeholder="Enter max marks">
        </div>

        <div>
            <input name = "semester" type = "text" required placeholder="Enter semester name">
        </div>
        <div>
            <button class="btn btn-dark" name = "login" type = "submit"> login </button>
        </div>
</form>


<table border="1" cellpadding="0" cellspacing="1">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>DOB</th>
    <th>Gender</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Address</th>
    <th>Update</th>
    <th>Delete</th>
</tr>

<!-- <i class="fa-solid fa-pen-to-square"></i> -->

<?php

    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );

    $que = $con -> prepare("SELECT sid,st_name,DOB,gender,contact,email,address FROM student_login_info");

    $que->execute();
    $students = $que->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($students as $student){
        echo "<tr>";
        echo "<td>" .$student["sid"] ."</td>";
        echo "<td>" .$student["st_name"] ."</td>";
        echo "<td>" .$student["DOB"] ."</td>";
        echo "<td>" .$student["gender"] ."</td>";
        echo "<td>" .$student["contact"] ."</td>";
        echo "<td>" .$student["email"] ."</td>";
        echo "<td>" .$student["address"] ."</td>";
        //edit
        echo '<td><form action="../update.php" method="POST"><input type="hidden" naxampxme="sid" value="' .$student["sid"] .'">
        <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button></form></td>';
        echo "<td><a href='delete_script.php?id=" .$student["sid"] ."'><i class='fa-solid fa-trash'></i></a></td>";
        //add papers
        // echo '<td>
        // <form action="../update.php" method="POST">
        // <input type="hidden" name="sid" value="' .$student["sid"] .'">
        // <button type="submit">
        // <i class="fa-solid fa-pen-to-square"></i>
        // </button>
        // </form>
        // </td>';
       
        echo "</tr>";
    }
?>

</table>
   
<a href="./paper_student/add_paper_to_student.php">enroll students</a>

</body>
</html>