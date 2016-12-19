<?php

error_reporting( E_ALL );

require_once 'vendor/autoload.php';

$app = OpenCafe\Codalizer\Template::render(
  (array)file_get_contents('FormBuilder.json', true)
);
