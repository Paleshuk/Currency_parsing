<?php

$mysqlLink = mysqli_connect('localhost', 'root', 'root', 'Currency');

mysqli_query($mysqlLink, "SET NAMES utf8");

mysqli_query($mysqlLink, "SET CHARACTER_SET_RESULTS='utf8_general_ci'");
