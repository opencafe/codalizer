<?php

namespace OpenCafe\Codalizer;

class ReportGenerator {

  public static function make($projectPath) {

    $result['index'] = $result['codeSize'] = $result['naming'] = $result['unused'] = 0;

    /*
     * Create a PHPMD xml report
     */
    shell_exec( 'rm report.xml; vendor/bin/phpmd ' . $projectPath . ' xml codesize,unusedcode,naming >> report.xml' );

    $xml = simplexml_load_file('report.xml');

    foreach($xml->file as $item) {

      foreach($item->violation as $violation) {

        $result['index']++;

        if( $violation['ruleset'] == 'Code Size Rules' ){

          $result['codeSize']++;

        }

        if( $violation['ruleset'] == 'Naming Rules' ){

          $result['naming']++;

        }

        if( $violation['ruleset'] == 'Unused Code Rules' ){

          $result['unused']++;

        }

        $violation->addAttribute('id', $result['index']);

      }

    }

    $xml->asXML('report.xml');

    $result['xmlFile'] = $xml->file;
    $result['fileViolations']  = count($xml->children());

    return $result;

  }

}
