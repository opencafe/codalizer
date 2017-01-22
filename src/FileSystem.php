<?php

namespace OpenCafe\Codalizer;

trait FileSystem
{
    /**
     * File information
     *
     * @var array
     */
    protected $file = [];

    /**
     * File path
     *
     * @var string
     */
    protected $path = 'public';

    /**
     * Datas of file
     *
     * @var string
     */
    protected $datas = null;

    /**
     * Set file informations
     *
     * @param $file
     * @param int $mode
     * @return $this
     */
    protected function open($file, $mode = 777)
    {
        if(! preg_match('/' . $this->path . '/',$file)){

            $file = base_path(
                $this->path . '/' . str_replace('.html', '', $file) . '.html'
            );
        }

        if(! file_exists($file)){
            touch($file,$mode);
        }

        $this->file = $file;

        return $this;
    }

    /**
     * set datas of file
     *
     * @param $datas
     */
    protected function write($datas)
    {
        $this->datas = $datas;

        return $this;
    }

    /**
     * Create a new file
     *
     * @return void
     */
    protected function create()
    {
        file_put_contents($this->file ,$this->datas);
    }

}