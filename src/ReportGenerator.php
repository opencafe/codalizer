<?php

namespace OpenCafe\Codalizer;

class ReportGenerator
{

    /**
     * Make the report from project
     *
     * @param $path
     * @return bool
     */
    public static function make($path)
    {
        if(file_exists("report.xml")){
            unlink(base_path("report.xml"));
        }

        if(file_exists(base_path("vendor/bin/phpmd"))){
            exec("vendor/bin/phpmd $path xml codesize,unusedcode,naming >> report.xml", $output);
        } else {
            return false;
        }

        // load xml report file
        $xml = simplexml_load_file('report.xml');

        // parse the xml report file
        $result = ReportParser::make($xml);
        $xml->asXML('report.xml');

        // set total fileViolations
        $result['fileViolations'] = count($xml->children());

        // generate report as json file
        if(file_put_contents('FormBuilder.json', json_encode($result) )){
            return true;
        }

        return false;
    }

}
