<?php
$response = array();

if (isset($_POST['submit'])) {
    // Read zone IDs and API key from JSON file
    $file_path = 'config/data.json';
    $json_data = file_get_contents($file_path);
    $data = json_decode($json_data, true);

    $zone_ids = $data['zone_ids'];
    $api_token = $data['api_token'];

    $zone_name = $_POST['zone'];
    $subdomain_name = $_POST['subdomain'];
    $ip_address = $_POST['ip'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/" . $zone_ids[$zone_name] . "/dns_records");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"type\":\"A\",\"name\":\"" . $subdomain_name . "\",\"content\":\"" . $ip_address . "\",\"ttl\":1, \"proxied\":true}");
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = array();
    $headers[] = "Authorization: Bearer " . $api_token;
    $headers[] = "Content-Type: application/json";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch) || $httpcode != 200) {
        $error_message = 'Failed to create subdomain ' . $subdomain_name . '.' . $zone_name . '.';
        $encoded_error_message = base64_encode($error_message);
        $error_message = "Subdomain [ $subdomain_name.$zone_name ] gagal dibuat ada kesalahan.";

        $response['success'] = false;
        $response['message'] = $error_message;
    } else {
        $message = $subdomain_name . '.' . $zone_name;

        $response['success'] = true;
        $response['message'] = $message;
    }
    curl_close($ch);
} else {
    $response['success'] = false;
    $response['message'] = 'Form not submitted.';
}

// Set the content type to JSON
header('Content-Type: application/json');

// Output the response as JSON
echo json_encode($response);
?>
