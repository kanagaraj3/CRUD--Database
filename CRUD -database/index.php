<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myshop</title>
    <link rel="stylesheet" href="index.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="h"><h2>List of Students</h2></div>
       <br><a class="bt" href="/myshop/create.php" role="buttton">New Student</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>CREATED AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="myshop";
                
                         //create connection
                $connection =new mysqli($servername, $username, $password, $database);

                         //chech connection
                 if($connection->connect_error)
                 {
                    die("connection failed: " .$connection->connect_errror);
                 }
                
                 //Read all the row from the database table
                 $sql="SELECT* FROM clients";
                 $result=$connection->query($sql);
                 if(!$result)
                 {
                    die("Invalid query : ".$connection->error);
                 }
                 // Reda data of each data
                 while($row = $result->fetch_assoc())
                 {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='bt1' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                            <a class='bt2' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                        </td>
                     </tr>
                     ";
                  }
                ?> 
            </tbody>
        </table>
    </div>
</body>
</html>