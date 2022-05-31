<html>
<body>
<form action='' method=POST>
    <input type="Submit" name="View" value="Переглянути записи"><br>
    <input type="Submit" name="Champion" value="Переможець"><br>
    <input type="text" name="id" size=4>
    <input type="text" name="name" size=20>
    <input type="text" name="dlina" size=10>
    <input type="Submit" name="Append" value="Додати данні">
</form>
<?php
$connection = null;
require_once 'connect_db.php';
$var = 'var97';
$sql = 'CREATE TABLE IF NOT EXISTS '.$var.' ( id INT( 2 ), name VARCHAR( 20 ), dlina INT( 5 ))';

$sqlQuery = mysqli_query($connection, $sql);

if(!$sqlQuery){
    die("MySQL query failed!" . mysqli_error($connection));
}

if (!empty($_POST['Append'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dlina = $_POST['dlina'];
    $insert_db = "INSERT INTO `test`.`$var` 
 (`id`, `name`, `dlina`) VALUES ('$id', '$name', '$dlina')";
    mysqli_query($connection, $insert_db);
}
$count_record = mysqli_query($connection,  'SELECT COUNT(*) FROM ' . $var);

if (!empty($_POST['View'])) {
    $r = mysqli_query($connection, 'SELECT * FROM '.$var .' ORDER BY id');
    echo "<table border=1>\n<tr>";
    $fields = mysqli_num_fields($r);
    // Виведення заголовка таблиці
    for ($i = 0; $i < $fields; $i++)
        echo "<td>" . mysqli_fetch_field_direct($r, $i) . "</td>";
    echo "</tr>\n";
    while ($row = mysqli_fetch_row($r)) {
        echo "<tr>";
        for ($i = 0; $i < $fields; $i++)
            echo "<td>" . $row[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
if (!empty($_POST['Champion'])) {
    $r = mysqli_query($connection, 'SELECT * FROM '.$var.' WHERE dlina = ( SELECT max( 
dlina ) FROM '.$var.' ) ');
    echo "Переможець<br>";
    echo "<table border=1>\n<tr>";
    $fields = mysqli_num_fields($r);
    for ($i = 0; $i < $fields; $i++)
        echo "<td>".mysqli_fetch_field_direct($r, $i)."</td>";
    echo "</tr>\n";
    while ($row = mysqli_fetch_row($r)) {
        echo "<tr>";
        for ($i = 0; $i < $fields; $i++) echo "<td>" . $row[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} ?>
</body>
</html>