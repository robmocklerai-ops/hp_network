<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact = $_POST['contact'] ?? 'Unknown';
    $date = date('Y-m-d H:i:s');

    $logEntry = "[$date] Tradesperson Login Attempt: $contact\n";
    
    // Log to a local file
    file_put_contents('tradesperson_auth_logs.txt', $logEntry, FILE_APPEND);
    
    echo "Success";
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
