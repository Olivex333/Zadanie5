<?php
session_start();
require('config.php');

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM users WHERE username='{$_POST['username']}' AND password='".hash('sha512', $_POST['password'])."'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
        $_SESSION['username'] = $_POST['username'];
        header("Location: index.php");
        exit();
    } else {
        echo "Nie";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>

<body>
    <?php if (!isset($_SESSION['username'])) {?>
        <form method="post" action="login.php">
            <label for="username">Login:</label>
            <input type="text" id="username" name="username">
            <br>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password">
            <br>
            <input type="submit" value="Zaloguj" name="submit">
        </form>
    <?php } else { ?>
        <p><?php echo $_SESSION['username']; ?></p>
    <?php } ?>
</body>

</html> 