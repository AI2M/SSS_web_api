<?php
if ( !empty( $_FILES ) ) {

    $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];

    $target = "/Applications/XAMPP/xamppfiles/images/showrooms/";
    $target = $target . basename($_FILES['file']['name']);

    move_uploaded_file( $tempPath, $target );

    $answer = array( 'answer' => 'File transfer completed' );
    $json = json_encode( $answer );

    echo $json;

} else {

    echo 'No files';

}

?>