<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>

  <body>
    <video id="myVideo" autoplay muted loop id="myVideo">
      <source src="../video/perpus.mp4" type="video/mp4" />
    </video>

    <div class="content">
      <h1>Selamat Datang di Web Aplikasi <br> Perpustakaan</h1>
      <h3>Tempat di mana anda bisa membaca dan meminjam buku</h3>
      <p>
        Anda Bisa Membaca dan Meminjam Buku di Sini hanya dengan menjadi member
        , cukup dengan login dan nikmati membaca buku kami
      </p>
     <div class="select-menu">
      <div class="select-btn">
        <span class="sBtn-text"> Member</span>
      </div>
      <ul class="options">
        <li class="option">
          <a class="option-text" href="../login.php">Login</a>
        </li>
      </ul>
     </div>
    </div>

    <div class="footer">
      <button id="myBtn" onclick="myFunction()">Pause</button>
    </div>
    <script src="script.js"></script>
  </body>
</html>
