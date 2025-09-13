<?php

require "Utils\Operations.php";

//! metodo sin use
// $op = new Utils\Operations();

use Utils\Operations;
$op = new Operations();

echo $op->add(2, 3);