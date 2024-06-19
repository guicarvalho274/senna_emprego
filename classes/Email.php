<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    class Email{
        private $mailer;
        function __construct($host, $username, $senha, $name){
            //Create an instance; passing `true` enables exceptions
            $this->mailer = new PHPMailer(true);
            //Server settings
            $this->mailer->isSMTP();                                            //Send using SMTP
            $this->mailer->Host       =  $host;                     //Set the SMTP server to send through
            $this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mailer->Username   = $username;       //SMTP username
            $this->mailer->Password   = $senha;                               //SMTP password
            $this->mailer->Port       = 587;                                    //TCP port to connect to; use 587 if you
            $this->mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $this->mailer->setFrom($username, $name);

            //Content
            $this->mailer->isHTML(true);                                  //Set email format to HTML
            $this->mailer->CharSet = "UTF-8";
            }

            public function addAddres($email){
                $this->mailer->addAddress($email);
            }

            public function corpoEmail($info){
                $this->mailer->Subject = $info['assunto'];
                $this->mailer->Body = $info['corpo'];
                $this->mailer->AltBody = strip_tags($info['corpo']);
            }

            public function enviarEmail(){
                if($this->mailer->send()){
                    return true;
                }else{
                    return false;
                }
            }
    }
?>