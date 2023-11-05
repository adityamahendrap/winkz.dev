<?php 
    session_start();
    
    include 'begin.php';
    $message = $_POST['message'];
      
    $query = "UPDATE inbox SET message = '$message' WHERE id = " . $_POST['id'];
    $executed_query = mysqli_query($connection, $query);  

    if ($executed_query) {
        $_SESSION['message'] = 'Message updated ';
    } else {
        $_SESSION['message'] = 'Something went wrong';
    }

    header('Location: /prognet/admin/inbox');
    exit(); 
?>
