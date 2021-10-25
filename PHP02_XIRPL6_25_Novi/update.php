<?php
    include './index.php';

    $id_siswa = $_POST['id_siswa'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['n_siswa'];
    $jenis_kelamin = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $id_jurusan = $_POST['id_jurusan'];


    $sql = "UPDATE tbl_buku SET id_siswa='$id_siswa', nis='$nis', nama_siswa='$n_siswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat', id_jurusan='$id_jurusan WHERE id='$id'";
    if($koneksi->query($sql) === TRUE){
        echo "<script> alert('Edit data sukses');
            document.location= 'index.php'; </script>";
    }else{
        echo "<script> 
                alert('Edit data gagal');
            document.location= 'index.php'; </script>";
        echo "Error: " .$sql . "<br>" . $koneksi->error;
    }

    $nama_jurusan = $_POST['nama_jurusan'];
    $sql2 = "UPDATE siswa SET nama_jurusan='$nama_jurusan' WHERE id='$id'";
    if($koneksi->query($sql2) === TRUE){
        echo "";
    }else{
        echo "Error: " .$sql . "<br>" . $koneksi->error;
    }
    $koneksi->close();

?>