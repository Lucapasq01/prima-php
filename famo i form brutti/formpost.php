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
            <h1 class="display-4">scrivi il tuo post</h1>
            <hr class="my-4">
            <form action="insertpost.php" method="POST">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here"  name="contenuto"></textarea>
                    <label for="floatingTextarea">Comments</label>
                    
                   
                </div>
            

                <button type="submit" class="btn btn-primary btn-block">posta</button>
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
                        <th scope="col">id-post</th>
                        <th scope="col">contenuto</th>
                        
                        
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                       $conn = mysqli_connect("localhost", "root", "", "db_utenti");
                       // Check connection
                       if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                       }
                       $sql = "SELECT * FROM post";
                       $result = mysqli_query($conn, $sql);
                       if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "  <tr>
                                    <td>" . $row["id-post"] . "</td>
                                    <td>" . $row["contenuto"] . "</td>
                
                                    </tr> ";
                        }
                       }
                       $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>