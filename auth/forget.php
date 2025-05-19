<?php

session_start();

require __DIR__ . '/../config/connect.php';


$query = "SELECT * FROM teachers WHERE id=13";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);

$d_pass = $res['password'];




if (isset($_GET['email'])) {
    $email = $_GET['email'];
    // if (isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    $to = $email; // Send to the user email entered
    $from = "itachibrother089@gmail.com";
    $fromName = "Sam ttt";
    $subject = "Password Reset Request";
    $message = "Your password is" . $d_pass;

    $headers = "From: $fromName <$from>\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Mail sent successfully to $to";
    } else {
        echo "Mail failed to send.";
    }
}
?>



<h3>Forget password</h3>

<form action="forget.php" method="GET">
    <input type="email" name="email" placeholder="Enter your email">
    <button type="submit">Get password in email</button>
</form>