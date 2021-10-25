<?php
include './index.php';
$id_siswa = $_POST['id_siswa'];

$sql = "DELETE FROM tbl_buku WHERE id_siswa ='$id_siswa' ";

if($koneksi->query($sql) === TRUE){
    echo "<script> alert('Data berhasil dihapus');
            document.location= 'index.php'; </script>";
}else{
    echo "Erros : " .$sql . "<br>" . $koneksi->error;
}

$koneksi->close();

?>