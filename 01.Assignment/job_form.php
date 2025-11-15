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

    <div class="container">
        <h2>Job Application Form</h2>
        <form action="">
            Full Name <br>
            <input type="text" name="f_name"> <br>

            Email <br>
            <input type="email" name="email"> <br>

            Contact Number <br>
            <input type="text" name="c_name"> <br>

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
</body>

</html>