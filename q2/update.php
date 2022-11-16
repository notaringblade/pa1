<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
</head>
<body>
    
    <form method="POST" action="../update_script.php">
    <?php
        $username = "root";
        $password = "";
        
        $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );
        // $sid = $_POST['sid'];
    
        $que = $con -> prepare("SELECT sid,st_name,DOB,gender,contact,email,address,password FROM student_login_info WHERE sid=?");
        $que->bindParam(1,$_POST['sid']);
    
        $que->execute();
        $student = $que->fetch(PDO::FETCH_ASSOC);

        echo '<input type="hidden" name="sid" value="' .$student['sid'] .'">';

        echo '<div>
            <input name="st_name" type="text" value="' .$student['st_name'] .'" required placeholder="Enter your name">
        </div>';

        echo '<div>
            <input name="DOB" type="date" value="' .$student['DOB'] .'" required placeholder="Enter your Date of Birth">
        </div>';

        echo '<div>
            <input name="gender" type="text" value="' .$student['gender'] .'" required placeholder="Enter your gender">
        </div>';

        echo '<div>
            <input name="contact" type="tel" value="' .$student['contact'] .'" required placeholder="Enter your contact number">
        </div>';

        echo '<div>
            <input name="email" type="text" value="' .$student['email'] .'" required placeholder="Enter your email address">
        </div>';

        echo '<div>
            <input name="address" type="text" value="' .$student['address'] .'" required placeholder="Enter your current address">
        </div>';

        echo '<div>
            <input name="password" type="text" value="' .$student['password'] .'" required placeholder="Create a password">
        </div>';
    ?>
        <div>
            <button class="btn btn-dark" name = "register" type = "submit"> Update </button>
        </div>
    </form>
</body>
</html>