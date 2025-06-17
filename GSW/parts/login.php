
<style>
    .error{
        color: crimson;
    }
</style>

<?php 
include("theme.php");
require_once("../classes/database.php");

$db = new Database();
$conn = $db->connect(); // This returns the PDO instance

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // prepared statements with PDO
    $stmt = $conn->prepare("SELECT password, nickname FROM user_info WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user->password)) {
            
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['nickname'] = $user->nickname;
            $message = "Login successful";
            $toastClass = "greenyellow";
            echo '<script>window.location.replace("/GSW/cafeteria.php");</script>';
            exit;
        } else {
            $message = "Incorrect password";
            $toastClass = "crimson";
        }
    } else {
        $message = "Email not found";
        $toastClass = "crimson";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/<?php echo $theme?>.css">
    <title>Login</title>
</head>

<?php 


    

    include_once("header.php");


?>


<body style="display: flex; justify-content: center; align-items: center;">
    <div class="forma">
    <h1>Login</h1>
    <p>Please fill out this form</p>
    
    <form action="" method="post">
    <div>
        <label>Email Address</label>
        <input type="email" name="email" required />
    </div>    
    <div >
        <label>Password</label>
        <input type="password" name="password" required>
    </div>
    <div >
        <input type="submit" name="submit"  value="Submit">
    </div>
        <p>Not registered? <a href="register.php">register here</a>.</p>
        <?php echo('<p style="color:'.$toastClass.';">'.$message.'</p>')?>
    </form>
    
</div>
</body>
</html>






