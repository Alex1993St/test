<?php
$mysqli = new mysqli("localhost","root","","test");
$result = $mysqli->query("SELECT login, COUNT(*) as duplicate FROM `users` GROUP BY login HAVING duplicate > 1 ORDER BY login DESC");
$result->fetch_all(MYSQLI_ASSOC);
