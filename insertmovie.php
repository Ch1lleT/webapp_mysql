<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style/insert.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body >
    <form id="form1" name="form1" method="post" action="insertsuccess.php">
        <div id="form-container">
            <div id="Labels">    
                <label for="Movie_ID">ไอดี</label>
                <label for="Movie_name">ชื่อหนัง</label>
                <label for="Movie_length">ระยะเวลา</label>
                <label for="Genre">ประเภท</label>
                <label for="DVD">จำนวนแผ่น</label>
            </div>
            <div id="Inputs">
                <input type="text" name="Movie_ID" id="Movie_ID">
                <input type="text" name="Movie_name" id="Movie_name">
                <input type="text" name="Movie_length" id="Movie_length">
                <input type="text" name="Genre" id="Genre">
                <input type="text" name="DVD" id="DVD">
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="บันทึก">
        <a class="btn btn-success" href='mainmenu.php'>Home</a>
    </form>
</body>

</html>