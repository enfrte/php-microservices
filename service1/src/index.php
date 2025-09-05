<?php

// The URL of service2, accessible via Docker's internal network
$service2Url = 'http://service2:8002';

// Initialize a cURL session to service2
$ch = curl_init($service2Url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string

// Execute the request and get the response
$response = curl_exec($ch);

// Check for errors and output the result
if ($response === false) {
    echo "Curl error: " . curl_error($ch);
} else {
    echo "Response from Service 2: " . $response;
}

// Close the cURL session
curl_close($ch);
