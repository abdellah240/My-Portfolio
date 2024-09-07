<?php

print_r(PDO::getAvailableDrivers());

// Connect to database.
try {
    $pdo = new PDO('pgsql:host=127.0.0.1;dbname=postgres;', 'postgres', 'postgres');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo '<br><br>Could not connect. Please try again later.<br><br>';
    die('Error : ' . $e->getMessage());
}
echo '<br><br>Connected.<br><br>';


// Sanitize and handle form input.
$name = htmlspecialchars($_POST['Name'], ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($_POST['Message'], ENT_QUOTES, 'UTF-8');

if (!isset($_POST['Number']))
    $number = null;
else
    $number = filter_var($_POST['Number'], FILTER_SANITIZE_NUMBER_INT);


// Insert info into db.
try {
    $sql = "INSERT INTO web3forms(name,email,message,number,date) VALUES (?,?,?,?,NOW())";
    $query = $pdo->prepare($sql);

    $query->execute(array(
        $name,
        $email,
        $message,
        $number
    ));
    header("Location: ../thank-you.html");
    exit();
} catch (Exception $e) {
    echo 'Insertion Error : ' . $e->getMessage();
}
