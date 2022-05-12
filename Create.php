<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Input</title>
    <h2>Edit table Rekomendasi</h2> 
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Nomor=input($_POST["Nomor"]);
        $Judul_Game=input($_POST["Judul_Game"]);
        $Platform=input($_POST["Platform"]);
        $Genre=input($_POST["Genre"]);
        $Keterangan=input($_POST["Keterangan"]);
        $sql="insert into rekomendasi (Nomor,Judul_Game,Platform,Genre,Keterangan) values
		('$Nomor','$Judul_Game','$Platform','$Genre','$Keterangan')";
        $hasil=mysqli_query($kon,$sql);
        if ($hasil) {
            header("Location:rekomendasi.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nomor:</label>
            <input type="text" name="Nomor" class="form-control" placeholder="Masukan Nomor" required />
        </div>
        <div class="form-group">
            <label>Judul_Game:</label>
            <input type="text" name="Judul_Game" class="form-control" placeholder="Masukan Judul_Game" required/>
        </div>
        <div class="form-group">
            <label>Platform:</label>
            <input type="text" name="Platform" class="form-control" placeholder="Masukan Platform" required/>
        </div>
        <div class="form-group">
            <label>Genre:</label>
            <input type="text" name="Genre" class="form-control" placeholder="Masukan Genre" required/>
        </div>
        <div class="form-group">
            <label>Keterangan:</label>
            <input type="text" name="Keterangan" class="form-control" placeholder="Masukan Keterangan" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>