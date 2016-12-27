<?php

namespace OpenCafe\Codalizer;

use OpenCafe\Codalizer\ReportParser;

class ReportGenerator {

  public static function make($projectPath) {

    $result['index'] = $result['codeSize'] = $result['naming'] = $result['unused'] = 0;

    /*
     * Create a PHPMD xml report
     */
    shell_exec( 'rm report.xml; vendor/bin/phpmd ' . $projectPath . ' xml codesize,unusedcode,naming >> report.xml' );

    $xml = simplexml_load_file('report.xml');

    $result = ReportParser::make($xml);

    $xml->asXML('report.xml');

    $result['fileViolations']  = count($xml->children());

    file_put_contents('FormBuilder.json', json_encode($result) );

    return $result;

  }

}
