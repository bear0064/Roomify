<?php
session_start();
require_once("dbconnect.php");
//fetch records from DB
$result = "";
//Quick fix for the designer view designer

if (isset($_POST['sortDesMethod'])) {

    $sortBy = $_POST['sortDesMethod'];
    $uId = $_POST['userDes'];

    if ($sortBy == 'Newest') {
        $sqlQuery = "SELECT 
	pr.project_id, 
	prs.user_id,
	u.user_username,
	prs.submission_text,
	sf.submission_id, 
	sf.filename, 
	sf.filetype 

FROM 
	projects AS pr 
	INNER JOIN project_submissions as prs ON pr.project_id = prs.project_id 
	INNER JOIN submission_files as sf ON prs.submission_id = sf.submission_id
	INNER JOIN users as u ON prs.user_id = u.user_id

WHERE  
    prs.user_id = ?
ORDER BY 
	pr.created_date DESC";

        $result = $conn->prepare($sqlQuery);
        $result->execute(array($uId));

    }


    if ($sortBy == 'Oldest') {


        $sqlQuery = "SELECT 
	pr.project_id, 
	prs.user_id,
	u.user_username,
	prs.submission_text,
	sf.submission_id, 
	sf.filename, 
	sf.filetype 

FROM 
	projects AS pr 
	INNER JOIN project_submissions as prs ON pr.project_id = prs.project_id 
	INNER JOIN submission_files as sf ON prs.submission_id = sf.submission_id
	INNER JOIN users as u ON prs.user_id = u.user_id

WHERE  
    prs.user_id = ?
ORDER BY 
	pr.created_date";

        $result = $conn->prepare($sqlQuery);
        $result->execute(array($uId));
    }
}


$sub_id = 0;

$submissions = array();
$image = array();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


    $details = array(
        "project_id" => $row["project_id"],
        "submission_id" => $row["submission_id"],
        "submission_text" => $row["submission_text"],
        "user_id" => $row["user_id"],
        "user_name" => $row["user_username"],
        "filename" => $row["filename"],
        "filetype" => $row["filetype"]
    );


    $submissions[] = $details;


}


exit(json_encode($submissions));
?>