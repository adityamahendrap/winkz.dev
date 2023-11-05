<?php 
    session_start();
    
    include 'begin.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
      
    $query = "INSERT INTO inbox VALUES(null, '$name', '$email', '$message', 0, null)";
    $executed_query = mysqli_query($connection, $query);  

    if ($executed_query) {
        $_SESSION['message'] = 'Your message has been recorded, thank you!🎯';
    } else {
        $_SESSION['message'] = 'Something went wrong';
    }

    header('Location: /prognet/#contact');
    exit(); 
?>
