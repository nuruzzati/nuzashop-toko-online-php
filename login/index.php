<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
     <!-- font googgle -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


    <!-- Custom styles for this template -->
    <style>
        body {
            background: #fff;
              font-family: 'Poppins', sans-serif;

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
    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-md-4">
            <div class="kotak_login" style="padding: 40px;">
                <p class="tulisan_login">Silahkan login</p>
                <form action="cek_login.php" method="post">
                    <input autocomplete="off" style="border: 2px double #999;border-radius: 50px;" type="text" name="username" class="form_login" placeholder="Masukkan Username" required="required">
                    <input style="border: 2px double #999;border-radius: 50px;margin-bottom: 25px;" type="password" name="password" class="form_login" placeholder="Masukkan Password" required="required">
                    <input type="submit" class="tombol_login" value="LOGIN">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
