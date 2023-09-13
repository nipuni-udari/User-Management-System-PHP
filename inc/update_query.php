 <?php require_once ("inc/connection.php"); ?>
<?php
$query = "UPDATE user SET first_name='lasantha' WHERE id =6";
$result_set = mysqli_query($connection, $query);

//mysqli_affected_rows() = return number of rows affected

if ($result_set) {
    echo mysqli_affected_rows($connection). "Records Updated ." ;
} else {
    echo "Database query failed .";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update query</title>
</head>
<body>
    
</body>
</html>

<? mysqli_close($connection);?>