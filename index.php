
<html>
<body>

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
    
    
        <h1>Gestion des articles</h1>
    
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
                
               
                
                <table id="customers">
                  <tr>
                    <th>Code</th>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>Actions</th>
                  </tr>

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
        echo "<tr> <td>". $row["code"]. "</td> <td> ". $row["name"]. " </td><td> ".$row["quantity"] . "</td><td>".$row["price"]. "</td><td>"."<buton name="supprimer"></button><;
       
      
    }
} else {
    echo "0 results";
}

$conn->close();
?>


</table>
          
           

</body>
</html>