<html>
<div>Скласти програму, яка міняє місцями i-ий та j-ий стовпчики цілочисельної матриці A[1..3,1..4] </div>
<form action="" name="myform" method="post">
    <input type="number" name="i_num">
    <input type="number" name="j_num">
    <input name="Submit" type=submit value="Надіслати дані">
</form>
<?php
$i_num = $_POST['i_num'];
$j_num = $_POST['j_num'];

if ($i_num!='' && $j_num!='') {
    $array = [];
    for ($i = 0; $i < 3; $i++ ){
        for ($j = 0; $j < 4; $j++) {
            $array[$i][$j] = rand(-50,50);
        }
    }
    echo '<pre>'; print_r($array); echo '</pre>';
    echo "<br>";
    echo "Перетворений масив: <br> ";


    for ($i = 0; $i < count($array[$j_num]); $i++){
        $temp_item = $array[$j_num][$i];
        $array[$j_num][$i] = $array[$i_num][$i];
        $array[$i_num][$i] = $temp_item;
    }
    echo '<pre>'; print_r($array); echo '</pre>';
}

?>
</html>