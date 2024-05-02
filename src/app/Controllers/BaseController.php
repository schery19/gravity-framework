<?php

namespace App\Controllers;

use Gravity\Core\App\Controllers\Controller;

class BaseController extends Controller {

    /**
     * Sending a success response
     * 
     * @param mixed $data
     * @param mixed $message
     * @param mixed $code
     */
    public function sendResponse($data, $message = "Successful", $code=200) {
        $response = [
            'error' => false,
            'status'=>$code,
            'message' => $message,
            'data' => $data
        ];

        return $this->renderJson($response, $code);
    }


    /**
     * Sending an error message
     * 
     * @param mixed $error
     * @param mixed $errorMessages
     * @param mixed $code
     */
    public function sendError($error, $errorMessages = [], $code = 404) {
        $response = [
            'error'=> true,
            'status'=>$code,
            'message'=> $error
        ];

        if(!empty($errorMessages)) {
            $response['issues'] = $errorMessages;
        }

        return $this->renderJson($response, $code);
    }

}

?>