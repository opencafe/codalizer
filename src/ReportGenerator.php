<?php

namespace OpenCafe\Codalizer;

class ReportGenerator {

    /**
     * Make the report from project
     *
     * @param $projectPath
     * @return array
     */
    public static function make($path)
    {
        exec("rm report.xml; vendor/bin/phpmd $path xml codesize,unusedcode,naming >> report.xml");

        $xml = simplexml_load_file('report.xml');

        $result = ReportParser::make($xml);

        $xml->asXML('report.xml');

        $result['fileViolations']  = count($xml->children());

        file_put_contents('FormBuilder.json', json_encode($result) );

        return $result;
    }

}
