<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $name = $_POST['name'];
    $e,ail = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stat = $conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    if($stmt->execute()) {
        echo "Nowy użytkownik został dodany";
    }
    else {
        echo "Błąd podczas dodawania użytkownika";
    }

    $conn = null;
}

?>