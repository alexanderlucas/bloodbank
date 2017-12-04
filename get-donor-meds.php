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
$sql="SELECT DISTINCT Medication.name
FROM Medication, Donor, Taking_meds
WHERE Donor.donor_id = ".$q."
 AND Taking_meds.donor_id = Donor.Donor_id
 AND Taking_meds.med_name = Medication.name 
";
$result = mysqli_query($con,$sql);

// echo "!!!!!".boolval($result);
// $row = mysqli_fetch_array($result);

// echo "???".$row;
// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// <th>Hometown</th>
// <th>Job</th>
// </tr>";
$meds = true;
while($row = mysqli_fetch_array($result)) {
	echo "<p>" . $row['name'] ."</p> <br/>";
	$meds = false;
}
if($meds){
	echo "<p>None</p> <br/>";
	
}
// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
