<?php
session_start();
require_once("dbconnect.php");
define('MB', 1048576);

//TODO Start with session, which was captured from logging in
//TODO after: add a submit button to the contests shown then use this script to fire off
//TODO Get the values from the user submission to the contest + file upload and store it.
//TODO display the submission?

$json = $_POST['details'];
$json = json_decode($json, true);

//TODO capture this information when viewing the project
//$project_id = ;

$user_id = $_SESSION['user_id'];
$sub_title = $json["submissionTitle"];
$sub_desc = $json["submissionDescription"];

$file_name = $_FILES['SelectedFile']['name'];
$file_type = $_FILES['SelectedFile']['type'];
$file_size = $_FILES['SelectedFile']['size'];

if( $_FILES['SelectedFile']['error']==0 && $_FILES['SelectedFile']['size'] > 0){
    switch( $_FILES['SelectedFile']['type'] ){
        case 'image/jpg':
        case 'image/jpeg':
        case 'image/pjpeg':
            $ext = ".jpg";
            break;
        case 'image/gif':
            $ext = '.gif';
            break;
        case 'image/png':
            $ext = '.png';
            break;
        case 'text/pdf':
            $ext = '.pdf';
            break;
        default:
            $ext = 'EpicFail';
    }
    if($ext != 'EpicFail') {
        $safename = md5($_FILES['SelectedFile']['name']) . "_" . time() . $ext;
        $dir = "../upload/";
        //now move the file from the temp folder to its new location
        $ret = move_uploaded_file($_FILES['SelectedFile']['tmp_name'] , $dir . $safename);
        if($ret){
            $infoMsg = "I have saved the file " . $_FILES['SelectedFile']['name'] . " as " . $dir . $safename . "!";
            $mime = $_FILES['SelectedFile']['type'];
//            $friendlyName = str_replace(" ", "-", trim($_POST["display_name"]));
            $filesize = $_FILES['SelectedFile']['size']; //or filesize($dir . $ob_filename)
//            $strSQL = "INSERT INTO media_files(safename, mime_type, file_size)
//              VALUES( ?, ?, ? )";
//            $rs = $pdo->prepare($strSQL);
//            $rs->execute( array($safename, $mime, $filesize) );
////           if($rs){
//                $feedback .= '<br/>Image information has been saved in the database.';
                //the write to the database worked.
//            }else{
                //the db failed so we should delete the image
//                $feedback = 'Nothing saved due to database failure';
//                unlink($dir . $safename);        //php command for deleting a file (comes from unix command)
            exit(json_encode("Success"));
            }
    } else{
        exit(json_encode("Not an image!"));
    }
}else{
    //there WAS an error
    switch($_FILES['SelectedFile']['error']){
        case 1:
            $feedback = 'The file was too large. Not saved.';
            break;
        case 2:
            $feedback = 'The file was only partially uploaded. Network problem occurred.';
            break;
        case 3:
            $feedback = 'No file uploaded.';
            break;
        case 4:
            $feedback = 'The temp folder was missing or unavailable on the server';
            break;
        case 5:
            $feedback = 'Unable to write the file to disk.';
            break;
        case 6:
            $feedback = 'Virus potentially detected or invalid file extension.';
            break;
        default:
            $feedback = 'The uploaded file was empty.';
    }
}





//TODO file hash the output, so that the image is hidden, when retrieving just rehash and get the file?
//TODO md5_file

//TODO fire off one query then the next within this script
// INSERT INTO `newRaum`.`project_submissions` (`submission_id`, `project_id`, `user_id`, `submission_dt`, `submission_title`, `submission_text`) VALUES (NULL, '$project_id', '$user_id', 'CURRENT_TIMESTAMP', '$sub_title', '$sub_desc');
// INSERT INTO `newRaum`.`submission_files` (`file_id`, `submission_id`, `filename`, `filetype`, `filesize`, `public_name`) VALUES (NULL, '$sub_id', '$file_name', '$file_type', '$file_size', '$public_name');

?>