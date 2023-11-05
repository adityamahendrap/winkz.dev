<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['key'] === 'zkniw') {
    $_SESSION['authenticated'] = true;
    header('Location: /prognet/admin/inbox/');
  } else {
    $_SESSION['authenticated'] = false;
    $_SESSION['message'] = 'Incorrect secret key';
    header('Location: /prognet/admin/');
  }
}
?>
