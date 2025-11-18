<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="./job.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    //define variables and set to empty values
    $full_name = $email = $contact_number = $dob = $position = $resume = $coverletter = $linkedln = $experience = $skills = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = test($_POST["full_name"]);
        $email = test($_POST["email"]);
        $contact_number = test($_POST["contact_number"]);
        $dob = test($_POST["dob"]);
        $position = test($_POST["position"]);
        $resume = test($_POST["resume"]);
        $coverletter = test($_POST["coverletter"]);
        $linkedln = test($_POST["linkedln"]);
        $skills = test($_POST["skills"]);
    }
    function test($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="container">
        <h2>Job Application Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Full Name <br>
            <input type="text" name="full_name"> <br>

            Email <br>
            <input type="email" name="email"> <br>

            Contact Number <br>
            <input type="text" name="contact_number"> <br>

            Date Of Birth <br>
            <input type="date" name="dob"> <br>

            Position Applied For <br>
            <select name="position">
                <option value="softwera developer">Software Developer</option>
                <option value="web designer">Web Designer</option>
                <option value="project manager">Project Manager</option>
            </select> <br>

            Upload Resume <br>
            <input type="file" name="resume"> <br>

            Cover Letter <br>
            <textarea name="coverletter" rows="5" cols="40"></textarea><br>

            Linkedln Profile <br>
            <input type="url" name="linkedln"> <br>

            Work Experience (Years) <br>
            <input type="text" name="experience"> <br>

            Skills <br>
            <div class="skills">
                <input type="checkbox" name="skills" value="html">HTML
                <input type="checkbox" name="skills" value="css">CSS
                <input type="checkbox" name="skills" value="js">JavaScript
                <input type="checkbox" name="skills" value="php">PHP
                <input type="checkbox" name="skills" value="java">Java <br>
            </div>
            <input type="submit" name="submit" value="Apply">
        </form>
    </div>

    <div>
        <?php
        echo "<h2>Your Details</h2>";
        echo $full_name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $contact_number;
        echo "<br>";
        echo $dob;
        echo "<br>";
        echo $position;
        echo "<br>";
        echo $resume;
        echo "<br>";
        echo $coverletter;
        echo "<br>";
        echo $linkedln;
        echo "<br>";
        echo $skills;
        ?>
    </div>

</body>

</html>