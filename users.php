<?php session_start (); ?>
<?php require_once('inc/connection.php');?>
<?php require_once('inc/functions.php'); ?>

<?php 
//checking if a user logged in
if (!isset($_SESSION['user_id'])){
    header('Location:index.php');
}

$user_list = "";
$search = '';

//getting the list of users
if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query = "SELECT * FROM user WHERE first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%' OR email LIKE '%{$search}%' AND is_deleted=0 ORDER BY first_name";
} else {
    $query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
}


$users = mysqli_query($connection, $query);

verify_query($users);


    while ($user = mysqli_fetch_assoc($users)) {
        $user_list .= "<tr>";
        
        $user_list .= "<td>{$user["first_name"]}</td>";
        $user_list .= "<td>{$user["last_name"]}</td>";
        $user_list .= "<td>{$user["last_login"]}</td>";
        /* $user_list .= "<td><a href = \"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
        $user_list .= "<td><a href = \"delete-user.php?user_id={$user['id']}\">Delete</a></td>"; */
        $user_list .= "<td><a href=\"modify-user.php?user_id=" . $user['id'] . "\">Edit</a></td>";
        $user_list .= "<td><a href=\"delete-user.php?user_id=" . $user['id'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>"; 


        $user_list .= "</tr>";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <header>
        
        <div class="appname">User management system</div>
        <div class="loggedin">Welcome <?php  echo $_SESSION ["first_name"];  ?>! <a href ="Logout.php">Log Out</a></div>
        
    </header>

    <main>
    <h1>Users <span><a href="add_user.php"> + Add User </a>  | <a href="users.php"> Refresh </a> </span></h1>

    <div class="search">
        <form action="users.php" method="get">
            <p>
            <input type="text" name="search" id="" placeholder="Type First name, Last name, or email address and press Enter" value="<?php echo $search; ?>" required autofocus>

            </p>
        </form>
    </div>
    <table class="masterlist">
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Last login</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php echo $user_list; ?>
    </table>
    </main>
    
</body>
</html>
