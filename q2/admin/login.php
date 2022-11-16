<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page(ADMIN)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

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
    
  <!-- <s   cript src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <form method="POST" id = "gawd">
        
        <div>
            <input id = "paper_name" type = "text" required placeholder="Enter paper name">
        </div>
        
        <div>
            <input id = "paper_code" type = "number" required placeholder="Enter paper code">
        </div>

        <div>
            <input id = "course_name" type = "text" required placeholder="Enter course name">
        </div>

        <div>
            <input id = "max_marks" type = "number" required placeholder="Enter max marks">
        </div>

        <div>
            <input id = "semester" type = "text" required placeholder="Enter semester name">
        </div>
        <div>
            <button class="btn btn-dark" name = "login" type = "submit"> Create Paper </button>
        </div>
</form>
<div id="success"></div>


<button onclick="sendUpdate(60)" class="btn">
    click me gend
</button>


<button onlick="sendUpdate(27)" class="gend"> gg</button>

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
<div id = "update_success"></div>
<div id="gawd_update_success">

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
        // echo '<td><input type="number"  id="st_id_"  value="' .$student["sid"] .'">
        // <button onclick="sendUpdate(s)" ><i class="fa-solid fa-pen-to-square"></i></button></td>';
        // echo "<td><button onclick='deleteData()' id='del_id' value=".$student["sid"]."><i class='fa-solid fa-trash'></i></button></td>";
        // echo "</tr>";


        //  '<td><input type="number"  id="st_id_"  value="' .$student["sid"] .'">
        // <button onclick="sendUpdate(s)" ><i class="fa-solid fa-pen-to-square"></i></button></td>';
        // echo "<td><button onclick='deleteData()' id='del_id' value=".$student["sid"]."><i class='fa-solid fa-trash'></i></button></td>";
        // echo "</tr>"\;


        $templateUpdate = "<td><input type=\"number\" id=\"%s\" value=\"%s\" > <button onclick=\"sendUpdate(%s)\" class=\"gend\"><i class=\"fa-solid fa-pen-to-square\"></i></button></td>";


        $templateDelete = "<td><input type=\"number\" id=\"%s\" value=\"%s\" > <button onclick=\"deleteData(%s)\" class=\"gend\"><i class=\"fa-solid fa-trash\"></i></button></td></tr>";

        echo sprintf($templateUpdate,$student['sid'],$student['sid'],$student['sid']);
        echo sprintf($templateDelete,$student['sid'],$student['sid'],$student['sid']);
        

        //     echo sprintf("<button onclick=\"sendUpdate(%s)\" class=\"btn\">click me gend</button>",$gend);


        // $template = "<td><input type='number'  id='st_id_'  value=' .$student["sid"] .'">
        // <button onclick="sendUpdate(s)" ><i class="fa-solid fa-pen-to-square"></i></button></td>';
        // echo "<td><button onclick='deleteData()' id='del_id' value=".$student["sid"]."><i class='fa-solid fa-trash'></i></button></td>";
        // echo "</tr>"
        // sprintf();
    }
    
    ?>
    </div>

</table>
   
<a href="./paper_student/add_paper_to_student.php">enroll students</a>

<script>
    $("#gawd")[0].addEventListener("submit", function(e){
        e.preventDefault();
        var paper_name = $("#paper_name").val();
        var paper_code = $("#paper_code").val();
        var course_name = $("#course_name").val();
        var max_marks = $("#max_marks").val();
        var semester= $("#semester").val();

        $.ajax({
            type: "POST",
            url: "login_script.php",
            data: {paper_name, paper_code, course_name, max_marks, semester},

            success: function(data){
                console.log(data)

                $("#success").html(data);
            }
        })
    })
</script>

<script>
    function sendUpdate(id){
        // console.log(gend);

        console.log(id)
        var sid = id;

        // var sid= $("#st_id").val();
        console.log(id);
        $.ajax({
            type: "POST",
            url: "../update.php",
            data: {sid},
            // dataType: "json",
            success: function(data){
                // console.log(data);
                // window.location = "../update.php";
                $("#update_success").html(data);
                $("#gawd_update_success").html("");
            }
        })
    }
</script>

<script>
    function deleteData(id){
        console.log(id)

        // var sid= $("#del_id").val();
        // console.log(sid);
        // $.ajax({
        //     type: "POST",
        //     url: "delete_script.php",
        //     data: {sid},
        //     // dataType: "json",
        //     success: function(data){
        //         console.log(data);
        //         window.location = "delete_script.php";
        //         // $("#update_success").html(data);
        //         // $("#gawd_update_success").html("");
        //     }
        // })
    }
</script>

</body>
</html>