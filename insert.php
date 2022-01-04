<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>


<form action="insert.php" method="post" class="col-md-4 mx-auto mt-4 border border-primary p-4">

    <input class="form-control mb-4" type="email" name="myemail" id="" placeholder="To(email)">
    <input type="text" name="mysubject" id="">

    <textarea name="mymessage" id="" cols="30" rows="10"></textarea>

    <input class="btn btn-success" name="enter" type="submit" value="Insert Data">
</form>


<?php


if(isset($_POST['enter'])){

    $con = mysqli_connect('localhost:3308', 'root', '', 'class12');

    $to = $_POST['myemail'];
    $subject = $_POST['mysubject'];
    $txt = $_POST['mymessage'];

    $sql = "INSERT INTO mail(email, subject, message) VALUES (?, ?, ?)";

    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        die('Error');
    }
    else{
      
            mysqli_stmt_bind_param($stmt, "sss", $to, $subject, $txt);
            mysqli_stmt_execute($stmt);
    
    
            $headers = "From: youremail@gmail.com" . "\r\n" .
            "CC: somebodyelse@example.com";
    
            mail($to,$subject,$txt,$headers);
       
    }


   

}

?>
    
</body>
</html>