<?php
echo "<h1>Homework Share Database</h1>";

include_once 'include/db_connect.php';

//table1
print"<h2>main tables</h2>";

print"<h4>schools</h4>";
$sql = "SELECT * FROM school;";
$result = $conn->query($sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
	echo "<table border = '1'>
	<tr>
	<th>School_no</th>
	<th>School_name</th>
	</tr>";
	while($row = $result->fetch_array()){
		echo "<tr>";
		echo "<td>".$row['School_no']."</td>";
		echo "<td>".$row['School_name']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
//end of table 1

//table2
print"<h4>students</h4>";
$sql2 = "SELECT * FROM students;";
$result2 = $conn->query($sql2);
$result2Check = mysqli_num_rows($result2);
if($result2Check > 0){
	echo "<table border = '1'>
	<tr>
	<th>Id</th>
	<th>Fname</th>
	<th>Lname</th>
	<th>School_no</th>
	</tr>";
	while($row =  $result2->fetch_array()){
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
//end of table 2

//table3
print"<h4>tutor</h4>";
$sql3 = "SELECT * FROM tutor;";
$result3 = $conn->query($sql3);
$result3Check = mysqli_num_rows($result3);
if($result2Check > 0){
	echo "<table border = '1'>
	<tr>
	<th>Tutor_id</th>
	<th>Name</th>
	<th>Rate</th>
	<th>Company</th>
	</tr>";
	while($row =  $result3->fetch_array()){
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
//end of table 3

//table4
print"<h4>questions_raised</h4>";
$sql4 = "SELECT * FROM questions_raised;";
$result4 = $conn->query($sql4);
$result4Check = mysqli_num_rows($result4);
if($result4Check > 0){
	echo "<table border = '1'>
	<tr>
	<th>Question_id</th>
	<th>Stu_id</th>
	<th>Subject</th>
	</tr>";
	while($row =  $result4->fetch_array()){
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
//end of table 4

//table5
print"<h4>works_on</h4>";
$sql5 = "SELECT * FROM works_on;";
$result5 = $conn->query($sql5);
$result5Check = mysqli_num_rows($result5);
if($result5Check > 0){
	echo "<table border = '1'>
	<tr>
	<th>Tutor_id</th>
	<th>Question_id</th>
	<th>Hours</th>
	</tr>";
	while($row =  $result5->fetch_array()){
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
//end of table 5

//
print"<br>";
echo '<a href="view1-5.php">Report 1</a>';
print"<br>";
print"<br>";

echo '<a href="view6-10.php">Report 2</a>';


?>