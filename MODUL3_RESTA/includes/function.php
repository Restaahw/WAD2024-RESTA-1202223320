<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent() { 
    // variabel global
    global $conn;
    $studentName = $_POST["stuname"];
    $nim = $_POST["stuid"];
    $jurusan = $_POST["stuclass"];
    $angkatan = $_POST["stuangkatan"];
    // Silakan buat variabel di bawah dengan data yang diambil dari form


    // Periksa apakah NIM sudah ada
    $ret = mysqli_query($conn, "SELECT * FROM tb_student WHERE nim = $nim");

    if (mysqli_num_rows($ret) == 0) {
        // Masukkan data ke tabel tb_student
        $query = "INSERT INTO tb_student (nama, nim, jurusan, angkatan) VALUES ('$studentName', '$nim', '$jurusan', '$angkatan')";
        $result = mysqli_query($conn, $query);        /**
         * Buatlah logika untuk Memeriksa hasil dari operasi penambahan data mahasiswa.
         * Jika operasi berhasil, menampilkan pesan bahwa mahasiswa telah ditambahkan
         * dan mengarahkan pengguna ke halaman 'add-students.php'.
         * Jika operasi gagal, menampilkan pesan kesalahan.
         * Jika NIM sudah ada, menampilkan pesan bahwa NIM sudah ada.
         */
        if ($result) {
            echo "
            <script>
                alert('Data Berhasil Ditambahkan');
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Failed');
                document.location.href = add-students.php;
            </script>
            ";
        }
    }
}

function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel
    $studentName = $_POST["stuname"];
    $nim = $_POST["stuid"];
    $jurusan = $_POST["stuclass"];
    $angkatan = $_POST["stuangkatan"];

    // Isi query dibawah untuk update data mahasiswa berdasarkan ID
    $query = "UPDATE tb_student SET 
        '$studentName', 
        '$nim', 
        '$jurusan', 
        '$angkatan' 
        WHERE nim = $nim";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}


?>