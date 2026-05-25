<?php
session_start(); // Starting session

if(!isset($_SESSION['username'])) { // If session is not set then redirect to Login Page
    header("Location: login.php"); // Redirecting to Login Page
    exit(); // Stop script
}
?>

<html>
    <head>
        <title>List of Registered Students</title>
    </head>

    <body>
        <h2>Welcome,<?php echo $_SESSION['username']; ?>!</h2>
        <a href="logout.php">Log Out</a>
        
        <h2 style="text-align: center; background-color:7AB2D3;">List of Registered Students</h2>
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Student ID</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th> 
                <th>Birthday</th> 
                <th>Program</th>
                <th>Year</th>
                <th>Subjects</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            include "db_conn.php"; // Using database connection file here

            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['studentID'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phoneNO'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>"; 
                    echo "<td>" . $row['birthday'] . "</td>"; 
                    echo "<td>" . $row['program'] . "</td>";
                    echo "<td>" . $row['year'] . "</td>";
                    echo "<td>" . $row['subjects'] . "</td>";
                    echo "<td> <a href='update.php?id=" . $row['id'] . "'> Edit </a> </td>";
                    echo "<td> <a href='delete.php?id=" . $row['id'] . "'> Delete </a> </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'> No data found </td></tr>"; 
            }
            $conn->close();
            ?>
        </table>
        <a href="create.php">Add New Student</a>
    </body>
</html>
