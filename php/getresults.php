<?php

include __DIR__.'/../config/DB.php';

function getResults() {
//$db=mysqli_connect('localhost', 'root1', "") or die("Ошибка " . mysqli_error($db)); 
$db = new mysqli(DB::host(), DB::user(), DB::password(), DB::name());

/* проверка подключения */
if ($db->connect_errno) {
	die("Соединение не удалось: {$db->connect_error}"); 
}

//mysqli_select_db($db,'rimera_test1');
 //тут просто рандомная таблица, т к итоговая таблица (в том числе в бд которая), не соотвествует пока требуемой
 $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS pumps (id INT NOT NULL, title VARCHAR(100) NOT NULL)");
 if( ! $stmt ){ //если ошибка - убиваем процесс и выводим сообщение об ошибке.
	die( "SQL Error: {$db->errno} - {$db->error}" );
}
// $stmt->bindParam(1, $table);
 //$table = "pumps (id INT NOT NULL AUTO_INCREMENT, title VARCHAR(100) NOT NULL)";
 $stmt->execute();

 if (!$stmt=$db->prepare("SELECT * FROM `pumps` WHERE `title`='ЭЦН7А-1600Э'")){ //Не выдаёт ошибку!!
	die("SQL Error: {$db->errno} - {$db->error}");
}
 $stmt->execute();
 if (!$result= $stmt->get_result()){
	die("SQL Error: {$db->errno} - {$db->error}");
}

 $row = $result->fetch_array(MYSQLI_BOTH);
 //$row = mysqli_fetch_array($result);
 /* $numb=$row['id_pump'];
 $length=$row['length']; */

 /* очищаем результаты выборки */
$result->free();
 //echo $row[1]; //также можно обращаться не по номеру, а но названию (пр. 'title')

$db->close();
return $row;
}

?>