<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Generator</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="number"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }
    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Password Generator</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="length">Password Length:</label>
        <input type="number" id="length" name="length" min="4" max="32" value="12" required><br>

        <label>Character Types:</label>
        <input type="checkbox" id="lowercase" name="lowercase" checked>
        <label for="lowercase">Lowercase Letters</label><br>

        <input type="checkbox" id="uppercase" name="uppercase" checked>
        <label for="uppercase">Uppercase Letters</label><br>

        <input type="checkbox" id="numbers" name="numbers" checked>
        <label for="numbers">Numbers</label><br>

        <input type="checkbox" id="symbols" name="symbols" checked>
        <label for="symbols">Symbols</label><br>

        <button type="submit" name="submit">Generate Password</button>
    </form>

    <?php
    function generatePassword($length, $useLowercase = true, $useUppercase = true, $useNumbers = true, $useSymbols = true) {
        $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
        $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numberChars = '0123456789';
        $symbolChars = '!#$%&()*+@^';

        $characters = '';
        if ($useLowercase) {
            $characters .= $lowercaseChars;
        }
        if ($useUppercase) {
            $characters .= $uppercaseChars;
        }
        if ($useNumbers) {
            $characters .= $numberChars;
        }
        if ($useSymbols) {
            $characters .= $symbolChars;
        }

        if (empty($characters)) {
            echo "Error: No characters selected for password generation.";
            return null;
        }

        $password = '';
        $charsLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charsLength - 1)];
        }

        return $password;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $passwordLength = isset($_POST['length']) ? intval($_POST['length']) : 12;
        $useLowercase = isset($_POST['lowercase']);
        $useUppercase = isset($_POST['uppercase']);
        $useNumbers = isset($_POST['numbers']);
        $useSymbols = isset($_POST['symbols']);

        $generatedPassword = generatePassword($passwordLength, $useLowercase, $useUppercase, $useNumbers, $useSymbols);
        echo '<p>Generated Password: <strong>' . $generatedPassword . '</strong></p>';
    }
    ?>
</div>

</body>
</html>
