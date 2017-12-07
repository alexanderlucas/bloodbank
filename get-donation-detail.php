<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$d = intval($_GET['donor_id']);
$p = intval($_GET['patient_id']);
$b = intval($_GET['bank_id']);


$con = mysqli_connect('eecs341finalproject.clsvctncuryj.us-east-2.rds.amazonaws.com','eecs341','eecs341bloodbank','BloodBank', '3306');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT Donor.name as dname, Patient.name as pname
FROM Patient, Donor
WHERE Patient.pid = '".$p."' AND Donor.donor_id = '".$d."'
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
    echo "<h3>Donor: </h3>" . $row['dname']."<br>";
    echo "<h3>Patient: </h3>" . $row['pname'];
    
}

// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
