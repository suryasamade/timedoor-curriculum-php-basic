<?php
$color = 'red';

// switch ($color) {
//     case 'black':
//         echo "It's BLACK.";
//         break;
//     case 'red':
//         echo "It's RED.";
//         break;
//     default:
//         echo "It's WHITE.";
//         break;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Switch Alternative Syntax</title>
</head>

<body>
    <?php switch ($color):
        case 'black': ?>
            <p>its black </p>
            <?php break; ?>
        <?php
        case 'red': ?>
            <p>its red</p>
            <?php break; ?>
        <?php
        default: ?>
            <p>its white</p>
            <?php break; ?>
    <?php endswitch; ?>
</body>

</html>