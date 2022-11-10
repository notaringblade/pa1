<?php 
    

    $number = $_POST['number'];

    if(is_numeric($number)){
        if ($number == 100){
            echo '<h2> Your Number:' .$number  .', is equal to 100 </h2>'; 
        }else if($number > 100){
            echo '<h2> Your number: ' .$number .', is greater than 100 </h2>'; 
        }else if($number < 100){
            echo '<h2> Your Number:' .$number .', is less than 100 </h2>'; 
        }
    }else {
        echo ' <h2> not a number please try again </h2>';
        
    }
    echo '<a href="q1.php"> try again </a>';
?>