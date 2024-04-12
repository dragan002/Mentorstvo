<?php
require_once 'models/Product.php';
require_once 'models/Database.php';

$potato = new Product('Potato','Sweet like sweeter', '9.22', 'image.jpg', 2);
$potato->save();
