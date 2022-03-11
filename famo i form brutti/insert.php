<?php

$connect = mysqli_connect("localhost", "root", "", "db_utenti");

if ( !isset($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["pass"], $_POST["qualifica"]) ) {
    exit;
}

$nome = mysqli_real_escape_string($connect, $_POST["nome"]);
$cognome = mysqli_real_escape_string($connect, $_POST["cognome"]);
$email = mysqli_real_escape_string($connect, $_POST["email"]);
$pass = mysqli_real_escape_string($connect, $_POST["pass"]);
$qualifica = mysqli_real_escape_string($connect, $_POST["qualifica"]);

$query = "
    INSERT INTO utenti (
        nome, 
        cognome,
        email,
        pass,
        qualifica
    ) VALUES (
        '$nome',
        '$cognome',
        '$email',
        '$pass',
        '$qualifica'
    )
";

if( mysqli_query($connect, $query) ) {
    echo 'Data Inserted';
    header('form.php');
}
