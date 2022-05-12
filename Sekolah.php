<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Riwayat Pendidikan</title>
    <h2>Riwayat Pendidikan</h2>
</head>
<body>
<div class="container">
    <br> Riwayat Pendidikan saya :</br>
    <br>
<?php
    include "db_connect.php";
    if (isset($_GET['Jenjang_Pendidikan'])) {
        $Jenjang_Pendidikan=htmlspecialchars($_GET["Jenjang_Pendidikan"]);
        $sql="delete from sekolah where Jenjang_Pendidikan='$Jenjang_Pendidikan' ";
        $hasil=mysqli_query($kon,$sql);
            if ($hasil) {
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
?>
    <table width="68%" border="1" 25 cellpadding="5">
        <br>
        <thead>
        <tr>
            <th>Jenjang_Pendidikan</th>
            <th>Nama_Sekolah</th>
            <th>Tahun_Masuk</th>
            <th>Tahun_Lulus</th>
        </tr>
        </thead>
        <?php
        include "db_connect.php";
        $sql="select * from sekolah order by Jenjang_Pendidikan";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $data["Jenjang_Pendidikan"]; ?></td>
                <td><?php echo $data["Nama_Sekolah"];   ?></td>
                <td><?php echo $data["Tahun_Masuk"];   ?></td>
                <td><?php echo $data["Tahun_Lulus"];   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
        
    </table>
    <br>
    <?php
        echo "<br><br>untuk kembali tekan
        <a href='http://localhost/201110191/UTS/Bio.php' targer=_top>disini</a>"
        ?> 
</div>

</body>
</html>