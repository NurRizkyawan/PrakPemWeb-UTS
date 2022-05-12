<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Update tabel Rekomendasi</title>
</head>
<body>
<div class="container">
    <?php
    include "db_connect.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['Nomor'])) {
        $Nomor=input($_GET["Nomor"]);
        $sql="select * from rekomendasi where Nomor='$Nomor'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);    
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Nomor=htmlspecialchars($_POST["Nomor"]);
        $Judul_Game=input($_POST["Judul_Game"]);
        $Platform=input($_POST["Platform"]);
        $Genre=input($_POST["Genre"]);
        $Keterangan=input($_POST["Keterangan"]);
        $sql="update rekomendasi set
        Judul_Game='$Judul_Game'
		    where nomor='$nomor'";
        $hasil=mysqli_query($kon,$sql);
        if ($hasil) {
            header("Location:rekomendasi.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Update Judul_Game</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
        <div class="form-group">
            <label>Judul_Game:</label>
            <input type="text" name="Judul_Game" class="form-control" value="<?php echo $data['Judul_Game']; ?>" placeholder="Masukan Judul_Game" required />
        </div>
        <input type="hidden" name="nomor" value="<?php echo $data['nomor']; ?>"/>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>