
<html>
<head>
<title>Gestion du magasin</title>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>



  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
  Application de gestion magasin
  </nav>
<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    h1 {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
    </style>
    </head>
    <body>    
        <form action="index.php" method="post">
            <style>
                #customers {
                  font-family: Arial, Helvetica, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }
                
                #customers td, #customers th {
                  border: 1px solid #ddd;
                  padding: 8px;
                }
                
                #customers tr:nth-child(even){background-color: #f2f2f2;}
                
                #customers tr:hover {background-color: #ddd;}
                
                #customers th {
                  padding-top: 12px;
                  padding-bottom: 12px;
                  text-align: left;
                  background-color: #04AA6D;
                  color: white;
                }
    
                </style>
                </head>
                <body>
                
                <a href="add-new.php" class="btn btn-dark fa-regular fa-square-plus  mb-3 " > &nbsp;&nbsp;&nbsp;Ajouter</a>
                
                <table class="table table-hover text-center">
                <thead class="table-dark">  
                <tr >
                    <th>Code</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  <th>Actions</th>
                  </tr>
                </thead>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT code, name, quantity,price FROM article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<tr> <td>". $row["code"]. "</td> <td> ". $row["name"]. " </td><td> ".$row["quantity"] . "</td><td>".$row["price"]. "</td><td><a href='update.php?code=".$row["code"] ."'>editer</a><button >delete</button></td></tr>";
        ?>
         <tr>
            <td><?php echo $row['code'] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["quantity"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <td>
              <a href="update.php?id=<?php echo $row["code"] ?>" class="link-dark"><i class="fa-solid fa-regular fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["code"] ?>" onclick="return confirm('tu veux supprimer cette ligne?');" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php 
      }
} else {
   echo "<h6>Assurer que votre inventaire est fait correctement</h6>";
}         
$conn->close();
?>


</table>

</body>
</html>