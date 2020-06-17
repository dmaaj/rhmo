<?php

function throwError($data, int $status = 400)
{
    header('Content-Type: application/json');
    http_response_code(400);
    echo json_encode(['error' => $data]);
    die();
}