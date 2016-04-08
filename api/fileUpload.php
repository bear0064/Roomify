<?php 
//contestUpload.php
require_once ("dbconnect.php");
header("Content-Type: application/json");
define('MB', 1048576);


$file_name = $_FILES['SelectedFile']['name'];
$file_type = $_FILES['SelectedFile']['type'];
$file_size = $_FILES['SelectedFile']['size'];


if( $_FILES['SelectedFile']['error'] == 0 && $_FILES['SelectedFile']['size'] > 0) {
    switch ($_FILES['SelectedFile']['type']) {
        case 'image/jpg':
        case 'image/jpeg':
        case 'image/pjpeg':
            $ext = ".jpeg";
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
    if ($ext != 'EpicFail') {
        $safename = md5($_FILES['SelectedFile']['name']) . "_" . time() . $ext;
        $dir = "../upload/";
        //now move the file from the temp folder to its new location
        $ret = move_uploaded_file($_FILES['SelectedFile']['tmp_name'], $dir . $safename);
        
        if ($ret) {
            $infoMsg = "I have saved the file " . $_FILES['SelectedFile']['name'] . " as " . $dir . $safename . "!";
            $mime = $_FILES['SelectedFile']['type'];
            $filesize = $_FILES['SelectedFile']['size'];


            // Success!
            exit ('{"code":0, "message":"File Upload Success", "fileName":"' . $safename . '"}');


        } else {
            //the db failed so we should delete the image
            $feedback = 'Nothing saved due write permissions';
            unlink($dir . $safename);        //php command for deleting a file (comes from unix command)
            exit ('{"code":1, "message":' . $feedback . '}');
        }
    } else {
        exit(json_encode("Not an image!"));
    }
}

else{
    //there WAS an error
    switch($_FILES['SelectedFile']['error']){
        case UPLOAD_ERR_INI_SIZE:
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
        case UPLOAD_ERR_PARTIAL:
            $message = "The uploaded file was only partially uploaded";
            break;
        case UPLOAD_ERR_NO_FILE:
            $message = "No file was uploaded";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Missing a temporary folder";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $message = "Failed to write file to disk";
            break;
        case UPLOAD_ERR_EXTENSION:
            $message = "File upload stopped by extension";
            break;
        default:
            $message = "Unknown upload error";
            break;
    }
    return exit(json_encode($message));
}






//
//// Check for errors
//if($_FILES['SelectedFile']['error'] > 0){
//     exit( '{"code":1, "message":"An error occured while uploading."}');
//}
//
//if(!getimagesize($_FILES['SelectedFile']['tmp_name'])){
//     exit( '{"code":1, "message":"File Upload Failed: Please ensure you are uploading an image."}');
//}
//
//
//$allowed =  array('jpeg','png' ,'jpg');
//$filename = strtolower($_FILES['SelectedFile']['name']);
//$ext = pathinfo($filename, PATHINFO_EXTENSION);
//if(!in_array($ext,$allowed) ) {
//    exit( '{"code":1, "message":"File Upload Failed: File type not supported."}');
//}
//
//// Check filesize
//if($_FILES['SelectedFile']['size'] > 8*MB){
//  exit( '{"code":1, "message":"File Upload Failed: File size too big."}');
//}
//
//
//// Check if the file exists
//$actual_name = pathinfo($filename,PATHINFO_FILENAME);
//$original_name = $actual_name;
//$i = 1;
//
//while(file_exists('../upload/'.$actual_name.".".$ext))
//{
//    $actual_name = (string)$original_name.'-'.$i;
//    $filename = $actual_name.".".$ext;
//    $i++;
//}
//
//// Upload file
//if(!move_uploaded_file($_FILES['SelectedFile']['tmp_name'], '../upload/' . $filename)){
//    exit( '{"code":1, "message":"File Upload Failed: Check Destination is writable."}');
//}



?>