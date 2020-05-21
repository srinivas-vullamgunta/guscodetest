<?php
namespace Arden;
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

class Email {

    private $m_sName;
    private $m_sEmail;
    private $m_sMessage;

    public function __set($p_sProperty, $p_vValue){
        switch($p_sProperty){

            case 'Name':
                if($p_vValue != '') {
                    $this->m_sName = $p_vValue;
                }
                else{
                    throw new Exception("No name found");
                }
                break;

            case 'Email':
            if($p_vValue != '') {
                    $this->m_sEmail = $p_vValue;
                }
                else{
                    throw new Exception("No email adress found");
                }
                break;

            case 'Message':
                if($p_vValue != '') {
                    $this->m_sMessage = $p_vValue;
                }
                else{
                    throw new Exception("No message found");
                }
                break;
        }
    }

    public function __get($p_sProperty){
        switch($p_sProperty){
            case 'Name':
                return $this->m_sName;
                break;

            case 'Email':
                return $this->m_sEmail;
                break;

            case 'Message':
                return $this->m_sMessage;
                break;
        }
    }

    public function Send(){ 
        $mail = new PHPMailer();
        $mail->IsSMTP();  // send via SMTP
        $mail->Host     = 'smtp.gmail.com';   // SMTP servers
        $mail->SMTPAuth = true;                  // turn on 
        $mail->Username =  'xxxxxxxxxx';  // SMTP username
        $mail->Password =  'xxxxxxxxxx'; // SMTP password
        $mail->Port     =  465;   
        $mail->From     =  'xxxxxxxx';  // // SMTP username from
        $mail->FromName =  "xxxxxxxx";
        $mail->AddAddress( $this->m_sEmail); // 
        $mail->Subject  = 'test subject';
        $mail->Body     = $this->m_sMessage;
        try {
            $mail->send();               
            return "OK!";
        } catch(Exception $ex){
            return $ex."--No!". $mail->ErrorInfo;
        } 
    }

}
