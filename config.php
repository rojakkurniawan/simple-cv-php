  <?php
  $host = 'localhost';
  $db = 'cv';
  $user = 'rojak';
  $pwd = '123';

  $conn = mysqli_connect($host, $user, $pwd, $db); // true | false

  if (!$conn) {
    die('Gagal terhubung ke database'. mysqli_connect_error());
  }
