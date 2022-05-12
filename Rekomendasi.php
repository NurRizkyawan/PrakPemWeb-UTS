<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Rekomendasi Game</title>
    <h2>Rekomendasi game</h2>
</head>
<body>
<div class="container">
    <br> Rekomendasi game :</br>
    <br>
<?php
    include "db_connect.php";
    if (isset($_GET['Nomor'])) {
        $Nomor=htmlspecialchars($_GET["Nomor"]);
        $sql="delete from rekomendasi where Nomor='$Nomor' ";
        $hasil=mysqli_query($kon,$sql);
            if ($hasil) {
                header("Location:rekomendasi.php");
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
            <th>Nomor</th>
            <th>Judul_Game</th>
            <th>Platform</th>
            <th>Genre</th>
            <th>Keterangan</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php
        include "db_connect.php";
        $sql="select * from rekomendasi order by Nomor";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $data["Nomor"]; ?></td>
                <td><?php echo $data["Judul_Game"];   ?></td>
                <td><?php echo $data["Platform"];   ?></td>
                <td><?php echo $data["Genre"];   ?></td>
                <td><?php echo $data["Keterangan"];   ?></td>
                <td>
                    <a href="update.php?Nomor=<?php echo htmlspecialchars($data['Nomor']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?Nomor=<?php echo $data['Nomor']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <br>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    <?php
        echo "<br><br>untuk kembali tekan
        <a href='http://localhost/201110191/UTS/Bio.php' targer=_top>disini</a>"
        ?> 

</div>

</body>
</html>