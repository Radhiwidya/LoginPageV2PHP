<?php
session_start();

include 'config.php';
$sukses     = "";
$error      = "";

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    if ($user && $password) { {
            $sql1   = "INSERT INTO admin (username, password) values ('$user', '$password')";
            $q1     = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "berhasil";
            } else {
                $error  = "gagal";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Register</title>
</head>

<body>
    <?php
    if ($error) {
    ?>
        <script type="text/javascript">
            alert("Pendaftaran gagal!");
            window.location.href = '../user/register.php';
        </script>
    <?php
    }
    ?>
    <?php
    if ($sukses) {
    ?>
        <script type="text/javascript">
            alert("Pendaftaran Berhasil!");
            window.location.href = '../../index.php';
        </script>
    <?php
    }
    ?>
</body>

</html>