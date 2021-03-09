<?php

foreach (range(0, 10000) as $n) {
    $x = $n * rand(0, 1000);
}

echo json_encode(
    [
        'isBase64Encoded' => false,
        'statusCode' => 200,
        'body' => '<html><body style="background-color: #f08080">woot woot - ' . phpversion() . ' </body></html>',
        'headers' => [
            'Content-Type' => 'text/html'
        ]
    ]
);
