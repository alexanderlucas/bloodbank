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
$sql="SELECT distinct PotentialDonor.name, PotentialDonor.donor_id FROM (
	SELECT  distinct Donor.name, Donor.blood_type, Donor.donor_id
	FROM Donor, Taking_meds, Has_disease, Disease, Medication
	WHERE Donor.donor_id = Taking_meds.donor_id
	AND Donor.donor_id = Has_disease.donor_id
	AND Has_disease.disease_name = Disease.name
	AND Taking_meds.med_name = Medication.name
	AND Disease.status <> 'Cannot donate'
	AND Medication.status <> 'Cannot Donate'
	UNION
	SELECT Distinct Donor.name, Donor.blood_type, Donor.donor_id
	FROM Donor, Taking_meds, Has_disease
	WHERE Donor.donor_id NOT IN (SELECT Taking_meds.donor_id FROM Taking_meds)
	AND Donor.donor_id NOT IN (SELECT Has_disease.donor_id FROM Has_disease)) 
    AS PotentialDonor, Patient, Donor
    WHERE Patient.pid = ".$q." AND Patient.blood_type = PotentialDonor.blood_type";
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
    echo "<button onclick='displayDonor(this)' id=" . $row["donor_id"] .">" . $row['name'] ."</button> <br/>";
}
// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
