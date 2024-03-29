<?php

$serverUrl = 'http://localhost:4000/quotes';

// Get the ID from the query parameters
$id = $_GET['id'];

$url = $serverUrl . '/' . $id;


$headers = [
    'Content-Type: application/json',
];

// Create a stream context for HTTP headers
$context = stream_context_create([
    'http' => [
        'header' => implode("\r\n", $headers),
        'method' => 'DELETE'
    ]
]);

// Add a delay before sending the request
usleep(1000000); // Delay for 1 second (in microseconds)


// Send the DELETE request
$result = file_get_contents($url, false, $context);

// Handle the response
if ($result === false) {
    // Error occurred
    echo 'Error: Unable to delete data.';
} else {
    // Success
    echo '1';
}

?>