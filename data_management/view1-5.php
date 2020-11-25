<?php 
include_once 'include/db_connect.php';

//view 1
print"<h4>View 1:List all tutors who has a job, the question_id they work on, and the income.</h4>";

$sql1 = "CREATE VIEW income
AS SELECT Name, works_on.Question_id, (Rate * Hours)
FROM tutor, questions_raised, works_on
Where works_on.Tutor_id = tutor.Tutor_id AND works_on.Question_id = questions_raised.Question_id;";
$v1 = mysqli_query($conn, $sql1);
$v1result = $conn->query("SELECT * FROM income;");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Question_id</th>
<th>Rate * Hours</th>
</tr>";
while ($r =  $v1result->fetch_array()) {
echo "<tr>";
echo "<td>" . $r['Name'] . "</td>";
echo "<td>" . $r['Question_id'] . "</td>";
echo "<td>" . $r['(Rate * Hours)'] . "</td>";
echo "</tr>";
}
echo "</table>";

//view 2
print"<h4>View 2:List the tutor's name and rate who earn more than any tutor who is from Easypass company.</h4>";

$sql2 = "CREATE VIEW rate_compare AS
Select tutor.Name, Rate
from tutor
where Rate > Any ( Select Rate 
                   From tutor
                   where Company = 'Easypass');";
$v2 = $conn->query($sql2);
$v2result = $conn->query("SELECT * FROM rate_compare;");
echo "<table border='1'>
<tr>
<th>Name</th>
<th>Rate</th>
</tr>";
while ($r = $v2result->fetch_array()){
echo "<tr>";
echo "<td>" . $r['Name'] . "</td>";
echo "<td>" . $r['Rate'] . "</td>";
echo "</tr>";
} 
echo "</table>";
// end of view 2

//view 3
print"<h4>View 3:List students who asked questions on Calculus.</h4>";

$sql3 = "CREATE VIEW ask_calculus AS
SELECT * 
FROM students AS S, questions_raised AS Q
WHERE Q.Subject = 'Calculus' AND Q.Stu_id = S.ID;";
$v3 = $conn->query($sql3);
$v3result = $conn->query("SELECT * FROM ask_calculus;");
echo "<table border='1'>
<tr>
<th>Id</th>
<th>Fname</th>
<th>Lname</th>
<th>School_no</th>
<th>Question_id</th>
<th>Stu_id</th>
<th>Subject</th>
</tr>";
while ($r = $v3result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "<td>" . $r[2] . "</td>";
echo "<td>" . $r[3] . "</td>";
echo "<td>" . $r[4] . "</td>";
echo "<td>" . $r[5] . "</td>";
echo "<td>" . $r[6] . "</td>";
echo "</tr>";
} 
echo "</table>";

//view 4
print"<h4>View 4:Show all correlation between students and school names..</h4>";

$sql4 = "CREATE VIEW school_name AS
SELECT Fname,Lname,School_name FROM students
LEFT JOIN school ON students.School_no = school.School_no
UNION
SELECT Fname,Lname,School_name FROM students
RIGHT JOIN school ON students.School_no = school.School_no;";
$v4 = $conn->query($sql4);
$v4result = $conn->query("SELECT * FROM school_name;");
echo "<table border='1'>
<tr>
<th>Fname</th>
<th>Lname</th>
<th>School_name</th>
</tr>";
while ($r = $v4result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "<td>" . $r[2] . "</td>";
echo "</tr>";
} 
echo "</table>";
// end of view 4

//view 5
print"<h4>View 5:List students who either attend Western, or asked questions on Chemistry.</h4>";

$sql5 = "CREATE VIEW either AS
(SELECT DISTINCT Fname, Lname
 FROM students, school
 WHERE students.School_no = school.School_no 
       AND School_name = 'Western')
UNION
(SELECT DISTINCT Fname, Lname
 FROM students, questions_raised
 WHERE Id = Stu_id AND Subject = 'Chemistry')";
$v5 = $conn->query($sql5);
$v5result = $conn->query("SELECT * FROM either;");
echo "<table border='1'>
<tr>
<th>Fname</th>
<th>Lname</th>
</tr>";
while ($r = $v5result->fetch_array()){
echo "<tr>";
echo "<td>" . $r[0] . "</td>";
echo "<td>" . $r[1] . "</td>";
echo "</tr>";
} 
echo "</table>";
// end of view 5

print"<br>";
echo '<a href="index.php">Back to main</a>';


?>