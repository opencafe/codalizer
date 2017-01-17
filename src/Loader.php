<?php

namespace OpenCafe\Codalizer;

class Loader
{

    /**
     * Render the template
     *
     * @param $input
     * @return string
     */
    public static function render($name,array $input)
    {
        return view($name,[
            'title' => 'Main Page',
            'fileViolations' => $input['fileViolations'],
            'violations' => $input['index'],
            'details' => $input['details'],
            'codeSize' => $input['codeSize'],
            'naming' => $input['naming'],
            'unused' => $input['unused']
        ]);
    }
    
}
