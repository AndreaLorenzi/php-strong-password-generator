<?php
if (isset($_GET['length'])) {
    $passwordLength = $_GET['length'];
    $password = generatePassword($passwordLength);
    echo "<h2>La tua password generata:</h2>";
    echo "<textarea>$password</textarea>";
}
function generatePassword($length) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($chars) - 1);
        $password .= $chars[$index];
    }

    return $password;
}

?>