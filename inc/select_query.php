<?php require_once ("inc/connection.php"); ?>
<?php 

$query = "SELECT id,first_name, last_name, email FROM user";

$result_set = mysqli_query($connection , $query);

if ($result_set) {
   echo  mysqli_num_rows ($result_set). "Records found. <hr>";

   $table = "<table>";
   $table   .= '<tr><th>ID</th><th><th>First Name </th></th>Last Name</th><th>Email</th></tr>';
   
  while ($record = mysqli_fetch_array($result_set)) {
    $table .="<tr>";
    $table .="<td>" . $record['id'].'</td>';
    $table .="<td>" . $record['first_name'].'</td>';
    $table .="<td>" . $record['last_name'].'</td>';
    $table.="<td>". $record['email'].'</td>';
    $table .="</tr>";
   
}

    $table .= "</table>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select query</title>

    <style>
        table {border-collapse: collapse ;}
        th, td {border:1px solid black;padding:  15px;}
    </style>
</head>
<body>
    <?php echo $table;  ?>
</body>
</html>

<?php mysqli_close($connection);?>