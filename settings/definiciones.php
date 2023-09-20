<?php

$host = $_SERVER['HTTP_HOST'];

//Segun el host a que base se apunta
if ($host == 'www.dnm.gov.ar') {
    define('SERVER_DB','NOMINAS');
   
} elseif ($host == 'www1.dnm.gov.ar') {
    define('SERVER_DB','NOMINAS_DESARROLLO');
}