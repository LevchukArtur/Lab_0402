<?php
$host = "std.kpnu.edu.ua:8083"; // адреса сервера
$user = "std"; // логін
$password = "Start2019"; // пароль
$database = "std01_database";
$connection = mysqli_connect($host, $user, $password);
if($connection === false){
    die("ПОМИЛКА: Неможливо підключитися. " . mysqli_connect_error());
}
echo "Підключення до сервера пройшло успішно! <br>";
mysqli_select_db($connection, $database) or die(mysqli_error());
?>
