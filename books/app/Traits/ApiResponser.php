<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

    /**
     * @param string|array $data
     * @param int $code
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response([
            'data'=>$data
        ],$code);
    }

    /**
     * @param string|array $data
     * @param int $code
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function errorResponse($message, $code)
    {
        return response([
            'error'=>$message,
            'code' =>$code
        ],$code);
    }
}
