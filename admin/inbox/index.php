<?php
include '../../command/begin.php';

session_start();

if (!$_SESSION['authenticated']) {
  $_SESSION['message'] = 'You are not authorized to access this page';
  header("Location: /prognet/admin/");
}

if (isset($_SESSION['message'])) {
  echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';
  unset($_SESSION['message']);
}

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
  <link rel="stylesheet" href="/prognet/lib/swiper-bundle.min.css" />
  <link rel="stylesheet" href="/prognet/assets/style.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    :root {
      --first-color: hsl(var(--hue-color), 69%, 61%);
      --title-color: hsl(var(--hue-color), 8%, 15%);
    }

    .section {
      display: flex;
      margin-top: 0.5rem;
      flex-direction: column;
      gap: 2rem;
    }

    .outside-card {
      padding: 0rem 1rem;
    }

    .card {
      border: 2.5px solid var(--first-color);
      border-radius: 10px;
      max-width: 500px;
      margin: auto;
      padding: 20px;
      box-shadow: 0 0.2rem 0.2rem rgba(0, 0, 0, 0.15) !important;
      position: relative;
    }

    .title {
      color: var(--first-color);
    }

    .email {
      font-size: small;
      line-height: 0px;
      margin-bottom: 1rem;
    }

    .time {
      font-size: small;
      margin-top: 1rem;
      text-align: right;
    }

    .textarea {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
    }

    .replied-pos {
      position: absolute;
      left: 10px;
      top: -16px;
      color: var(--first-color);
    }

    .delete-btn {
      position: absolute;
      right: -30px;
      top: 10px;
      color: var(--first-color);
      cursor: pointer;
    }

    .edit-pos {
      position: absolute;
      right: -32px;
      top: 40px;
      color: var(--first-color);
      cursor: pointer;
    }

    .hidden {
      display: none;
    }

    .button-sm {
      display: inline-block;
      background-color: var(--first-color);
      color: #fff;
      padding: 0.5rem;
      border-radius: 0.5rem;
      cursor: pointer;
      margin-top: 0.5rem;
    }

    form {
      text-align: right;
    }
  </style>
</head>

<body oncontextmenu="return false">
  <header class="header" id="header">
    <nav class="nav container">
      <a href="/prognet/" class="nav-logo">winkz.dev</a>
      <div class="nav-menu" id="nav-menu">
        <ul class="nav-list grid">
          <li class="nav-item">
            <a href="" class="nav-link active-link">
              <i class="uil uil-estate nav-icon"></i>Inbox
            </a>
          </li>
          <li class="nav-item">
            <a href="/prognet/command/logout.php" class="nav-link">
              <i class="uil uil-user nav-icon"></i>Logout
            </a>
          </li>
        </ul>
        <i class="uil uil-times nav-close" id="nav-close"></i>
      </div>
      <div class="nav-btns">
        <div class="nav-toggle" id="nav-toggle">
          <i class="uil uil-apps"></i>
        </div>
      </div>
    </nav>
  </header>

  <section class="section">
    <?php foreach ($inbox as $message) : ?>
      <div class="outside-card">
        <div class="card">
          <h1 class="title"><?= $message['name'] ?></h1>
          <p class="email"><?= $message['email'] ?></p>
          <p><?= $message['message'] ?></p>
          <div style="margin-top:-5px; display: flex; justify-content: space-between; align-items: center;">
            <div></div>
            <p class="time"><?= $message['created_at'] ?></p>
          </div>
          <i onclick="test(<?= $message['id'] ?>)" class="fa-solid fa-pen-to-square edit-pos edit-btn<?= $message['id'] ?>"></i>
          <a href="/prognet/command/delete_inbox.php?id=<?= $message['id'] ?>">
            <i class="fa-solid fa-trash delete-btn"></i>
          </a>
          <form action="/prognet/command/update_inbox.php" method="POST" class="hidden input<?= $message['id'] ?>">
            <input type="hidden" name="id" value="<?= $message['id'] ?>">
            <textarea class="textarea" name="message" id="" cols="30" rows="3"><?= $message['message'] ?></textarea>
            <button class="button-sm">Update</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </section>

  <!--================== SCROLL TOP ==================-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="uil uil-arrow-up scrollup-icon"></i>
  </a>

  <script>
    function test(id) {
      var editBtn = document.querySelector('.edit-btn' + id);

      if (editBtn.classList.contains('fa-pen-to-square')) {
        editBtn.classList.remove('fa-pen-to-square');
        editBtn.classList.add('fa-check-to-slot');

        var textarea = document.querySelector('.input' + id);
        textarea.classList.remove('hidden');
      } else {
        editBtn.classList.remove('fa-check-to-slot');
        editBtn.classList.add('fa-pen-to-square');

        var textarea = document.querySelector('.input' + id);
        textarea.classList.add('hidden');
      }
    }
  </script>

  <script type="text/javascript" src="/prognet/lib/swiper-bundle.min.js"></script>
  <script src="/prognet/assets/main.js"></script>
</body>

</html>