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
$sql="SELECT DISTINCT Patient.name, Patient.pid
FROM Donor, Patient
WHERE Donor.donor_id = ". $q." AND Donor.blood_type = Patient.blood_type
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
while($row = mysqli_fetch_array($result)) {
    echo "<button onclick='displayPatient(this)' id=" . $row["pid"] .">" . $row['name'] ."</button> <br/>";
}
// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
