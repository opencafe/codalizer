<?php

error_reporting( E_ALL );

use OpenCafe\Codalizer\Loader;

require __DIR__ . '/vendor/autoload.php';

Loader::render('main',json_decode(
    file_get_contents('FormBuilder.json', true), true
));
