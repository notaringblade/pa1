<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <div>
        <h1>Add papers</h1>
        <div>
            <form method="POST" id="gawd"> 
            <?php 
                 $username = "root";
                 $password = "";
             
                 $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );
             
                 $que = $con -> prepare("SELECT sid,st_name,DOB,gender,contact,email,address FROM student_login_info");

                 $que -> execute();

                 $student = $que -> fetchAll(PDo::FETCH_ASSOC);

                 $selectedValue;

                //  echo '<div class="dropdown">';

                //  echo '<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Student
                //  <span class="caret"></span></button>';

                //  echo '<ul class="dropdown-menu">';
                 echo "<h3> Select Students </h3>";   
                echo "<SELECT name='sid'>";
                 foreach($student as $students){
                    echo "<OPTION id='sid' value=".$students["sid"] ."> " .$students["st_name"] ."</OPTION>"; 
                    
                }
                echo "</SELECT>";
                // '</ul>';
                // echo '</div>'


            ?>
        </br>
            <?php 
                //  $username = "root";
                //  $password = "";
             
                //  $con = new PDO("mysql:host=localhost;dbname=student_registry", $username, $password );
             
                 $que2 = $con -> prepare("SELECT * FROM paper_details");

                 $que2 -> execute();

                 $paper = $que2 -> fetchAll(PDo::FETCH_ASSOC);

                 
                 echo "<h3> Select papers </h3>";   
                 echo "<SELECT name='pid'>";
                 foreach($paper as $papers){
                    
                    echo "<OPTION id='pid' value=".$papers["pid"] ."> " .$papers["paper_name"] ."</OPTION>";
                }
                echo "</SELECT>";
                
            ?>
            <div></br></div>
                        <button class="btn btn-dark" type="submit" > enroll </button>

            </form> 
        </div>
    </div>
    <script>
        $("#gawd")[0].addEventListener("submit", function(e){
        e.preventDefault();
            var pid = $("#pid").val();
            var sid = $("#sid").val();

            $.ajax({
                type: "POST",
                url: "add_paper_to_student_script.php",

                data: {pid, sid},

                success: function(data){
                    console.log(data);
                }
            })
        })
    </script>
</body>
</html>