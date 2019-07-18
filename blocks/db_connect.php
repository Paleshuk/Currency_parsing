<?php

$mysqlLink = mysqli_connect('127.0.0.1', 'admin_current', '123123', 'Currency');

mysqli_query($mysqlLink, "SET NAMES utf8");

mysqli_query($mysqlLink, "SET CHARACTER_SET_RESULTS='utf8_general_ci'");