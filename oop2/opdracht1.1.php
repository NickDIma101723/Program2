<?php
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $number = trim($_POST['number']);
    $action = $_POST['action'];

    switch ($action) {
        case 'dec_to_bin':
            if (is_numeric($number)) {
                $result = 'Binair: ' . decbin((int)$number);
            } else {
                $result = 'Ongeldig decimaal getal.';
            }
            break;
        case 'bin_to_dec':
            if (preg_match('/^[01]+$/', $number)) {
                $result = 'Decimaal: ' . bindec($number);
            } else {
                $result = 'Ongeldig binair getal.';
            }
            break;
        case 'dec_to_hex':
            if (is_numeric($number)) {
                $result = 'Hexadecimaal: ' . dechex((int)$number);
            } else {
                $result = 'Ongeldig decimaal getal.';
            }
            break;
        case 'hex_to_bin':
            if (ctype_xdigit($number)) {
                $result = 'Binair: ' . decbin(hexdec($number));
            } else {
                $result = 'Ongeldig hexadecimaal getal.';
            }
            break;
        case 'bin_to_hex':
            if (preg_match('/^[01]+$/', $number)) {
                $result = 'Hexadecimaal: ' . dechex(bindec($number));
            } else {
                $result = 'Ongeldig binair getal.';
            }
            break;
        default:
            $result = 'Onbekende actie.';
    }
}
?>
