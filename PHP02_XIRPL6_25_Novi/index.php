<?php //koneksi database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "siswa";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

    //pengujian jika tombol edit/hps di klik
    if(isset($_GET['hal']))
    {
        //Pengujian saat edit data
        if($_GET['hal'] == "edit") 
        {
            //tampilkan data yang akan diedit
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE id_siswa = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan maka data ditampung dulu kedalam variabel
                $vid_siswa = $data['id_siswa'];
                $vnis = $data['nis'];
                $vnama_siswa = $data['nama_siswa'];
                $vjenis_kelamin = $data['jenis_kelamin'];
                $valamat = $data['alamat'];
                $vid_jur = $data['id_jurusan'];
                
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP & MySQL</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Praktek KK4a PHP & MySQL menggunakan bootstrap</h3>
        <h4 class="text-center">Noviana Retno Pinasti</h4>
        <!--Awal Card Form-->
        <div class="card mt-3">
            <div class="card-header bg-primary text-white ">
                Form Input Data Siswa
            </div>
            <div class="card-body">
                <form action="simpan.php" method="post">
                    <div class="form-group">
                        <label>ID Siswa</label>
                        <input type="text" name="id_siswa" value="<?=@$vid_siswa?>" class="form-control" placeholder="Input id siswa" required>
                    </div>
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis" value="<?=@$vnis?>" class="form-control" placeholder="Input nis" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" value="<?=@$vnama_siswa?>" class="form-control" placeholder="Input nama siswa" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jk" value="<?=@$vjenis_kelamin?>" class="form-control" placeholder="Input jenis kelamin" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="Input alamat siswa"><?=@$valamat?></textarea>
                    </div>
                    <div class="form-group">
                        <label>ID Jurusan</label>
                        <input type="text" name="id_jurusan" value="<?=@$vid_jur?>" class="form-control" placeholder="Input id jurusan" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <select class="form-control" name="nama_jurusan">
                            <option value="<?=@$vn_jur?>"><?=@$vn_jur?></option>
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="TJA">TJA</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success  mt-3" name="btn_simpan">Save<a href="simpan.php" method= $_POST></a></button>
                    <button type="reset" class="btn btn-danger  mt-3" name="btn_reset">Reset</button>
                </form>
        </div>
    </div>
<!--Akhir Card Form-->

<!--Awal Card Tabel-->
<div class="card mt-3">
        <div class="card-header bg-primary text-white ">
            Tabel Data
         </div>
         <div class="card-body">
             <form method="get" action="search.php">
                 <label for="cari"> Cari Data :   </label>
                 <input type="text" name="cari">
                 
                </form>
                <br>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>ID Siswa</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>ID Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        //tampilkan data dari tabel buku
                        $no = 1;
                        $data1 = mysqli_query($koneksi, "SELECT * FROM tbl_buku order by id_siswa asc");
                        while($data = mysqli_fetch_array($data1)) :
                    ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$data[0]?></td>
                            <td><?=$data[1]?></td>
                            <td><?=$data[2]?></td>
                            <td><?=$data[3]?></td>
                            <td><?=$data[4]?></td>
                            <td><?=$data[5]?></td>
                            <td>
                                <a href="index.php?hal=edit&id=<?=$data['id_siswa']?>" class="btn btn-warning">Edit<a href="update.php"></a></a>
                                <a href="delete.php" method= $_POST
                                onClick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger" name="id_siswa"> Delete </a>
                            </td>
                        </tr>
                        <?php endwhile;//penutup perulangan while?>
                    </table>      
        </div>
    </div>
<!--Akhir Card Form-->
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>