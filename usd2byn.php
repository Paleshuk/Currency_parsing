<?php

include "blocks/db_connect.php"; 

date_default_timezone_set('Europe/Moscow');

$url = 'http://www.nbrb.by/API/ExRates/Rates?Periodicity=0';

$data = file_get_contents($url);
$courses = json_decode($data, true);
foreach ($courses as $course) {
	if ($course[Cur_Abbreviation] == 'USD') {
		$course_curr = $course[Cur_OfficialRate];
		break;
	}
}

if (!$mysqlLink) {
      die("<h1>Connection failed: </h1>" . mysqli_connect_error());
}
 
echo "<h1>Connected successfully!</h1>";
echo "<br><br>";

$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO usd2byn (`id`, `course`, `date`) 
		VALUES (NULL, '{$course_curr}', '{$date}')";

if (mysqli_query($mysqlLink, $sql)) {
      echo "<h1>New record created successfully!</h1>";
} else {
      echo "<h1>Error: </h1>" . $sql . "<br>" . mysqli_error($mysqlLink);
}

mysqli_close($mysqlLink);
