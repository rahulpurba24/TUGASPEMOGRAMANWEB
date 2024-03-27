<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penggunaan Looping PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Penggunaan Looping PHP</h2>
        <p>Nama: Rahul Beget Pandapotan Purba</p>
        <p>NIM: 211011401037</p>
        <hr>
        <h3>Bilangan Genap yang Habis Dibagi 3</h3>
        <ul>
            <?php
            // Function untuk menampilkan bilangan genap yang habis dibagi 3 dan menghitung jumlahnya
            function displayEvenNumbersDivisibleBy3()
            {
                $count = 0;
                for ($i = 1; $i <= 100; $i++) {
                    if ($i % 2 == 0 && $i % 3 == 0) {
                        echo "<li>$i</li>";
                        $count++;
                    }
                }
                return $count;
            }

            $total_numbers = displayEvenNumbersDivisibleBy3();
            ?>
        </ul>
        <p>Total bilangan genap yang habis dibagi 3: <?php echo $total_numbers; ?></p>
    </div>
</body>
</html>
