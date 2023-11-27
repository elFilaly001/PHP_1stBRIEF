<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "sqli";

if(isset($_GET['id'])){
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $id=$_GET['id'];
    $sql="delete from utilisateur where UserID='".$id."'";
    $result = $conn->query($sql);
    if ($result){
        header("Location: index.php");
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
if(isset($_GET['cat_id'])){
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $id=$_GET['cat_id'];
    $sql="delete from category where category_id='".$id."'";
    $result = $conn->query($sql);
    if ($result){
        header("Location: category.php");
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>