<?php

        $conn=mysqli_connect('localhost','root','','safepal');
        if(!$conn){
            echo "Connection failed";
        }

// Get the public IP address in IPv4 format using ipify API
$public_ip_response = file_get_contents('https://api.ipify.org?format=json&ipv=4');
$public_ip_data = json_decode($public_ip_response, true);

if ($public_ip_data && isset($public_ip_data['ip'])) {
    $public_ipv4 = $public_ip_data['ip'];

    
}
?>
