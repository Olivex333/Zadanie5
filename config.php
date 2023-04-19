<?php
$conn = new mysqli("localhost","root","","baza");
if ($conn->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
}
?>