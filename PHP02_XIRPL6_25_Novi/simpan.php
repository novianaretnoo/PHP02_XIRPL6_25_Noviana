<?php
    include './index.php';
    
    $id_siswa = $_POST['id_siswa'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $id_jurusan = $_POST['id_jurusan'];

    $sql = "INSERT INTO tbl_buku (id_siswa, nis, nama_siswa, jenis_kelamin, alamat, id_jurusan) VALUES ('$id_siswa', $nis', '$nama_siswa', '$jenis_kelamin', '$alamat', '$id_jurusan')";
    if($koneksi->query($sql) === TRUE){
        echo "<script> alert('Simpan data sukses');
            document.location= 'index.php'; </script>";
    }else{
        echo "<script> 
                alert('Simpan data GAGAL!!');
            document.location= 'index.php'; </script>";
        echo "Error: " .$sql . "<br>" . $koneksi->error;
    }

    $id_jurusan = $_POST['id_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $sql2 = "INSERT INTO tbl_jurusan (id_jurusan, nama_jurusan) VALUES ('$id_jurusan', '$nama_jurusan')";
    if($koneksi->query($sql2) === TRUE){
        echo "";
    }else{
        echo "Error: " .$sql . "<br>" . $koneksi->error;
    }
    $koneksi->close();

?>