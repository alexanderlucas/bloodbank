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
$sql="SELECT * FROM Patient ORDER BY FIELD(Status, 'red', 'yellow', 'green')";
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
    echo "<button onclick='displayPatient(this)' id=" . $row["pid"] .">" . $row['name'] . "  <span class=".$row['status'].">●</span></button>";
    
}
// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
