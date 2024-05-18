<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Register</title>
</head>

<body style="padding: 80px; background-color:white;">
    <div class="row no-gutters rounded-4" style="height: 420px; box-shadow: -20px 20px 20px 5px rgba(0, 0, 0, 0.4);">
        <div class="col-5 rounded-start-4 login" style="background-color:#e0e0e0; ">
            <div class="login-box" style=" padding:20px; transform: translate( 0%, 20%);">
                <form action="../config/register.php" method="POST">
                    <h2 style="text-align: center; padding:10px;">Register</h2>
                    <center>
                        <div class="input-group" style=" text-align:center; width:65%;">
                            <span class="input-group-text" style="margin-bottom: 10px;"><i class="bi bi-person"></i></span><input name="username" class="form-control" placeholder="username" type="text" style="width: 10px; height:40px; margin-bottom:10px;" required>
                        </div>
                        <div class="input-group" style=" text-align:center; width:65%;">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span><input name="password" class="form-control" placeholder="Password" type="password" style="width: 10px; height:40px;" required>
                        </div>
                    </center>
                    <div style="text-align: center; padding: 20px;">
                        <button type="submit" name="submit" class="btn btn-outline-primary rounded-5" style="width: 75%;">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-7 rounded-end-4 bg-primary" style="color:white; background-color: green; padding:20px; text-align:center; align-items:center; justify-content:center;">
            <div style="transform: translate( 0%, 45%);">
                <h1>Selamat Datang</h1>
                <p>Selamat datang di halaman register admin data pegawai. Jika anda sudah memiliki akun silahkan login</p><br>
                <a href="../../index.php">
                    <button type="button" class="btn btn-outline-light rounded-5" style="width: 150px;">Login</button>
                </a>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>