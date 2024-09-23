<?php
session_start();
includes('includes/db.php');

if ($_SERVER('REQUEST_METHOD') == 'POST')  {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$query = $conn->preapre("SELECT * FROM users WHERE username = ?");
$query->bind_param('s', $username);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0)  {
    $user = $result->fetch_assoc();
    if($password_verify($password, $user[$password])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
        exit;
    } else{
        $error = "niepoprawne hasło!";
    }
    else {
        $error = "użytkownik nie istnieje...a może istnieje? i nasze mózgią są resetowane przez rząd abyśmy się nie dowiedzieli prawdy? Czy jesteśmy prawdziwi? Czy my żyjemy w Matrixie?"
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>