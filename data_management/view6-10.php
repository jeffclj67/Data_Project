<?php
include_once 'include/db_connect.php';

//view 6
print"<h4>View 6: statistical analysis on tutor’s rate.</h4>";

$sql6 = "CREATE VIEW salary AS
select sum(rate), max(rate), min(rate), avg(rate)
from tutor";
$v6 = $conn->query($sql6);
$v6result = $conn->query("SELECT * FROM salary;");
echo "<table border='1'>
<tr>
<th>sum(rate)</th>
<th>max(rate)</th>
<th>min(rate)</th>
<th>avg(rate)</th>
</tr>";
while ($r = $v6result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "<td>" . $r[2] . "</td>";
echo "<td>" . $r[3] . "</td>";
echo "</tr>";
} 
echo "</table>";
// end of view 6

//view 7
print"<h4>View 7: list the number of tutor comes from each company</h4>";

$sql7 = "CREATE VIEW each_company AS
SELECT count(*), Company
FROM tutor
GROUP BY Company";
$v7 = $conn->query($sql7);
$v7result = $conn->query("SELECT * FROM each_company;");
echo "<table border='1'>
<tr>
<th>count</th>
<th>Company</th>
</tr>";
while ($r = $v7result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "</tr>";
} 
echo "</table>";
// end of view 7

//view 8
print"<h4>View 8: list the number of students from each school</h4>";

$sql8 = "CREATE VIEW `each_school` AS
SELECT count(*), School_name
FROM students, school
WHERE students.School_no = school.school_no
GROUP BY School_name";
$v8 = $conn->query($sql8);
$v8result = $conn->query("SELECT * FROM each_school;");
echo "<table border='1'>
<tr>
<th>count</th>
<th>School_name</th>
</tr>";
while ($r = $v8result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "</tr>";
} 
echo "</table>";
// end of view 8

//view 9
print"<h4>View 9: list the students who are not from UOIT</h4>";

$sql9 = "CREATE VIEW not_uoit AS
select *
from students
where not exists ( select *
				   from school
                   where students.School_no = school.School_no
                   and School_name = 'UOIT')";
$v9 = $conn->query($sql9);
$v9result = $conn->query("SELECT * FROM not_uoit;");
echo "<table border='1'>
<tr>
<th>Id</th>
<th>Fname</th>
<th>Lname</th>
<th>School_no</th>
</tr>";
while ($r = $v9result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "<td>" . $r[2] . "</td>";
echo "<td>" . $r[3] . "</td>";

echo "</tr>";
} 
echo "</table>";
// end of view 9

//view 10
print"<h4>View 10: list the students who hasn’t asked questions.</h4>";

$sql10 = "CREATE VIEW `never_ask` AS
select Fname,Lname
from students
where not exists ( select *
				   from questions_raised
                   where students.Id = questions_raised.Stu_id)";
$v10 = $conn->query($sql10);
$v10result = $conn->query("SELECT * FROM never_ask;");
echo "<table border='1'>
<tr>
<th>Fname</th>
<th>Lname</th>
</tr>";
while ($r = $v10result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "</tr>";
} 
echo "</table>";
// end of view 10

print"<br>";
echo '<a href="index.php">Back to main</a>';
?>