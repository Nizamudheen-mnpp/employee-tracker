<?php

function apiResponse($errorcode, $errormessage, $data = null,$http_status_code = 200)
{
    $response = [
        'errorcode' => $errorcode,
        'errormessage' => $errormessage,
    ];

    if ($data !== null) {
        $response['data'] = $data;
    }

    return response()->json($response,$http_status_code);
}
