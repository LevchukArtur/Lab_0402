<html>
<div>Скласти програму, яка всі входження ’abc’ в рядок s замінює на ’def’. </div>
<form action="" name="myform" method="post">
    <input type="text" name="mystring" size="50">
    <input name="Submit" type=submit value="Надіслати дані">
</form>
<?php
$mystring = $_POST['mystring'];
$search_str = 'abc';
$replace_str = 'def';
if ($mystring!='') {
    echo ("До заміни: $mystring ");
    $new_mystring = str_replace($search_str, $replace_str, $mystring );
    echo ("<br> Після заміни: $new_mystring");
}



?>
</html>