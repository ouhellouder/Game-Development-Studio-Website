<style>
    .error{
        color: crimson;
    }
    .good{
        color: greenyellow;
    }
</style>

<?php
require_once("../classes/database.php");
include("theme.php");

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = new Database();
    $conn = $db->connect();

    $nickname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $date = date('Y-m-d H:i:s');

    if ($password !== $confirm) {
        $message = "Password mismatch";
        $toastClass = "crimson";
    } elseif (strlen($password) < 6) {
        $message = "Password too short";
        $toastClass = "crimson";
    } else {

        // Check if email exists
        $stmt = $conn->prepare("SELECT id FROM user_info WHERE email = :email");
        $stmt->execute(['email' => $email]);

        if ($stmt->fetch()) {
            $message = "Email already exists";
            $toastClass = "crimson";
        } else {

            // Insert new user
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user_info (nickname, email, password, date_registered) VALUES (:nick, :email, :pass, :date)");
            $success = $stmt->execute([
                'nick' => $nickname,
                'email' => $email,
                'pass' => $hashed,
                'date' => $date
            ]);

            if ($success) {
                $message = "Account created successfully";
                $toastClass = "greenyellow";
                echo '<script>window.location.replace("login.php");</script>';
                exit;
            } else {
                $message = "Registration failed";
                $toastClass = "crimson";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/<?php echo $theme?>.css">
    <title>Register</title>
</head>
<?php

    include_once("header.php");
    
    ?>

<body style="display: flex; justify-content: center; align-items: center;">
    <div class="forma">
        <h1>Register</h1>
        <p>Please fill out this form</p>
        <form action="" method="post" style="align-items: center;">
        <div>
            <label>Nickname</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email Address</label>
            <input type="email" name="email" required />
        </div>    
        <div >
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div >
            <label>Confirm password</label>
            <input type="password" name="confirm_password" required>
        </div>
        <div >
            <input type="submit" name="submit"  value="Submit">
        </div>
            <p >Already registered? <a href="login.php" class="good">login here</a>.</p>
            <?php echo('<p style="color: '.$toastClass.'">'.$message.'</p>')?>
        </form>
    </div>
</body>
</html>





