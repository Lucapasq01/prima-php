<?php
$connect = mysqli_connect("localhost", "root", "", "db_utenti");
if(isset($_POST["contenuto"]))
{
    
    $contenuto = mysqli_real_escape_string($connect, $_POST["contenuto"]);
    
    $query = "INSERT INTO post (contenuto) VALUES('$contenuto')";
    if(mysqli_query($connect, $query))
    {
        echo 'Data Inserted';
        header('formpost.php');
    }
}
?>
