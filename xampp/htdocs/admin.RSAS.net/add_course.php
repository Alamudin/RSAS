<!DOCTYPE HTML>
<html>
<head>
    <title>Add Course</title>
    <link rel="icon" href="../images/logo4.png" />
    <link rel="stylesheet" href="../css/add_course.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
    <?php
    include("../static/header.php");
    ?>
    <h1 id="add_course_title">ADD NEW COURSE</h1>
    <hr/><br/>
    <form id="add_form">
        <label for="add_course_field">Course Title</label><br/>
        <input required type="text" name="course_title" id="add_course_field"/>
        <label for="add_course_description">Course Description</label><br/>
        <textarea required name="course_description" id="add_course_description" ></textarea>
        <hr/>
        <input type="submit" id="create" value="Create"/>
    </form><br/><br/><br/><br/>
    <?php
    include("../static/footer.php");
    ?>
</div>
</body>
</html>
