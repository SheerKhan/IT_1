<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author S
 */

//define("DB_HOST", 'localhost');
//define("DB_USER", 'root');
//define("DB_PASSWORD", '');
//define("DB_NAME", 'development');
//define("DB_PORT", '3306');
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "development";
$dbPort = "3306";

//$dbConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
//$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);
$dbConn = mysql_connect($dbHost, $dbUser, $dbPass);
//$password = "test";
if($dbConn){
//    mysqli_select_db($dbConn, $dbName);
    mysql_select_db($dbName);
    print("<strong>Successfully connected to database </string>");
} else {
    die("<strong>Could not connect to database</strong>");
}
