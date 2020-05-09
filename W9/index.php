<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script>

    </script>
</head>

<!-- http://localhost/wp/Week%209/index.php -->

<body>
    <footer style="position:fixed;bottom:0px;">
        <?php
        include('tools.php');

        php2js([1,2,4],'post');
        ?>
        <?php
        preShow($_GET);
        preShow($_POST);
        preShow($_COOKIE);
        preShow($_SESSION);
        ?>
    </footer>
</body>

</html>