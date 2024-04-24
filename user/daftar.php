<?php 
include '../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <!-- font googgle -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>Sign Up</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
     <style>

        body {
              font-family: 'Poppins', sans-serif;

            background: #fff;
                          background: linear-gradient(to right, #c8815f, #444); /* Gradien dari #c8815f ke putih */
                          box-sizing: border-box;

            color: white;
        }

        .kotak_login {
            background: #fff;
            box-shadow: 1px 1px 2px 1px #999;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .tulisan_login {
            font-size: 24px;
            font-weight: bold;
            color: #c8815f;
            text-align: center;
            margin-bottom: 20px;
        }

        .form_login {
            width: 100%;
            padding: 10px 20px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
          

        .tombol_login {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 50px;
            background-color: #c8815f;
            font-weight: 700;
            letter-spacing: 2px;
            color: white;
            cursor: pointer;
        }

        .tombol_login:hover {
            opacity: .9;
        }
        </style>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 100px;">

            <div class="col-md-5">
                <div class="kotak_login">
                    <p class="tulisan_login">Silahkan Daftar</p>
                    <form method="post" enctype="multipart/form-data" class="user">
                        <div class="form-group" style="display: flex;justify-content: center;">
                            <input style="border-radius: 50px;border: 1px double #999;padding: 20px;width: 80%;"  type="text" name="nama" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan nama" required>
                        </div>
                        <div class="form-group" style="display: flex;justify-content: center;">
                            <input style="border-radius: 50px;border: 1px double #999;padding: 20px;width: 80%;" type="text" name="username" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan username" required>
                        </div>
                        <div class="form-group" style="display: flex;justify-content: center;">
                            <input style="border-radius: 50px;border: 1px double #999;padding: 20px;width: 80%;" type="password" name="password" class="form-control form-control-user"
                                id="exampleInputPassword" required placeholder="Password">
                        </div>
                          <div class="form-group" style="display: flex;justify-content: center;">
                        <button style="width: 80%;border-radius: 50px;background-color: #c8815f;border: none;"  name="daftar" class="btn btn-primary btn-user btn-block tombol_login">
                            Sign up
                        </button>
                          </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username sudah digunakan
    $result = $koneksi->query("SELECT * FROM user WHERE username = '$username'");
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan. Silakan pilih username lain.')</script>";
        // Mungkin tambahkan handling lainnya seperti redirect atau tindakan yang sesuai
    } else {
        // Gunakan prepared statements
        $stmt = $koneksi->prepare("INSERT INTO user(nama, username, password, level) VALUES (?, ?, ?, 'pelanggan')");
        $stmt->bind_param("sss", $nama, $username, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Sign up sukses, silahkan login')</script>";
            echo "<script>location='../login/index.php'</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "')</script>";
        }
    }
}
?>
