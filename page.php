<?php

error_reporting( E_ALL );

require __DIR__ . '/vendor/autoload.php';

OpenCafe\Codalizer\Loader::render('page',json_decode(
    file_get_contents('FormBuilder.json', true), true
));
