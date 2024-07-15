<?php
// load_signatures.php
$signatureDir = 'signatures/';

// Check if signature files exist
$signatureA = $signatureDir . 'signatureA.png';
$signatureB = $signatureDir . 'signatureB.png';

if (file_exists($signatureA) && file_exists($signatureB)) {
    // Get timestamp or any other metadata
    $timestamp = filemtime($signatureA); // Example: use file modification time

    // Prepare response
    $response = array(
        'signatureA' => base64_encode(file_get_contents($signatureA)),
        'signatureB' => base64_encode(file_get_contents($signatureB)),
        'timestamp' => $timestamp
    );

    // Send JSON response
    echo json_encode($response);
} else {
    // No signatures found
    echo json_encode(array('error' => 'No signatures found'));
}
?>
