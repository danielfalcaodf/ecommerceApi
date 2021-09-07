<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $code = 200)
    {
        $response = [

            'message' => $message,
            'type' => 'success',
            'data'    => $result,
            'code' => $code
        ];


        return response()->json($response, $code);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [

            'type' => 'error',
            'message' => $error,
            'code' => $code
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}