<?php 
//contestUpload.php
require_once ("dbconnect.php");
header("Content-Type: application/json");
define('MB', 1048576);


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
            $filesize = $_FILES['SelectedFile']['size'];



            // Success!
            exit ('{"code":0, "message":"File Upload Success", "fileName":"'.$file_name.'"}');


            }else{
            //the db failed so we should delete the image
            $feedback = 'Nothing saved due to database failure';
              unlink($dir . $safename);        //php command for deleting a file (comes from unix command)

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