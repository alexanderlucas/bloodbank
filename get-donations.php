<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

$con = mysqli_connect('eecs341finalproject.clsvctncuryj.us-east-2.rds.amazonaws.com','eecs341','eecs341bloodbank','BloodBank', '3306');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT *
FROM Donation
ORDER BY donation_date DESC
";
$result = mysqli_query($con,$sql);
// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// <th>Hometown</th>
// <th>Job</th>
// </tr>";
while($row = mysqli_fetch_array($result)){
    echo "<button onclick='getDonationDetail(this)' id='" . $row["donor_id"] . "," . $row["pid"] . "," . $row["bid"] ."'>" . substr($row['donation_date'],5 ,2) . "," . substr($row['donation_date'],8 ,2) . "," . substr($row['donation_date'],0 ,4) . "<span id='btype'>" . $row['amount'] ." mL</span>";
    
}

// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
