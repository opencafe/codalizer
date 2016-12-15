<?php

namespace OpenCafe\Codalizer;

use League\Plates\Engine;

class Template{

  public static function render($input){

    $templates = new Engine( __DIR__ . '/../templates' );

    echo $templates->render('main', ['title' => 'Main Page',
                                     'fileViolations' => $input['fileViolations'],
                                     'violations' => $input['index'],
                                     'items' => $input['xmlFile'],
                                     'codeSize' => $input['codeSize'],
                                     'naming' => $input['naming'],
                                     'unused' => $input['unused']
                                     ]);

  }

}
