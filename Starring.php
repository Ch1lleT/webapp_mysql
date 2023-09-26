<?php
    require 'conn.php';
    if(!isset($_GET['Movie_ID'])){
        header("refresh: 2; url=http://localhost/VideoStore/mainmenu.php");
    }

    $sql = "SELECT * FROM starring
            INNER JOIN movies ON starring.Movie_ID = movies.Movie_ID
            INNER JOIN actor ON starring.Actor_ID = actor.Actor_ID
            WHERE movies.Movie_ID = '$_GET[Movie_ID]'
    ";

    


    $result = $conn->query($sql);

    if(!$result){
        die("Error : ". $conn->$conn_error);
    }









?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>$_GET[Movie_ID]</title>
</head>

<body>
    
    <div class="container">
        <?php
            
            $row = $result->fetch_assoc();
            $name = $row["Movie_name"];
            mysqli_data_seek($result,0);

        ?> 
        <h1 style="text-align: center;"  > 
        <?= $name ?>
        </h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Actor_ID</th>
                    <th scope="col-4">Firstname</th>
                    <th scope="col-4">Lastname</th>
                    <th scope="col-4">Gender</th>
                    <th scope="col-4">Age</th>
                    <th scope="col-5"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["Actor_ID"]."</td>"."<td>".$row["Firstname"]."</td><td>".$row["Lastname"]."</td>"."<td>".$row["Gender"]."</td>"."<td>".$row["Age"]."</td>"."<td>"."</td>";
                            echo "</tr>";    
                        }
                    }else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href='mainmenu.php'>Back</a>
    </div>
</body>

</html>