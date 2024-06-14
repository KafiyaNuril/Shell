<?php

/*digunakan untuk mendefinisikan metode yang terkait dengan kelas, bukan dengan instance tertentu dari kelas. Ini dapat memanggil metode statis tanpa harus membuat objek kelas terlebih dahulu. */

class Shell
{
    protected static $Super = 15420,
                    $VPower = 16130,
                    $Diesel = 18310,
                    $Nitro = 16510,
                    $ppn = 0.1,
                    // $harga;
                    $total;
        
        // function akan dijalankan pertama
        public function __construct($jenis, $jumlahLiter)
        {
            return self::$total = (self::$$jenis * $jumlahLiter) + ((self::$$jenis * $jumlahLiter) * self::$ppn);
        }
}

class Beli extends Shell
{
    //function penampil struk
    public function __construct($jenis, $jumlah)
    {
        parent::__construct($jenis, $jumlah);

        echo "-------------------------------------------";
        echo "<br>";
        echo "Anda membeli bahan bakar minyak tipe ". $jenis. "<br> Dengan jumlah : ". $jumlah. " Liter<br>";
        echo "Total yang harus anda bayar : Rp. " .number_format(static::$total, 2, ',', '.') . "<br>";
        echo "-------------------------------------------";
        echo "<br>";
        // echo "<input type='submit' name='reset' value='reset'>";
        echo "<a href='/studycases/bahanbakar/' class='btn btn-secondary stretched-link w-25'>Reset</a>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar Shell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body class="bg-body-secondary">
    <div class="container row col-md-4 mx-auto card mt-5 border border-warning ">
        <img class="w-25 img-fluid mx-auto mt-3" src="1200px-Shell_logo.svg.png">
        <div class="card-body mb-3">
            <form action="" method="post">
                <div>
                    <label for="jumlahLiter">Jumlah Liter :</label>
                    <input class="form-control form-select-sm" type="number" name="jumlahLiter" id="bahanbakar" min="0">
                </div><br>
                <div>
                    <label for="jenis">Jenis Bahan Bakar :</label>
                    <select class="form-select form-select-sm" name="jenis">
                        <option selected disabled>Pilih Jenis Bahan bakar</option>
                        <option value="Super">Shell Super</option>
                        <option value="VPower">Shell V-Power</option>
                        <option value="Diesel">Shell V-Power Diesel</option>
                        <option value="Nitro">Shell V-Power Nitro</option>
                    </select>
                </div><br>
                <button type="submit" name="submit" value="Beli" class="btn btn-secondary btn-sm w-25">Beli</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
                <div class="text-center">
                    <?php
                    if (isset($_POST['jenis']) && isset($_POST['jumlahLiter'])) {
                        $jenis = $_POST['jenis'];
                        $jumlahLiter = $_POST['jumlahLiter'];
                        new Beli($jenis, $jumlahLiter);
                    } else {
                        echo "</br>Masukan data dengan benar";
                    } ?>
                </div>
            <?php   } ?>
        </div>
    </div>
</body>
</html>