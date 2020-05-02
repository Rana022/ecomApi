<?php

namespace App\Exceptions;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
   public function apiException($request, $e){

    if($e instanceof ModelNotFoundException){
        return response()->Json([
            'error' => 'Model Not Found'
        ],Response::HTTP_NOT_FOUND);
    }
    if($e instanceof NotFoundHttpException){
    return response()->Json([
        'error' => 'Invalid Route'
    ],Response::HTTP_NOT_FOUND);
}

return parent::render($request, $e);
  
   }
}