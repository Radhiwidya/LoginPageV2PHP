<?php
session_start();
if (empty($_SESSION['username'])) {
  ?>
  <script type="text/javascript">
    alert("Harap Login Terlebih Dahulu !");
    window.location.href = '../../index.php?pesan=belum_login';
  </script>
<?php
}
include '../config/config.php';

if (!$conn) {
    die("Koneksi gagal:" . mysqli_connect_error());
}
$no_pegawai = "";
$nama       = "";
$jabatan    = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id         = $_GET['id'];
    $sql1       = "delete from pegawai where id = '$id'";
    $q1         = mysqli_query($conn, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from pegawai where id = '$id'";
    $q1         = mysqli_query($conn, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $no_pegawai = $r1['no_pegawai'];
    $nama       = $r1['nama'];
    $jabatan    = $r1['jabatan'];

    if ($no_pegawai == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $no_pegawai = $_POST['no-pegawai'];
    $nama       = $_POST['nama'];
    $jabatan    = $_POST['jabatan'];

    if ($no_pegawai && $nama && $jabatan) {
        if ($op == 'edit') { //update
            $sql1   = "update pegawai set no_pegawai='$no_pegawai', nama='$nama', jabatan='$jabatan' where id = '$id'";
            $q1     = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //insert
            $sql1   = "insert into pegawai (no_pegawai, nama, jabatan) values ('$no_pegawai', '$nama', '$jabatan')";
            $q1     = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error  = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Data Pegawai</title>
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-primary fixed-top">
        <div class="container" style="margin-left: 15px;">
            <a class="navbar-brand" href="#" style="color: white;">
                <b>Data Pegawai</b>
            </a>
        </div>
        <div class="fixed-en logout">
            <a href="../config/logout.php" class="log" data-toggle="tooltip" title="Keluar" style=" color:white; font-weight: bold; font-weight: bold;text-decoration: none;"><i class="bi bi-box-arrow-right" style="margin-right: 15px;"></i></a>
        </div>
    </nav>
    <div class="mx-auto" style="padding-top: 50px;">
        <!-- Input -->
        <div class="card">
            <div class="card-header text-white bg-primary">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:3;url=index.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:3;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="no-pegawai" class="col-sm-2 col-form-label">No. Pegawai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no-pegawai" name="no-pegawai" value="<?php echo $no_pegawai ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option value="">- Pilih Jabatan -</option>
                                <option value="Direktur" <?php if ($jabatan == "direktur") echo "selected" ?>>Direktur</option>
                                <option value="Manajer" <?php if ($jabatan == "manajer") echo "selected" ?>>Manajer</option>
                                <option value="HRD" <?php if ($jabatan == "hrd") echo "selected" ?>>HRD</option>
                                <option value="Karyawan" <?php if ($jabatan == "karyawan") echo "selected" ?>>Karyawan</option>
                                <option value="Lainnya" <?php if ($jabatan == "lainnya") echo "selected" ?>>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <!-- Output -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Pegawai
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No. Pegawai</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2   = "select * from pegawai order by id desc";
                        $q2     = mysqli_query($conn, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $no_pegawai = $r2['no_pegawai'];
                            $nama       = $r2['nama'];
                            $jabatan    = $r2['jabatan'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $no_pegawai ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $jabatan ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin hapus data?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>