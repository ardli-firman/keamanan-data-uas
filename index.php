<?php

$menu = @$_GET['menu'];

require_once 'classes/Mahasiswa.php';
require_once 'Connection.php';

use classes\Mahasiswa;

$conn = new Connection();
$con = $conn->getConnection();

$Mahasiswa = new Mahasiswa($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keamanan data KTM poltek</title>
</head>

<body>

    <?php

    switch (@$menu) {
        case 'tambah':
            require_once 'partials/menu/tambah.php';
            break;
        case 'edit':
            require_once 'partials/menu/edit.php';
            break;
        default:
            require_once 'partials/menu/main.php';
            break;
    }

    ?>

</body>

</html>