<?php
// Assuming signatures are sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Base64 encoded signature images
    $signatureA = $_POST['signatureA'];
    $signatureB = $_POST['signatureB'];

    // Directory to save signatures
    $signatureDir = 'signatures/';

    // Save signature A
    $filenameA = $signatureDir . 'signatureA.png';
    file_put_contents($filenameA, base64_decode(str_replace('data:image/png;base64,', '', $signatureA)));

    // Save signature B
    $filenameB = $signatureDir . 'signatureB.png';
    file_put_contents($filenameB, base64_decode(str_replace('data:image/png;base64,', '', $signatureB)));

    // Optionally, store these filenames in a database with timestamps for reference

    // Respond with success
    echo json_encode(array('success' => true));
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
