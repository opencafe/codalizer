<?php

class CodilizerUnitTest extends PHPUnit_Framework_TestCase
{
    /**
     * Generate report test
     *
     * @return void
     */
    public function testGenerateCommand()
    {
        if(! is_dir("datium")){
            exec("git clone https://github.com/opencafe/datium");
        }

        exec("php codalizer generate:report datium/");

        $this->assertFileExists("FormBuilder.json");

        $this->assertFileExists("report.xml");
    }
}