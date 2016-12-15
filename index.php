<?php

error_reporting( E_ALL );

require_once 'vendor/autoload.php';

$app = OpenCafe\Codalizer\Template::render(
  OpenCafe\Codalizer\ReportGenerator::make("../anetwork-platform")
);
