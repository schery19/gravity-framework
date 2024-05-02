<?php

namespace App\Controllers;

use Gravity\Core\App\Controllers\Controller;

class BaseController extends Controller {

    /**
     * Sending a success response
     * 
     * @param string $view
     * @param string $layout
     * @param array $data
     * @param int $code
     */
    public function sendResponse($view, $layout, $data = array(), $code=200) {

        header("HTTP/1.1 {$code}");

        return $this->renderView($view, $layout, $data);
    }


    /**
     * Sending an error message
     * 
     * @param mixed $error
     * @param int $code
     */
    public function sendError($error, $code = 404) {

        $view = '';

        if($code == 404)
            $view = 'GRAVITY.ERRORS.404';
        else
            $view = 'GRAVITY.ERRORS.internal';
        
        header("HTTP/1.1 {$code}");

        return $this->renderView($view, 'GRAVITY.layout', ['error'=>$error]);
    }

}

?>
