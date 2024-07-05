<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }
        .container {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h3 {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tinggi = $_POST["tinggi"] / 100; // Konversi tinggi dari cm ke meter
        $berat = $_POST["berat"];

        // Hitung BMI
        $bmi = $berat / ($tinggi * $tinggi);

        // Tampilkan hasil
        echo "<h3>Hasil:</h3>";
        echo "BMI: " . number_format($bmi, 2) . "<br>";

        // Interpretasi BMI dan memilih suara yang sesuai
        if ($bmi < 18.5) {
            echo "Berat badan kurang";
            $sound_file = "underweight.mp3";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            echo "Berat badan normal";
            $sound_file = "normalweight.mp3";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            echo "Berat badan berlebih (kegemukan)";
            $sound_file = "overweight.mp3";
        } elseif ($bmi >= 30) {
            echo "Obesitas";
            $sound_file = "obese.mp3";
        }

        // Memainkan audio sesuai dengan hasil BMI
        echo '<audio autoplay style="display:none;">';
        echo '<source src="' . $sound_file . '" type="audio/mpeg">';
        echo 'Your browser does not support the audio element.';
        echo '</audio>';
    }
?>
</body>
</html>