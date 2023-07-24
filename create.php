<?php
 $serverName="localhost";
 $username="root";
 $password="";
 $dataName="register";
 $connection=new mysqli($serverName,$username,$password,$dataName);

$name="";
$email="";
$password="";
$confirm_password="";
$room_no="";


$errormessage="";
$successMessage="";


if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $room_no=$_POST['room_no'];
 
    do{
        if(empty($name)  || empty($email) || empty($password) || empty($confirm_password) ||empty($room_no)){
            $errormessage="All Fields are Required";
            break;
        }
        $sql="INSERT INTO tb_users(name,email,password,confirm_password,room_no)"."VALUES($name,$email,$password,$confirm_password,$room_no)";
        $result=$connection->query($sql);
        if(!$result){
            $errormessage="Invalid query: ".$connection->error;
            break;

        }
        $name="";
        $email="";
        $password="";
        $confirm_password="";
        $room_no="";


        $successMessage="Client added correctly";
    
    header("location:/form_DB/index.php");
    exit;
    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create page</title>
     <!-- jQuery -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php 
        if(!empty($errormessage)){
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$errormessage</strong> 
                        <button type='button' class='btn-close' date-bs-dismiss='alert' aria-label='close'></button>
                    </div>
                </div>
            </div>
            ";
        }
        
        ?>
        <form action="" class="" method="post" autocomplete="off">
        <div class="container">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name"  value="<?php echo $name;?>">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"  value="<?php echo $email;?>">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"  value="">
            <br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password"  value="<?php echo $confirm_password;?>">
            <br>
            <label for="room">Room No:</label>
            <input type="number" name="room_no" id="room_no"  value="<?php echo $room_no;?>">
            <br>
           
            <?php 
            if(!empty($successMessage)){
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong> 
                            <button type='button' class='btn-close' date-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <button type="submit" class="submit" name="submit">Submit</button>
            <a href="/form_DB/index.php" role="button" class="cancel">Cancel</a>
            
        </div>
    </form>

    </div>
</body>
</html>