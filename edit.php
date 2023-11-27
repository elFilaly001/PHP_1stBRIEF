<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "sqli";
global $selected; 

if(isset($_POST['updateSubmit'])){
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo 'connected successfully ';
    if(!empty($_POST['upuser'])){
     $selected = $_POST['upuser'];
        echo $selected;
    }
    $sql = "UPDATE utilisateur SET NomUtilisateur='".$_POST['up1st_name']."', Email='".$_POST['upemail']."', position='".$_POST['uplast_name']."', squad='".$_POST['squad']."' WHERE UserID='".$selected."'";
    $result = $conn->query($sql);
    if($result){
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); 
}
if(isset($_POST['updatecatSubmit'])){
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo 'connected successfully ';
    if(!empty($_POST['upcat'])){
     $selected = $_POST['upcat'];
        echo $selected;
    }
    $sql = "UPDATE category SET category_name='".$_POST['up_cat_name']."', ressource_id='".$_POST['up_cat_ressource']."' WHERE category_id='".$selected."'";
    $result = $conn->query($sql);
    if($result){
        header("Location: category.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); 
}
?>