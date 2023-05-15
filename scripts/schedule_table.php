<?php
// Connect to the database
$serverName = "(local)";
$connectionInfo = array( "Database"=>"Test_Database");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

// Check if the connection was successful
if ($conn === false) {
    echo "Unable to connect to the database.<br/>";
    die(print_r(sqlsrv_errors(), true));
}

// Query the database for schedule information
$query = "SELECT Courses.CourseID, Courses.CourseName, Courses.Credits, Schedule.Instructor, Schedule.Room, Schedule.MeetingTime FROM Courses INNER JOIN Schedule ON Courses.CourseID = Schedule.CourseID";
$result = sqlsrv_query($conn, $query);

// Loop through the query results and display in HTML table
while ($row = sqlsrv_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['CourseID']."</td>";
    echo "<td>".$row['CourseName']."</td>";
    echo "<td>".$row['Credits']."</td>";
    echo "<td>".$row['Instructor']."</td>";
    echo "<td>".$row['Room']."</td>";
    echo "<td>".$row['MeetingTime']->format('Y-m-d H:i:s')."</td>";
    echo "</tr>";
}

// Close database connection
sqlsrv_close($conn);
?>
