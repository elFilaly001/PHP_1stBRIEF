<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css"
  rel="stylesheet"
/>
    <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
  rel="stylesheet"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
  </head>
  <body>

  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="margin-left:25px"><i class="fa-solid fa-bars"></i></button>

  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  </header>
  <?php
  include 'connection.php';
  ?>

  <table class="table" style='margin-inline: 25px;width: 96%;margin-top: 30px; position: relative;'>
  <thead>
    <tr>
      <th scope="col">nom utilisateur</th>
      <th scope="col">email</th>
      <th scope="col">position</th>
      <th scope="col">squad</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT u.UserID ,u.NomUtilisateur, u.Email,u.position, s.squad_name FROM utilisateur u left join squad s on u.squad = s.squadID";
    $result = $conn->query($sql);
    function show_select(){
      global $conn;
      $sql = "select squadID,squad_name from squad";
      $result = $conn->query($sql);
     if($result){
      while ($row = $result->fetch_assoc()) {
        echo "<option  value='" . $row['squadID'] . "'>" . $row['squad_name'] . "</option>";
    }
     }else {
      echo "Error: ".$sql."<br>".$conn->error;
  }
    }
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $field1 = $row["NomUtilisateur"];
            $field2 = $row["Email"];
            $field3 = $row["position"];
            $field4 = $row["squad_name"];

            echo "<tr class='table-active'><th scope='row'><input type='hidden' class='inputID' name='userID' style='display=none' value:'".$row['UserID']."'>".$field1."</th>
            <td>".$field2."</td><td>".$field3."</td><td>".$field4."</td>";
          }
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
    $conn->close();
?>
  </tbody>
  
</table>
<!-- SIDEBAR -->
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="position: fixed; right: calc( 3% + 25px ) ; bottom: 20px">add</button>
  <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateexampleModal" style="position: fixed; right: calc( 9% + 25px ) ; bottom: 20px">Update</button>
</div>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div>  


<!-- ADD MODAL -->
<form  action= "test.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div class="row mb-3">
        <div class="col">
  <input type="text" class="form-control" placeholder="User ID" aria-label="First name" name="ID_user">
   </div>
      <div class="col">
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="1st_name">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Position" aria-label="Position" name="Position">
  </div>
  
</div>
  <div class="mb-3">
    <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Email" aria-describedby="emailHelp">
  </div>
  <select class="form-select" name='squad' aria-label="Default select example">
    <?php
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    show_select();
    ?>
</select>
      </div>
      <div class="modal-footer">
        <button type="button" id="quiteaddmodal" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary" name="addSubmit">submit</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- UPDATE MODAL -->
<form action="edit.php" method="post">
<div class="modal fade" id="updateexampleModal" tabindex="-1" aria-labelledby="updateexampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateexampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row mb-3">
        <div class="col">
          <select class="form-select" aria-label="Default select example" name="upuser">
            <?php
             $conn = mysqli_connect($servername, $username, $password, $dbname);
            function show_user_select(){
              global $conn ; 
              $sql = "select * from utilisateur";
              $result = $conn->query($sql);
             if($result){
              while ($row = $result->fetch_assoc()) {
                echo "<option  value='" . $row['UserID'] . "'>" . $row['NomUtilisateur'] . "</option>";
            }
             }else {
              echo "Error: ".$sql."<br>".$conn->error;
          }
            }
            show_user_select();
            ?>
          </select>
        </div>
      
  <div class="col">
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="up1st_name">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Position" aria-label="Position" name="uplast_name">
  </div>
</div>
  <div class="mb-3">
    <input type="email" class="form-control" id="exampleInputEmail" name="upemail" placeholder="Email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3"><select class="form-select" name='squad' aria-label="Default select example">
    <?php
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    show_select();
    ?>
</select></div>
  
</div>
</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updateSubmit" class="btn btn-primary">submit</button>
      </div>
    </div>
  </div>
</div>

  </body>
  <footer> 
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"
></script>
<script
  type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
></script>
<script src= "script.js"></script>
  </footer>
</html>
