<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Anak ayam <?php echo $_POST["nama"]; ?> ada: <?php echo $_POST['jumlah']; ?></p>

    <?php
    $jumlah = $_POST["jumlah"];
    for ($i= $jumlah; $i > 1 ; $i--) { 
        echo "Anak aym turun $i <br>";
        echo "Mati satu tinggal " . ($i - 1) . "<br>";
        
    }

</body>
</html>