<html>
<head>
    <title>Student Registration Form</title>
    <!-- CSS File -->
    <style>
        img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    </style>
</head>
<body>
    <img src="logo_utm.png" alt="This is UTM Logo" width="450" height="150">
    <h1 style="text-align: center;">Student Registration Form</h1>
    <h3 style="background-color:rgb(135, 162, 255);">Student Personal Details:</h3>
    
    <form action="create.php" method="POST">
        <label>Name: </label>
        <input type="text" id="name" name="name" required><br>

        <label>Student ID: </label>
        <input type="text" id="studentID" name="studentID" required><br>

        <label>Email: </label>
        <input type="email" id="email" name="email" required><br>

        <label>Phone Number: </label>
        <input type="text" id="phoneNO" name="phoneNO" required><br>

        <label>Gender: </label><br>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="Other">
        <label for="other">Other</label><br>

        <label for="birthday">Date of Birth: </label>
        <input type="date" id="birthday" name="birthday" required><br>  

        <h3 style="background-color: rgb(196, 215, 255);">Academic Information:</h3>
        <label for="program">Program of Study:</label>
        <select id="program" name="program">
            <option value="dataEngineering">Data Engineering</option>
            <option value="software">Software Engineering</option>
            <option value="network">Network Security</option>
            <option value="graphic">Graphic Design</option>
            <option value="bioinformatics">Bioinformatics</option>
        </select><br>

        <label for="year">Year of Study:</label>
        <select id="year" name="year">
            <option value="year1">Year 1</option>
            <option value="year2">Year 2</option>
            <option value="year3">Year 3</option>
            <option value="year4">Year 4</option>
        </select><br>

        <h3 style="background-color: rgb(255, 215, 196);">Subjects Selection:</h3>
        <label for="subject">Subjects:</label><br>
        <input type="checkbox" id="subj1" name="subj1" value="networkCommunication">
        <label for="subj1">Network Communications</label><br>
        
        <input type="checkbox" id="subj2" name="subj2" value="database">
        <label for="subj2">Database</label><br>
        
        <input type="checkbox" id="subj3" name="subj3" value="softwareEngineering">
        <label for="subj3">Software Engineering</label><br>
        
        <input type="checkbox" id="subj4" name="subj4" value="SDT">
        <label for="subj4">System Development Technology</label><br>
        
        <input type="checkbox" id="subj5" name="subj5" value="DSA">
        <label for="subj5">Data Structure & Algorithm</label><br><br>
        
        <input type="reset" value="Reset" style="background-color: rgb(237, 23, 23);">
        <input type="submit" value="Submit" style="background-color: rgb(237, 23, 23);">

    </form>
</body>
</html>

<?php
// Include the database connection file
include 'db_conn.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $phoneNO = $_POST['phoneNO'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $program = $_POST['program'];
    $year = $_POST['year'];

    // Handle subjects (checkboxes) - if checked, add to $subjects array
    $subjects = [];
    if (isset($_POST['subj1'])) $subjects[] = $_POST['subj1'];
    if (isset($_POST['subj2'])) $subjects[] = $_POST['subj2'];
    if (isset($_POST['subj3'])) $subjects[] = $_POST['subj3'];
    if (isset($_POST['subj4'])) $subjects[] = $_POST['subj4'];
    if (isset($_POST['subj5'])) $subjects[] = $_POST['subj5'];
    $subjectsList = implode(", ", $subjects); // Convert array to comma-separated string

    // Insert the data into the database
    $sql = "INSERT INTO students (name, studentID, email, phoneNO, gender, birthday, program, year, subjects)
            VALUES ('$name', '$studentID', '$email', '$phoneNO', '$gender', '$birthday', '$program', '$year', '$subjectsList')";

    if ($conn->query($sql) === TRUE) {
        echo "<br> Student registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
