<?php
$servername="localhost";
$username="root";
$password="";
$database="myshop";
         //Create Connection
$connection =new mysqli($servername,$username,$password,$database);

$name ="";
$email ="";
$phone="";
$address="";

$errorMessage="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name =$_POST["name"];
    $email =$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"]; 

    do {
        if( empty($name) || empty($email) ||empty($phone) || empty($address))
        {
            $errorMessage="All the fields are required";
            break;
        }
        //add new client to database
       $sql="INSERT INTO clients (name,email,phone,address)".
            "VALUES('$name ','$email','$phone','$address')";
        $result=$connection->query($sql);
 
        if(!$result)
        {
            $errorMessage="Invalid query :" .$connection->error;
            break;
        }         

        $name ="";
        $email ="";
        $phone="";
        $address="";
          
        $successMessage ="client added correctly";
       

        header("location: /myshop/index.php");
        exit;
  

    }while(false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="create.css" type="text/css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
</head>
<body>
<?php
        if(!empty($errorMessage))
        {
            echo "
            <div class='alert alert-warning alert-dismissible fade show ' role='alret'>
                 <strong>$errorMessage</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'> </button>
            </div>
            ";
        }
        ?>
    <div class="container">
        <h2>New Student</h2>

        <form method="post">
            <div class="m1">
                <label class="l">Name</label>
                <div class="i">
                    <input required min="8" max="20" placeholder="Enter your name" type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>

            <div class="m1">
                <label class="l">Email</label>
                <div class="i">
                    <input required min="8" max="30"  placeholder="Enter your email" type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>

            <div class="m1">
                <label class="l">Phone</label>
                <div class="i">
                    <input required min="10" max="10" placeholder="Enter your phone no"  type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>

            <div class="m1">
                <label class="l">Address</label>
                <div class="i">
                    <input  placeholder="Enter your Address" type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
            </div>
             <?php
             if(!empty($successMessage))
             {
                echo "
                <div class='row mb-3'>
                   <div class='offset-sm-3 col-sm-3 col-sm-6'>
                      <div class='alert alert-success alert-dismissible fade show' role='alert'>
                         <strong>$successMessage</strong>
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                   </div>
                </div>
                </div>
                ";
              }
             ?>

             
            <div class="m2">
                <div class="b">
                    <button type="submit">Submit</button>
                </div>
                <div class="b1">
                    <a href="/myshop/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>  
    </div>
</body>
</html>