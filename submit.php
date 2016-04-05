<?php
session_start();
include ('api/authCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submissions/Home</title>
</head>
<body>
<h1>Welcome Home!</h1>

<div>
<p>browse</p>



</div>



<h3>Submit Design</h3>
<form>

<div>
    <div>

        <input type="file" required accept="image/*" onchange="loadFile(event)" id="submissionFile">
        <img id="output" width="500"/>
    </div>
    <div>
        <p>Title</p>
        <input type="text" name="title" required size="50" maxlength="255" id="submissionTitle"><br>
    </div>
    <div>
        <p>Description</p>
        <input type="text" name="desc" required size="50" maxlength="255" id="submissionDesc"><br>
    </div>
    <div>
        <p>Requirements</p>
        <p>I agree to the code of conduct</p>
        <p>I have read the design brief</p>
        <p>I created this design as a pdf/jpeg...</p>
        <p>I did not use (insert some bs here)</p>
        <input type="checkbox" name="requirements" required="required" value="Agreed"/>I have read and understand the above requirements<br>
    </div>

    <div>
        <button type="submit" value="Submit" onclick="contestSubmission();">Submit</button>
    </div>

</div>
</form>



<script src="js/main.js"></script>
</body>
</html>