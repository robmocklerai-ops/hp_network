<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? 'Unknown';
    $email = $_POST['email'] ?? 'Unknown';
    $phone = $_POST['phone'] ?? 'N/A';
    $subject = $_POST['subject'] ?? 'No Subject';
    $message = $_POST['message'] ?? 'No Message';
    $date = date('Y-m-d H:i:s');

    $logEntry = "[$date] Name: $name, Email: $email, Phone: $phone, Subject: $subject, Message: $message\n";
    
    // Log to a local file
    file_put_contents('feedback_logs.txt', $logEntry, FILE_APPEND);
    
    // Also save to CSV
    $csvEntry = [$date, $name, $email, $phone, $subject, $message];
    $fp = fopen('feedback.csv', 'a');
    fputcsv($fp, $csvEntry);
    fclose($fp);

    echo "Success";
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
