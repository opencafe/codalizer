<?php

namespace OpenCafe\Codalizer;

use League\Plates\Engine;

class PageLoader{

  public static function render($input){

    $templates = new Engine( __DIR__ . '/../../templates' );

    echo $templates->render('page', ['title' => 'Main Page',
                                     'fileViolations' => $input['fileViolations'],
                                     'violations' => $input['index'],
                                     'details' => $input['details'],
                                     'codeSize' => $input['codeSize'],
                                     'naming' => $input['naming'],
                                     'unused' => $input['unused'],
                                     'details' => $input['details']
                                     ]);

  }

}
