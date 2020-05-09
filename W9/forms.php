<!-- http://localhost/wp/W9/forms.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error,
        :invalid {
            color: red;
        }
    </style>
</head>

<body>
    <?php

    $nameErr = "";
    $emailErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$", $name)) {
                $nameErr = "Invalid name";
            }
        }
        if (empty($POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email";
            }
        }
    }
    ?>
    <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
        <label>Name</label>
        <input name='name' type="text" placeholder="Your name">
        <span class="error"><?php echo $nameErr;?></span> 
        <label>Email</label>
        <input name='email' type="text" placeholder="Your email">
        <input type="submit"/>

    </form>
</body>

</html>