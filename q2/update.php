<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> -->

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
<div id="success">
    </div>
    <form method="post" id= "gawd2">
    <?php
        $username = "root";
        $password = "";
        
        $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );
        // $sid = $_POST['sid'];
    
        $que = $con -> prepare("SELECT sid,st_name,DOB,gender,contact,email,address,password FROM student_login_info WHERE sid=?");
        $que->bindParam(1,$_POST['sid']);
    
        $que->execute();
        $student = $que->fetch(PDO::FETCH_ASSOC);

        echo '<input type="hidden" id="sid" value="' .$student['sid'] .'">';

        echo '<div>
            <input id="st_name" type="text" value="' .$student['st_name'] .'" required placeholder="Enter your name">
        </div>';

        echo '<div>
            <input id="DOB" type="date" value="' .$student['DOB'] .'" required placeholder="Enter your Date of Birth">
        </div>';

        echo '<div>
            <input id="gender" type="text" value="' .$student['gender'] .'" required placeholder="Enter your gender">
        </div>';

        echo '<div>
            <input id="contact" type="tel" value="' .$student['contact'] .'" required placeholder="Enter your contact number">
        </div>';

        echo '<div>
            <input id="email" type="text" value="' .$student['email'] .'" required placeholder="Enter your email address">
        </div>';

        echo '<div>
            <input id="address" type="text" value="' .$student['address'] .'" required placeholder="Enter your current address">
        </div>';

        echo '<div>
            <input id="password" type="text" value="' .$student['password'] .'" required placeholder="Create a password">
        </div>';
    ?>
        <div>
            <button class="btn btn-dark"  type = "submit"> Update </button>
        </div>
    </form>

    <script> 
        $("#gawd2")[0].addEventListener("submit", function(e){
            e.preventDefault();
            var st_name = $("#st_name").val();
            var DOB = $("#DOB").val();
            var gender = $("#gender").val();
            var contact = $("#contact").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var psswd = $("#password").val();
            var sid = $("#sid").val();
            // console.log("Executed");

                $.ajax({
                    type: "POST",
                    url: "../update_script.php",
                    // dataType: "json",
                    data: {st_name: st_name, DOB: DOB, gender: gender, contact: contact, email: email, address:address, password: psswd, sid: sid},
                    success: function(data){
                        console.log(data);
                        // var str = "Name: Registered successfully";
                        // $("#success").html(data);
                        if(data.success){
                            let responseData = JSON.parse(data.responseData)
                            let st_name = data.responseData.st_name;
                            let DOB = data.responseData.DOB;
                            let gender = data.responseData.gender;
                            let contact = data.responseData.contact;
                            let address = data.responseData.address;
                            let password = data.responseData.password;

                        }
                    }
                });
    })

    </script>
</body>
</html>