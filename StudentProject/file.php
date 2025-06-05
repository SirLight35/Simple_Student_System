<?php

$host = 'localhost';
$user ='root';
$pass ='';
$db = 'studentdatabase';
$conn = mysqli_connect($host,$user,$pass,$db);
$res = mysqli_query($conn,"SELECT * FROM student");

$id = '';
$name = '';
$address = '';
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['address'])){
    $address = $_POST['address'];
}

$sqls='';
if(isset($_POST['add'])){
    $sqls = "INSERT INTO student (id, name, address) VALUES ($id, '$name', '$address')";
    mysqli_query($conn,$sqls);
    header("location:file.php");
}

if(isset($_POST['delete'])){
    $sqls = "DELETE FROM student where name = '$name'";
    mysqli_query($conn,$sqls);
    header("location:file.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="mother">
        <form action="" method="post">

        <aside>
            <div class="" id="div">
                <img src="https://pngimg.com/d/student_PNG151.png" alt="Failed Img">
                <h3>Admin Canvas</h3>
                <label>Student id</label><br>
                <input type="text" name="id" id='id'><br>
                <label>Student name </label><br>
                <input type="text" name='name' id='name'><br>
                <label>Student address </label><br>
                <input type="text" name='address' id='address'><br><br>
                 <br>
                <button name='add'>Add Student:</button>
                <button name='delete'>Delete Student:</button>
            </div>
        </aside>
        
        
        
        
        
        <main>

        <table id='table'>
<tr>
    <th>Student ID:</th>
    <th>Student Name:</th>
    <th>Student Address:</th>
</tr>

<?php
while($row = mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['address']."</td>";
echo "</tr>";
}
?>
        </table>
        </main>
        </form>
    </div>
</body>
</html>