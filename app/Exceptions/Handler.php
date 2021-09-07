<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\BaseController;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($request->is("api/*")) {

            $baseCon = new  BaseController();

            if ($exception instanceof ValidationException) {
                return  $baseCon->sendError('Campos inválidos', $exception->errors(), $exception->status);
            }

            return  $baseCon->sendError('Error', ['errors' => $exception->getMessage()], 422);
        }
        return parent::render($request, $exception);
    }
}