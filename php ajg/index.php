<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terhubung ke database");
}
$nim    = "";
$nama   = "";
$alamat = "";
$fak    = "";
$sukses = "";
$error  = "";

if (isset($_POST['simpan'])) {
    $nim    = $_POST['nim'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $fak    = $_POST['fak'];

    if ($nim && $nama && $alamat && $fak) {
        $sql1 = "insert into mahasiswa(nim,nama,alamat,fak) value ('$nim','$nama','$alamat','$fak')";
        $q1   = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses         = "Berhasil memasukkan data baru";
        } else {
            $error          = "Gagal memasukkan data";
        }
    } else {
        $error = "Silahkan Masukkan Semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error?>
                    </div>

                <?php
                }
                ?>
                 <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses?>
                    </div>

                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fak" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="fak" id="fak">
                                <option value="">-Pilih Fakultas-</option>
                                <option value="saintek" <?php if ($fak == "saintek") echo "selected" ?>>saintek</option>
                                <option value="soshum" <?php if ($fak == "soshum") echo "selected" ?>>soshum</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-primary" />
                    </div>
                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        <tbody>
                            <?php
                            $sql2   = "select * from mahasiswa order by id desc";
                            $q2     = mysqli_connect($koneksi,$sql2);
                            while($r2 = mysqli_fetch_array($q2)){
                                $id..........=$r2['id'];
                                $nim.........=$r2['nim'];
                                $nama........=$r2['nama'];
                                $alamat......=$r2['alamat'];
                                $fakultas.....=$r2['fak'];

                                ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++</th>
                                    <td scope="row"><?php echo $nim</td>
                                    <td scope="row"><?php echo $nama</td>
                                    <td scope="row"><?php echo $alamat</td>
                                    <td scope="row"><?php echo $fak</td>
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

</body>

</html>