<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Exceptions\Status;

class BaseController extends Controller{

public function sendResponse($results, $messages = "", $code = 200){
    $response = [
    'status' =>$code,
    'success' =>true,
    'message' =>$messages,
    'data' =>$results
];

    return response()->json($response)->setStatusCode($code, Status::getStatusMessage($code));

}

public function sendError($error, $errorMessage = [], $code = 404){
    $response = [
    'status' =>$code,
    'success' =>false,
    'message' =>$error,
    
];

if(!empty($errorMessage)){
    $response['data'] = $errorMessage; 
}
    return response()->json($response)->setStatusCode($code, Status::getStatusMessage($code));

}
}