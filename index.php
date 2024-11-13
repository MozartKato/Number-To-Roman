<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeral To Roman</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" placeholder="Masukkan teks dan angka" name="input" required>
        <button type="submit">Convert</button>
    </form>

    <br>
    <p id="hasil">
    <?php 
    if (isset($_POST["input"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $input = $_POST['input'];

        function toRoman($num) {
            $Rongawi = [
                1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD',
                100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL',
                10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV',
                1 => 'I'
            ];

            $result = "";
            foreach ($Rongawi as $rong => $numeral) {
                while ($num >= $rong) {
                    $result .= $numeral;
                    $num -= $rong;
                }
            }
            return $result;
        }

        // Mengonversi angka dalam input menjadi angka Romawi
        $convertedText = preg_replace_callback('/\d+/', function($matches) {
            return toRoman((int)$matches[0]);
        }, $input);

        echo htmlspecialchars($convertedText);
    }
    ?>
    </p>
</body>
</html>