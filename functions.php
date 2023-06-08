<?php
function generatePassword($length, $characters, $allowRepetition) {
    $chars = '';

    foreach ($characters as $character) {
        switch ($character) {
            case 'letters':
                $chars .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'numbers':
                $chars .= '0123456789';
                break;
            case 'symbols':
                $chars .= '!@#$%^&*()_-=+;:,.?';
                break;
        }
    }

    $password = '';
    $charsLength = strlen($chars);

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, $charsLength - 1);
        $password .= $chars[$index];

        if (!$allowRepetition) {
            // Rimuovi il carattere utilizzato per evitare la ripetizione
            $chars = substr_replace($chars, '', $index, 1);
            $charsLength--;
        }
    }

    return $password;
}

?>