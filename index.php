<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
   

</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>   
        <a href="create.php"class="btn btn-primary"  role="button">New Client</a> 
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Confirm Password</th>
                    <th>Room No</th>
                    <th>Create At</th>
                    <th>Action</th>

                </tr>
                <tbody>
                <?php
                    $serverName="localhost";
                    $username="root";
                    $password="";
                    $dataName="register";
                    $connection=new mysqli($serverName,$username,$password,$dataName);
                    if($connection->connect_error){
                        die("Connection Failed: ".$connection->connect_error);
                    }
                    $sql="SELECT * FROM tb_users";
                    $result=$connection->query($sql);
                    if(!$result){
                        die("Invalid query: ".$connection->error);

                    }
                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[password]</td>
                        <td>$row[confirm_password]</td>
                        <td>$row[room_no]</td>
                        <td>$row[create_at]</td>
                        <td>
                            <span><a class='btn btn-primary btn-sm'href='/form_DB/edit.php?id=$row[id]'>Edit</a></span>
                            <span><a class='btn btn-danger btn-sm'href='/form_DB/delete.php?id=$row[id]'>Delete</a></span>
                        </td>
                    </tr>
                        ";
                    }


                    ?>
                    
                </tbody>
            </thead>

        </table>

    </div>
  
    

    
    
</body>
</html>