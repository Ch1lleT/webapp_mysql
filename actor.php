<?php
    require 'conn.php';
    $sql = "SELECT * FROM actor";
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
    <title>Movie store</title>
</head>

<body>
    <div class="container">
        <h1>Movie Store</h1><br>
        <a type="button" class="btn btn-primary" href="/VideoStore/mainmenu.php">Movies</a>
        <a type="button" class="btn btn-primary" href="/VideoStore/member.php">Member</a>
        <a type="button" class="btn btn-secondary" href="/VideoStore/actor.php">Actor</a>
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
                            echo "<tr><td>".$row["Actor_ID"]."</td>"."<td>".$row["Firstname"]."</td><td>".$row["Lastname"]."</td>"."<td>".$row["Gender"]."</td>"."<td>".$row["Age"]."</td>"."<td>"."<a class='btn btn-warning' href='editbio.php?SID=".$row["Actor_ID"]."'>Movies </a>"."</td>";
                            echo "</tr>";    
                        }
                    }else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href='insertbio.php'>Insert Student</a>
    </div>
</body>

</html>