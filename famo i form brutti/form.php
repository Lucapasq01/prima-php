<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Inserimento dati</title>
</head>

<body>
    <div class="container" style="margin-top: 2%;">
        <div class="jumbotron">
            <h1 class="display-4">Inserimento dati</h1>
            <hr class="my-4">
            <form action="insert.php" method="POST">
                <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome" style="margin-top: 2%;">
                <input class="form-control" id="cognome" name="cognome" type="text" placeholder="Cognome" style="margin-top: 2%;">
                <div class="form-group" style="margin-top: 2%;">
                    <label for="exampleFormControlInput1">Indirizzo email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <input class="form-control" id="pass" name="pass" type="text" placeholder="pass" style="margin-top: 2%;">
                <div class="form-group" style="margin-top: 2%;">
                    <label for="exampleFormControlSelect1">Qualifica</label>
                    <select class="form-control" id="qualifica" name="qualifica">
                        <option>moderatore</option>
                        <option>admin</option>
                        <option>utente semplice</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Inserisci</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Richiesta dati</h1>
            <p class="lead">In questa sezione vengono richiesti i dati al db e vengono mostrati sotto forma di tabella</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Email</th>
                        <th scope="col">pass</th>
                        <th scope="col">Qualifica</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "db_utenti");
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM utenti";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "  <tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["nome"] . "</td>
                                    <td>" . $row["cognome"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["pass"] . "</td>
                                    <td>" . $row["qualifica"] . "</td>
                                    </tr> ";
                        }
                    }
                    $conn->close();
                    ?>
                </tbody>
                <a href="http://localhost/famo%20i%20form%20brutti/formpost.php">se vuoi scrivere un pensiero cliccami</a>
            </table>
        </div>
    </div>

   
</body>

</html>