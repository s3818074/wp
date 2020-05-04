<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $error_found = false;
    if (!empty($_POST)) {
        echo "<hr>";
        print_r($_POST);
        if (!is_numeric($_POST['base'])) {
            $error_found = true;
            echo '<p>Missing base</p>';
        }
        if (!is_numeric($_POST['exp'])) {
            $error_found = true;
            echo '<p>Missing exponent</p>';
        }
        if (!$error_found) {
            echo '<p> Your result is: ' . pow($_POST['base'], $_POST['exp']) . '</p>';
        }
    }
    ?>
    <form action='index.php' method='post'>
        <label>Base</label>
        <input type='number' name='base' step='any'>
        <label>Power</label>
        <input type='number' name='exp' step='any'>
        <input type='submit' name='submit' value='submit'>
    </form>
</body>

</html>