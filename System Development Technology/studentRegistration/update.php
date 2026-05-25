<html>
    <head>
        <title>Update Student</title>
    </head>

    <body>
        <h2 style="text-align: center; background-color:C9E9D2;">Update Student Details</h2>

        <?php
        include "db_conn.php"; // Using database connection file here

        $selectedSubjects = [];

        if (isset($_GET['id'])) {
            $id = $_GET['id']; // Get the id parameter value
            $sql = "SELECT * FROM students WHERE id=$id"; // SQL query to select user data based on id
            $result = mysqli_query($conn, $sql); // Execute the query
            $row = mysqli_fetch_assoc($result); // Fetch the result set into an associative array

            if (!empty($row['subjects'])) {
                $selectedSubjects = explode(", ", $row['subjects']); // Convert subjects string to array
            }
        }
        ?>

        <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <label>Name: </label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

            <label>Student ID: </label>
            <input type="text" name="studentID" value="<?php echo $row['studentID']; ?>" required><br>

            <label>Email: </label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <label>Phone Number: </label>
            <input type="text" name="phoneNO" value="<?php echo $row['phoneNO']; ?>"><br>

            <label>Gender: </label>
            <input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? "checked" : ""; ?>> Male
            <input type="radio" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? "checked" : ""; ?>> Female
            <input type="radio" name="gender" value="Other" <?php echo ($row['gender'] == 'Other') ? "checked" : ""; ?>> Other<br>

            <label>Date of Birth: </label>
            <input type="date" name="birthday" value="<?php echo $row['birthday']; ?>" required><br>

            <label>Program: </label>
            <input type="text" name="program" value="<?php echo $row['program']; ?>"><br>

            <label>Year: </label>
            <input type="text" name="year" value="<?php echo $row['year']; ?>"><br>

            <h3>Subjects:</h3>
            <input type="checkbox" name="subjects[]" value="networkCommunication" <?php echo in_array("networkCommunication", $selectedSubjects) ? "checked" : ""; ?>> Network Communications<br>
            <input type="checkbox" name="subjects[]" value="database" <?php echo in_array("database", $selectedSubjects) ? "checked" : ""; ?>> Database<br>
            <input type="checkbox" name="subjects[]" value="softwareEngineering" <?php echo in_array("softwareEngineering", $selectedSubjects) ? "checked" : ""; ?>> Software Engineering<br>
            <input type="checkbox" name="subjects[]" value="SDT" <?php echo in_array("SDT", $selectedSubjects) ? "checked" : ""; ?>> System Development Technology<br>
            <input type="checkbox" name="subjects[]" value="DSA" <?php echo in_array("DSA", $selectedSubjects) ? "checked" : ""; ?>> Data Structure & Algorithm<br><br>

            <button type="submit">Update Student</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $studentID = $_POST['studentID'];
            $email = $_POST['email'];
            $phoneNO = $_POST['phoneNO'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $program = $_POST['program'];
            $year = $_POST['year'];

            $subjects = isset($_POST['subjects']) ? implode(", ", $_POST['subjects']) : '';

            // Update query to save the modified details
            $sql = "UPDATE students SET name='$name', studentID='$studentID', email='$email', phoneNO='$phoneNO', 
                    gender='$gender', birthday='$birthday', program='$program', year='$year', subjects='$subjects' 
                    WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        $conn->close();
        ?>

        <br>
        <a href="index.php">Back to Student List</a>
    </body>
</html>
