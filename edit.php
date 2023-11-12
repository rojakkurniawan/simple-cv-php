<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Curriculum Vitae</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="ms-4 navbar-brand">Edit Curriculum Vitae</a>
    <form class="form-inline">
      <a href="index.php" class="btn btn-primary my-2 my-sm-0 me-4">Back</a>
    </form>
  </nav>
  <div class="container">
    <?php
    include_once("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = $_POST["id"];
      $nama = $_POST["nama"];
      $alamat = $_POST["alamat"];
      $telepon = $_POST["telepon"];
      $email = $_POST["email"];
      $web = $_POST["web"];
      $pendidikan = nl2br($_POST["pendidikan"]);
      $pengalaman_kerja = nl2br($_POST["pengalaman_kerja"]);
      $keterampilan = nl2br($_POST["keterampilan"]);
      // Cek apakah ada file yang diunggah
      if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["foto"]["tmp_name"];
        $name = $_FILES["foto"]["name"];
        $foto_path = "img/" . $name; // Tentukan path file tujuan
    
        // Pindahkan file ke folder "img"
        move_uploaded_file($tmp_name, $foto_path);
      }

      $sql = "UPDATE cv_data SET 
        nama='$nama', 
        alamat='$alamat', 
        telepon='$telepon', 
        email='$email', 
        web='$web', 
        pendidikan='$pendidikan', 
        pengalaman_kerja='$pengalaman_kerja', 
        keterampilan='$keterampilan', 
        foto_path='$foto_path' 
        WHERE id=$id";

      if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    ?>





    <form action="edit.php" method="POST" enctype="multipart/form-data">
      <?php
      include_once("config.php");

      $sql = "SELECT * FROM cv_data WHERE id = 1"; // Ganti '1' dengan ID entri yang ingin Anda tampilkan
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row["nama"]; ?>">
          </div>

          <!-- Tambah input file untuk upload foto -->
          <div class="mb-3">
            <label for="foto" class="form-label">Upload Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
          </div>

          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"><?php echo $row["alamat"]; ?></textarea>
          </div>

          <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $row["telepon"]; ?>">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>">
          </div>

          <div class="mb-3">
            <label for="web" class="form-label">Website</label>
            <input type="text" class="form-control" id="web" name="web" value="<?php echo $row["web"]; ?>">
          </div>

          <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <textarea class="form-control" id="pendidikan" name="pendidikan"><?php echo $row["pendidikan"]; ?></textarea>
          </div>

          <div class="mb-3">
            <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja</label>
            <textarea class="form-control" id="pengalaman_kerja"
              name="pengalaman_kerja"><?php echo $row["pengalaman_kerja"]; ?></textarea>
          </div>

          <div class="mb-3">
            <label for="keterampilan" class="form-label">Keterampilan</label>
            <textarea class="form-control" id="keterampilan"
              name="keterampilan"><?php echo $row["keterampilan"]; ?></textarea>
          </div>


          <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
          <?php
        }
      } else {
        echo "Tidak ada data.";
      }

      $conn->close();
      ?>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-o1+zUH0G9pXyxfU7UJXJL8C5CY3S0jYVqdoR2EeXT7A0Q5IYk4N9dizqAAZcS6pA"
    crossorigin="anonymous"></script>
</body>

</html>