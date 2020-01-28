<?php
require "../config/dbconnection.php";
$name = $_POST["name"];
$email = $_POST["email"];
$subject1 = $_POST["subject"];
$targetDir = "../upload/";
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;
$ext = pathinfo($targetFilePath, PATHINFO_EXTENSION);
move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
$uploadedFile = $targetFilePath;

if ($name == "" || $name == null && $email == "" || $email == null && $subject1 == "" || $subject1 == null) {
    echo "Insert Required field";

} else {
    // Recipient
    $toEmail = '31vyas@gmail.com';

<<<<<<< HEAD
    if ($name == "" || $name == null && $email == "" || $email == null && $subject1 == "" || $subject1 == null) {
    echo "Insert Required field";
    
}else{
        // Recipient
                $toEmail = 'solankikaran496@gmail.com';

                // Sender
                $from = $email;
                $fromName = 'Zenocraft';
                
                // Subject
                $emailSubject = 'Zenocraft Inquiry Request by '.$name;
                
                // Message 
                $htmlContent = '<h2>Inquiry Request By</h2>
                    <p><b>Name:</b> '.$name.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Subject:</b> '.$subject1.'</p>';
                    
                
                // Header for sender info
                $headers = "From: $fromName"." <".$from.">";

                if(!empty($uploadedFile) && file_exists($uploadedFile)){
                    
                    // Boundary 
                    $semi_rand = md5(time()); 
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
                    
                    // Headers for attachment 
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
                    
                    // Multipart boundary 
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
                    
                    // Preparing attachment
                    if(is_file($uploadedFile)){
                        $message .= "--{$mime_boundary}\n";
                        $fp =    @fopen($uploadedFile,"rb");
                        $data =  @fread($fp,filesize($uploadedFile));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
                        "Content-Description: ".basename($uploadedFile)."\n" .
                        "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                    
                    $message .= "--{$mime_boundary}--";
                    $returnpath = "-f" . $email;
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);
                    
                    // Delete attachment file from the server
                    @unlink($uploadedFile);
                }else{
                     // Set content-type header for sending HTML email
                    $headers .= "\r\n". "MIME-Version: 1.0";
                    $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $htmlContent, $headers); 
                }
                
                // If mail sent
                if($mail){
                    echo $statusMsg = 'Your contact request has been submitted successfully !';
//                    $msgClass = 'succdiv';
                    
                    $postData = '';
                }else{
                    echo $statusMsg = 'Your contact request submission failed, please try again.';
                }
        
        
       $sql = "INSERT INTO contact_us (name, email, subject, file) VALUES ('$name', '$email', '$subject1', '$targetFilePath')";
    if(mysqli_query($conn, $sql)){
        
=======
    // Sender
    $from = $email;
    $fromName = 'Zenocraft';

    // Subject
    $emailSubject = 'Zenocraft Inquiry Request by ' . $name;

    // Message
    $htmlContent = '<h2>Inquiry Request By</h2>
                    <p><b>Name:</b> ' . $name . '</p>
                    <p><b>Email:</b> ' . $email . '</p>
                    <p><b>Subject:</b> ' . $subject1 . '</p>';

    // Header for sender info
    $headers = "From: $fromName" . " <" . $from . ">";

    if (!empty($uploadedFile) && file_exists($uploadedFile)) {

        // Boundary
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

        // Headers for attachment
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

        // Multipart boundary
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

        // Preparing attachment
        if (is_file($uploadedFile)) {
            $message .= "--{$mime_boundary}\n";
            $fp = @fopen($uploadedFile, "rb");
            $data = @fread($fp, filesize($uploadedFile));
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"" . basename($uploadedFile) . "\"\n" .
            "Content-Description: " . basename($uploadedFile) . "\n" .
            "Content-Disposition: attachment;\n" . " filename=\"" . basename($uploadedFile) . "\"; size=" . filesize($uploadedFile) . ";\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }

        $message .= "--{$mime_boundary}--";
        $returnpath = "-f" . $email;

        // Send email
        $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);

        // Delete attachment file from the server
        @unlink($uploadedFile);
    } else {
        // Set content-type header for sending HTML email
        $headers .= "\r\n" . "MIME-Version: 1.0";
        $headers .= "\r\n" . "Content-type:text/html;charset=UTF-8";

        // Send email
        $mail = mail($toEmail, $emailSubject, $htmlContent, $headers);
    }

    // If mail sent
    if ($mail) {
        $statusMsg = 'Your contact request has been submitted successfully !';
//                    $msgClass = 'succdiv';

        $postData = '';
    } else {
        $statusMsg = 'Your contact request submission failed, please try again.';
    }

    $sql = "INSERT INTO contact_us (name, email, subject, file) VALUES ('$name', '$email', '$subject1', '$targetFilePath')";
    if (mysqli_query($conn, $sql)) {

>>>>>>> 052e8c8a011b7a7338372e931005ef453ef453df
        echo "Thank you, Our team contact you soon.";

    } else {

        echo "Please try again";
    }

}
