<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('eecs341finalproject.clsvctncuryj.us-east-2.rds.amazonaws.com','eecs341','eecs341bloodbank','BloodBank', '3306');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM Donor WHERE donor_id = '".$q."'";

$result = mysqli_query($con,$sql);


// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// <th>Hometown</th>
// <th>Job</th>
// </tr>";
    $row = mysqli_fetch_array($result);
    echo "<h1 id='name'>" . $row["name"] . "<span id='btype'>" . $row["blood_type"] . "</span>" . "</h1>";
    // echo "<h3 id='hospital'>" . $row["hospital"] . "</h3> <br>";    
    echo "<div>";
    echo "<span class='label'>Age: <span class='value' id='age'>" . $row["age"] . "</span></span> <span class='label'>Sex: <span class='value' id='sex'>" . $row["sex"] . "</span></span> <br>";
    echo "<span class='label'>Height: <span class='value' id='height'>" . (int)($row["height"]/12) . "'" . $row["height"]%12 . "\"</span></span> <span class='label'>Weight: <span class='value' id='weight'>" . $row["weight"] . " lbs</span></span> <br><br>";
    echo "<span id='address'>" . $row["address"] . "</span><br><br>";
    echo "<span id='phone number'>(" . substr($row["phone_number"], 0, 3) . ") " . substr($row["phone_number"], 3, 3) . "-" . substr($row["phone_number"], 6) ."</span><br/>";    
    echo "</div>";
    // echo $row["phone_number"];
    

// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
