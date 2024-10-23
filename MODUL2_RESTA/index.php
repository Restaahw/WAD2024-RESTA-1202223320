<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanggar Tari Bandung - Pilih Kelas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- buat logika php disini -->
<?php
    if ($_POST) {
        $jenis_kelamin = $_POST["gender"];
        $usia = $_POST["age"];
    }

    if (empty($jenis_kelamin) || empty($usia)) {
        $error = "Jenis Kelamin dan Usia tidak boleh ksoong.";
    } elseif ($usia <=0) {
        $error = "Nilai usia harus lebih dari 0!";
    } else {
        if ($jenis_kelamin = "male") { 
            if ($usia >=5 && $usia <=10) {
                $hasil = "Kelas Anak-anak";
            } elseif ($usia >=11 && $usia <=17 ) {
                $hasil = "Kelas Remaja";
            } elseif ($usia >=18) {
                $hasil = "Kelas Dewasa";
            }
        elseif ($jenis_kelamin = "female") { 
            if ($usia >=6 && $usia <=11) {
                $hasil = "Kelas Anak-anak";
            } elseif ($usia >=12 && $usia <=20 ) {
                $hasil = "Kelas Remaja";
            } elseif ($usia >= 21) {
                $hasil = "Kelas Dewasa";
            }
        }
    }
    }
?>


    

</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Sistem Pemilihan Kelas Tari</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        Masukkan Usia Anda
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="age" class="form-label">Usia</label>
                                <input type="number" class="form-control" id="age" name="age" >
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="gender" >
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Cek Kelas</button>
                        </form>
                        <div class="mt-3">
                            <!-- Pesan atau hasil dapat ditampilkan di sini -->
                            <?php
                            if (!empty($hasil)) {
                                echo "<div class= 'alert alert-success'> Kelas Anda: $hasil </div>"; 
                            } elseif (!empty($error)) {
                                echo "<div class='alert alert-danger'> $error</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </body>
</html>