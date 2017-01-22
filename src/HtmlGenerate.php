<?php

namespace OpenCafe\Codalizer;

class HtmlGenerate 
{
    use FileSystem;

    /**
     * File params
     *
     * @var array
     */
    protected $params = [];

    /**
     * HtmlGenerate constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->params = json_decode(file_get_contents(
            base_path('FormBuilder.json'), true), true
        );
    }

    /**
     * Generate pages
     *
     * @return void
     */
    public function generatePages()
    {
        $this->generateMainPage();

        for($index = 1;$index < count($this->params['details']) + 1;$index++){
            $_REQUEST['id'] = $index;

            $this->make('page_' . $index, Loader::render('page',$this->params));
        }
    }

    /**
     * Generate main page
     *
     * @return void
     */
    public function generateMainPage()
    {
        $this->make('index', Loader::render('main',$this->params));
    }

    /**
     * Generate html file
     *
     * @param $file
     * @param $datas
     */
    public function make($file, $datas)
    {
        $file = $this->open($file)->write($datas);

        $file->create();
    }
    
}