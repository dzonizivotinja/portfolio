<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $company_name = $_POST['Company-Name'] ?? '';
    $email = $_POST['Email'] ?? '';
    $message = $_POST['Message'] ?? '';
    
    $to = "hello@filipn.me";
    $subject = "New Contact Form Submission";
    $headers = array(
        'From' => 'hello@filipn.me',
        'Reply-To' => $email,
        'X-Mailer' => 'PHP/' . phpversion()
    );
    $header_string = implode("\r\n", array_map(
        function ($v, $k) { return "$k: $v"; },
        $headers,
        array_keys($headers)
    ));
    
    $email_body = "Name: $name\n";
    $email_body .= "Company Name: $company_name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";
    
    if (mail($to, $subject, $email_body, $header_string)) {
        echo "Email Successfully Sent!";
    } else {
        echo "Failed to send the email!";
    }
}
?>
