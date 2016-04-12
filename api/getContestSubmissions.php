<?php
require_once("dbconnect.php");
//fetch records from DB

$sqlQuery = "SELECT 
	pr.project_id, 
	prs.user_id,
	sf.submission_id, 
	sf.filename, 
	sf.filetype 

FROM 
	projects AS pr 
	INNER JOIN project_submissions as prs ON pr.project_id = prs.project_id 
	INNER JOIN submission_files as sf ON prs.submission_id = sf.submission_id

WHERE 
	pr.project_id = ?
ORDER BY 
	pr.created_date DESC";




$result = $conn->prepare($sqlQuery);
$result->execute(array($_POST['id']));

$sub_id = 0;

$submissions = array();
$image = array();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    if ($sub_id != $row["submission_id"]) {
        //$image = array();
        $details = array(
            "project_id" => $row["project_id"],
            "submission_id" => $row["submission_id"],
            "user_id" => $row["user_id"],
            "image" => array()

        );

        $sub_id = $row["submission_id"];
        $submissions[] = $details;


    } else {

        $image[] = array(
            "filename" => $row["filename"],
            "filetype" => $row["filetype"]
        );

        $counter = sizeof($submissions) -1 ;
        $submissions[$counter]["image"] = $image;

        //$submissions[0]["image"] = $image;
    }


}


exit(json_encode($submissions));
?>