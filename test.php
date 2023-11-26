    <?php
    if(isset($_POST['addSubmit'])){
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "sqli";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "INSERT INTO utilisateur VALUES(".$_POST['ID_user']." , '".$_POST['1st_name']."' , '" .$_POST['email']. "','". $_POST['Position'] ."',".$_POST['squad']." )";
        $result = $conn->query($sql);
        if($result){
            
    ?>
            <script>
                alert("Added successfully");
                document.getElementById('quiteaddmodal').click(); 
            </script>
    <?php
        header("Location: index.php");
        } else {
        echo "Error: ".$sql."<br>".$conn->error;
        }
        $conn->close();
    }
    ?>