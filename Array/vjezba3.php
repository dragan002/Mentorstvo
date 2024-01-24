<?php

$shoes = ['Reebok', 'Adidas', 'Nike'];
sort($shoes);
unset($shoes[1]);
var_dump($shoes);