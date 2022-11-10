<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <form method="POST" action="register_script.php">
        <div>
            <input name ="st_name" type = "text" required placeholder="Enter your name">
        </div>
        <div>
            <input name = "DOB" type = "date" required placeholder="Enter your Date of Birth">
        </div>
        <div>
            <input name = "gender" type = "text" required placeholder="Enter your gender">
        </div>
        <div>
            <input name = "contact" type = "tel" required placeholder="Enter your contact number">
        </div>
        <div>
            <input name = "email" type = "text" required placeholder="Enter your email address">
        </div>
        <div>
            <input name = "address" type = "text" required placeholder="Enter your current address">
        </div>
        <div>
            <input name = "password" type = "password" required placeholder="Create a password">
        </div>
        <div>
            <button class="btn btn-dark" name = "register" type = "submit"> Register </button>
        </div>
        <div>
            <a href = "login.php"> Login </a>
        </div>      
    </form>
</body>
</html>