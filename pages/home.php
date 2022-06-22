<?php

use App\Database;

$db = new Database('blog_php');
$datas = $db->query('SELECT * FROM post');
var_dump($datas[0]->title);

