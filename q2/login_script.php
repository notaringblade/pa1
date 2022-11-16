<?php 
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );

    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $con->prepare("SELECT * FROM student_login_info WHERE email=? AND password=$password ");
    // $stmt -> bindParam(1, $_POST['email']);
    $stmt->execute([$email]); 
    $user = $stmt->fetch();
    $i = 0;
    $st_id = "";

    if ($user) {
        echo '<h1 style = "color: green">  Logged in Successfully  </h1>';
        $stmt -> execute();
        $st_id = $user['sid'];
        // var_dump($stmt -> fetchAll());

        $rowarray = $stmt->fetchall(PDO::FETCH_ASSOC);
        echo "<h1> User Info: </h1>";
        foreach ($rowarray as $row) {
            echo "<tr>";
            echo "<h4> Name:   " .$row["st_name"]. " </h4>";
            echo "<h4> DOB:  " .$row["DOB"]. " </h4>";
            echo "<h4> Gender:  " .$row["gender"]. " </h4>";
            echo "<h4> Contact Number:  " .$row["contact"]. " </h4>";
            echo "<h4> Email:  " .$row["email"]. " </h4>";
            echo "<h4> Address:  " .$row["address"]. " </h4>";

            echo "</tr>";         
        }  


        

        
        
    } else {
        echo 'This Account does not exist' .'<a href="login.php"> try again? </a>';
    } 
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>

        <style> 
            td{
                text-align: center;
            }
        </style>
</head>
<body>
    <table border="1" cellpadding="1" cellspacing="2">
        <tr>
            <th>Student Name</th>
            <th>Paper Name</th>
        </tr>
        <?php 
        $que = $con->prepare("SELECT student_login_info.st_name, paper_details.paper_name FROM student_login_info,paper_details,student_paper WHERE student_paper.sid=student_login_info.sid AND student_paper.pid = paper_details.pid AND student_login_info.sid = $st_id;");
        
        $que -> execute();
        
        $papers = $que -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($papers as $paper){
            echo "<tr>";
            echo "<td>" .$paper["st_name"]. " </td>";
            echo "<td>" .$paper["paper_name"]. " </td> </br> ";
            echo "</tr>";
        }
        
        ?>
    </table>
        <a href = 'update.php'> update your info </a>
</body>
</html>
