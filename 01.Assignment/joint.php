<html>
<body>

    <?php

    // Variables
    $full_name = $email = $contact_number = $dob = $position = $resume = $coverletter = $linkedin = $experience = "";
    $skills = [];

    // Error message variables
    $full_nameErr = $emailErr = $contact_numberErr = $dobErr = $positionErr = $resumeErr = $coverletterErr = $linkedinErr = $experienceErr = $skillsErr = "";

    $error = []; // MAIN error array

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Full Name
        if (empty($_POST["full_name"])) {
            $full_nameErr = "Full Name is required";
            $error[] = $full_nameErr;
        } else {
            $full_name = filter($_POST["full_name"]);
        }

        // Email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $error[] = $emailErr;
        } else {
            $email = filter($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid Email format";
                $error[] = $emailErr;
            }
        }

        // Contact Number
        if (empty($_POST["contact_number"])) {
            $contact_numberErr = "Contact Number is required";
            $error[] = $contact_numberErr;
        } else {
            $contact_number = filter($_POST["contact_number"]);
            if (!preg_match("/^[0-9]{10}$/", $contact_number)) {
                $contact_numberErr = "Contact Number must be 10 digits";
                $error[] = $contact_numberErr;
            }
        }

        // Date of Birth
        if (empty($_POST["dob"])) {
            $dobErr = "Date of Birth is required";
            $error[] = $dobErr;
        } else {
            $dob = filter($_POST["dob"]);
        }

        // Position Applied
        if (empty($_POST["position"])) {
            $positionErr = "Please select a position";
            $error[] = $positionErr;
        } else {
            $position = filter($_POST["position"]);
        }

        // Resume Upload
        if (!isset($_FILES["resume"]) || empty($_FILES["resume"]["name"])) {
            $resumeErr = "Resume is required";
            $error[] = $resumeErr;
        } else {
            $resume = $_FILES["resume"]["name"];
            $ext = strtolower(pathinfo($resume, PATHINFO_EXTENSION));

            if ($ext !== "pdf") {
                $resumeErr = "Only PDF files allowed";
                $error[] = $resumeErr;
            }
        }

        // Cover Letter
        if (empty($_POST["coverletter"])) {
            $coverletterErr = "Cover Letter is required";
            $error[] = $coverletterErr;
        } else {
            $coverletter = filter($_POST["coverletter"]);
        }

        // LinkedIn URL
        if (empty($_POST["linkedin"])) {
            $linkedinErr = "LinkedIn URL is required";
            $error[] = $linkedinErr;
        } else {
            $linkedin = filter($_POST["linkedin"]);
            if (!filter_var($linkedin, FILTER_VALIDATE_URL)) {
                $linkedinErr = "Invalid LinkedIn URL";
                $error[] = $linkedinErr;
            }
        }

        // Work Experience
        if (empty($_POST["experience"])) {
            $experienceErr = "Experience is required";
            $error[] = $experienceErr;
        } else {
            $experience = filter($_POST["experience"]);
        }

        // Skills
        if (empty($_POST["skills"])) {
            $skillsErr = "Select at least one skill";
            $error[] = $skillsErr;
        } else {
            $skills = $_POST["skills"];
        }
    }

    function filter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Displaying Output
    if (!empty($error)) {
        echo "<h2>Errors Found:</h2>";
        foreach ($error as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
        echo "<br><a href='job_form.php'>Go Back</a>";
    } else {

        echo "<h2>Application Submitted Successfully!</h2>";
        echo "Full Name: $full_name <br>";
        echo "Email: $email <br>";
        echo "Contact Number: $contact_number <br>";
        echo "Date of Birth: $dob <br>";
        echo "Position: $position <br>";
        echo "Resume: $resume <br>";
        echo "Cover Letter: $coverletter <br>";
        echo "LinkedIn: $linkedin <br>";
        echo "Experience: $experience <br>";
        echo "Skills: " . implode(", ", $skills) . "<br>";

        echo "<br><a href='job_form.php'>Go Back..</a>";
    }
    ?>

</body>
</html>