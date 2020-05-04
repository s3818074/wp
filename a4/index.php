<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>

<body>
    <?php include('tools.php'); ?>
    <h3>$_GET contains:</h3>
    <pre><?php print_r($_GET); ?></pre>
    <h3>$_POST contains:</h3>
    <pre><?php print_r($_POST) ?></pre>
    <h3>$_COOKIE contains:</h3>
    <pre><?php print_r($_COOKIE) ?></pre>
    
</body>

</html>