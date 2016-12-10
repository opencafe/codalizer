<?php

error_reporting( E_ALL );

require_once 'vendor/autoload.php';

shell_exec( 'rm report.xml; vendor/bin/phpmd ../datium xml codesize,unusedcode,naming >> report.xml' );

$xml = simplexml_load_file('report.xml');

$index = 0;
$codeSize = 0;
$naming = 0;
$unused = 0;

foreach($xml->file as $item) {

  foreach($item->violation as $violation) {

    $index++;

    if( $violation['ruleset'] == 'Code Size Rules' ){

      $codeSize++;

    }

    if( $violation['ruleset'] == 'Naming Rules' ){

      $naming++;

    }

    if( $violation['ruleset'] == 'Unused Code Rules' ){

      $unused++;

    }

    $violation->addAttribute('id', $index);

  }

}

$xml->asXML('report.xml');

$templates = new League\Plates\Engine( __DIR__ . '/templates' );

echo $templates->render('main', ['title' => 'Main Page',
                                 'fileViolations' => count($xml->children()),
                                 'violations' => $index,
                                 'items' => $xml->file,
                                 'codeSize' => $codeSize,
                                 'naming' => $naming,
                                 'unused' => $unused
                                 ]);
