<?php require_once ("inc/connection.php"); ?>

<?php 

$first_name = "udari";
$last_name = "rajapaksha";
$email = "udari@gmail.com";
$password = "12345";
$is_deleted =0;

$hashed_password = sha1($password);
echo "Hashed_password: {$hashed_password}";

$query = "INSERT INTO user (first_name, last_name, email, password ,is_deleted) VALUES ('{$first_name}' , 
'{$last_name}', '{$email}', '{$hashed_password}','{$is_deleted}')";

$result = mysqli_query($connection, $query);

if ($result) {
    echo "Record inserted successfully";
}else{
    echo "Record not inserted successfully";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert query</title>
</head>
<body>
    
</body>
</html>

<? mysqli_close($connection);?>