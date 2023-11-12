<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light fixed-top   ">
        <div class="container-fluid">
            <a class="navbar-brand ms-5">Curriculum Vitae</a>
            <a href="update.php"><button class="btn btn-primary me-5" type="submit">Edit</button></a>
            
        </div>
    </nav>

    <div class="row">

        <div class="col-6 informasi">
            <?php
            include_once("config.php");

            $sql = "SELECT * FROM cv_data WHERE id = 1"; // Ganti '1' dengan ID entri yang ingin Anda tampilkan
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="biodata">
                        <h1 class="nama">
                            <?php echo $row["nama"]; ?>
                        </h1>

                        <div>
                            <div>
                                <strong>Nama:</strong>
                                <?php echo $row["nama"]; ?>
                            </div>

                            <div>
                                <strong>Alamat:</strong>
                                <?php echo $row["alamat"]; ?>
                            </div>

                            <div>
                                <strong>Telepon:</strong>
                                <?php echo $row["telepon"]; ?>
                            </div>

                            <div>
                                <strong>Email:</strong>
                                <?php echo $row["email"]; ?>
                            </div>

                            <div>
                                <strong>Website:</strong> <a href="<?php echo $row["web"]; ?>">
                                    <?php echo $row["web"]; ?>
                                </a>
                            </div>

                        </div>

                        <div class="mt-4">
                            <h4>Pendidikan</h4>
                            <ul>
                                <strong>
                                    <?php echo $row["pendidikan"]; ?>
                                </strong>
                            </ul>
                        </div>

                        <div class="mt-4">
                            <h3>Keterampilan</h3>
                            <ul>
                                <p>
                                    <?php echo $row["keterampilan"]; ?>
                                </p>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-6 colkanan">
                    <img src="<?php echo $row["foto_path"]; ?>" alt="Your Photo" class="profile-img"
                        >
                </div>


                <?php
                }
            } else {
                echo "Tidak ada data.";
            }

            $conn->close();
            ?>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>