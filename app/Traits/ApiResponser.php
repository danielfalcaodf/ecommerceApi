<?php


namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    protected  function sendResponse($result, $message, $code = 200)
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

    protected  function sendError($error, $errorMessages = [], $code = 404)
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