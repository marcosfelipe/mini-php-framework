<?php

require 'core/database/mysql_connection.php';

MysqlConnection::$dbname = '';

$mysql = new MysqlConnection();

// cria o db
$mysql->query('create database if not exists mapa');
$mysql->use_db('mapa');

// criando db e tabelas
$mysql->multi_query(file_get_contents('dump.sql')) or exit("dump.sql invalido: {$mysql->error()}");

// redireciona para index.php
header('Location: index.php');
