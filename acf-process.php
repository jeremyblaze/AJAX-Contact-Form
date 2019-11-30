<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    $sendFrom = 'Sender Name <you@yourdomain.com>';
    $sendTo = 'you@yourdomain.com';
    $subject = 'Website form submission';

    if ( $_POST['name'] || $_POST['email'] || $_POST['message'] ) {
        
        $error = false;
        
        if ( ctype_space($_POST['name']) ) {
            $error = true;
        }
        
        if ( ctype_space($_POST['email']) ) {
            $error = true;
        }
        
        if ( ctype_space($_POST['message']) ) {
            $error = true;
        }
        
        if ( $error == false ) {
                    
            $header = "From: $sendFrom\r\n"; 
            $header .= "MIME-Version: 1.0\r\n"; 
            $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
            $header .= "X-Priority: 1\r\n"; 
            
            $message = '<strong>Name:</strong> '.$_POST['name'];
            $message .= '<br /><strong>Email:</strong> '.$_POST['email'];
            $message .= '<br /><strong>Message:</strong><br />'.$_POST['message'];
            
            $success = mail($sendTo, $subject, $message, $header);
            
            if ( !$success ) {
                echo error_get_last()['message'];
                die();
            } else {
                echo 'ok';
                die();
            }
            
        }
        
    }

?>