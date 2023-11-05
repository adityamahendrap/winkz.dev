<?php
  session_start();

  include 'begin.php';
  $id = $_GET['id'];
  $query = "DELETE FROM inbox WHERE id = $id";
  $executed_query = mysqli_query($connection, $query);  

  if ($executed_query) {
    $_SESSION['message'] = 'Message has been deleted';
  } else {
    $_SESSION['message'] = 'Something went wrong';
  }

  header('Location: /prognet/admin/inbox');
  exit();
?>