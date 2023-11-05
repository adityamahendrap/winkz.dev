<?php

session_start();
if (isset($_SESSION['message'])) {
  echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';
  unset($_SESSION['message']);
}

if ($_SESSION['authenticated']) {
  header("Location: /prognet/admin/inbox");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>winkz.dev</title>
  <link rel="stylesheet" href="/prognet/lib/swiper-bundle.min.css" />
  <link rel="stylesheet" href="/prognet/assets/style.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    :root {
      --first-color: hsl(var(--hue-color), 69%, 61%);
      --title-color: hsl(var(--hue-color), 8%, 15%);
      --text-color: hsl(var(--hue-color), 20%, 45%);
    }

    .section {
      display: flex;
      margin-top: 0.5rem;
      flex-direction: column;
      gap: 2rem;
      margin-top: 9rem;
    }

    .card {
      max-width: 500px;
      margin: auto;
      padding: 20px;
      position: relative;
    }

    .title {
      font-size: 16px;
      color: var(--text-color);
      font-weight: normal;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 2.5px solid var(--first-color);
      border-radius: 4px;
      resize: vertical;
      margin-top: 12px;
    }
  </style>
</head>

<body oncontextmenu="return false">
  <header class="header" id="header">
    <nav class="nav container">
      <a href="/prognet/" class="nav-logo">winkz.dev</a>
    </nav>
  </header>

  <section class="section">
    <div class="card">
      <h1 class="title">Please input <span style="color: var(--first-color); font-weight: bold;">secret key</span> to access admin page</h1>
      <form action="/prognet/command/check_secret_key.php" method="POST">
        <input type="password" name="key" placeholder="Type something here...">
        <button class="button button--flex" style="margin-top: 15px; float: right;">Submit
          <div class="uil uil-message button-icon"></div>
        </button>
      </form>
    </div>
  </section>

  <script type="text/javascript" src="/prognet/lib/swiper-bundle.min.js"></script>
  <script src="/prognet/assets/main.js"></script>
</body>

</html>