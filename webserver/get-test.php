<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('eecs341finalproject.clsvctncuryj.us-east-2.rds.amazonaws.com','eecs341','eecs341bloodbank','BloodBank', '3306');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM Disease";
$result = mysqli_query($con,$sql);

echo mysqli_fetch_array($result);

// echo "<table>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// <th>Hometown</th>
// <th>Job</th>
// </tr>";
while($row = mysqli_fetch_array($result)) {
    echo $row[0];
}
// echo "</table>";
mysqli_close($con);
?>
</body>
</html>
