<?php
    require 'conn.php';
    $sql = "SELECT * FROM movies";
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
        <button type="button" class="btn btn-primary">Movies</button>
        <button type="button" class="btn btn-primary" >Member</button>
        <button type="button" class="btn btn-primary">Actor</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Movie ID</th>
                    <th scope="col-4">Movie name</th>
                    <th scope="col-4">Movie_length</th>
                    <th scope="col-4">Genre</th>
                    <th scope="col-4">DVD</th>
                    <th scope="col-5"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["Movie_ID"]."</td>"."<td>".$row["Movie_name"]."</td><td>".$row["Genre"]."</td>"."<td>".$row["Movie_length"]."</td>"."<td>".$row["DVD"]."</td>"."<td>"."<a class='btn btn-warning' href='editbio.php?SID=".$row["Movie_ID"]."'>Starring </a>"."</td>";
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