<?php
include 'begin.php';

$query = "SELECT * FROM inbox";
$executed_query = mysqli_query($connection, $query);
$inbox = mysqli_fetch_all($executed_query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>winkz.dev</title>
  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="inbox.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body oncontextmenu="return false">
  <header class="header" id="header">
    <nav class="nav container">
      <a href="#" class="nav-logo">winkz.dev</a>
    </nav>
  </header>

  <section class="section">
    <?php foreach ($inbox as $message) : ?>
      <div class="outside-card">
        <div class="card">
          <h1 class="title"><?= $message['name'] ?></h1>
          <p class="email"><?= $message['email'] ?></p>
          <p><?= $message['message'] ?></p>
          <p class="time"><?= $message['created_at'] ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </section>

  <!--================== SCROLL TOP ==================-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="uil uil-arrow-up scrollup-icon"></i>
  </a>

  <script type="text/javascript" src="swiper-bundle.min.js"></script>
  <script src="main.js"></script>
</body>

</html>