<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;
// $encrypter = \Config\Services::encrypter();
use Config\Encryption;
use Config\Services;
use \Firebase\JWT\JWT;
use App\Models\UserModel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


class UserController extends BaseController
{
    
    public function index()
    {
        return view('index');
        
    }
    
    public function Register()
    {

        // return $this->response->setJson(["status" => 200, 'token', "message" => "Successfully!"]);

        
        // $mail = new PHPMailer(true);
        
        $request = request();
        // $jwt = JWT();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        
        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;
        $uid = $uuid4->toString();
        
        
        
        
            $config         = new Encryption();
            $config->driver = 'OpenSSL';
            
            $password = $request->getPost('password');
            // $password3 = $request->getPost('password');

            // Your CI3's 'encryption_key'
            $config->key = hex2bin('64c70b0b8d45b80b9eba60b8b3c8a34d0193223d20fea46f8644b848bf7ce67f');
            // Your CI3's 'cipher' and 'mode'
            $config->cipher = 'AES-128-CBC';
            
            $config->rawData        = false;
            $config->encryptKeyInfo = 'encryption';
            $config->authKeyInfo    = 'authentication';
            
            $encrypter = Services::encrypter($config, false);
            $encoded = base64_encode($encrypter->encrypt($password));
            $decode_password = $encrypter->decrypt(base64_decode($encoded));   
            
            // $request->getUri()->getPath();
            // $config['global_xss_filtering'] = TRUE;
            $username = $request->getPost('username');
            $fullname = $request->getPost('fullname');
            $keys = base64_encode($encrypter->encrypt($username));
            $email = $request->getPost('email');
            $phone_number = $request->getPost('phone_number');
            $profile_pic = $request->getPost('profile_pic');
            //  $password =  password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
            $nim = $request->getPost('nim');
            
            $payload = array(
                "iss" => "Issuer of the JWT",
                "aud" => "Audience that the JWT",
                "sub" => "Subject of the JWT",
                "iat" => $iat, //Time the JWT issued at
                "exp" => $exp, // Expiration time of token
                "nim" => $nim,
                "uid" => $uid,
                
            );
            
            // var_dump($keys);
            $token = JWT::encode($payload, $key, 'HS256');
            $date = date('Y-m-d H:i:s', strtotime('+7 hours')); 		
            
            $data = [
            'user_id' => $uid,
            'username' => $username,
            'email' => $email,
            'Password' => $encoded,
            'phone_number' => $phone_number,
            'fullname' => $fullname,
            'nim' => $nim,
            'token_email' => $keys,
            'profile_pic' => $profile_pic,
            'created_at' =>$date,
        ];
        $postModel = new UserModel();
        
        ///email
        $datas = [
            'user_id' => $uid,
            'email_address' => $email,
            'password' => $encoded,
            'phone_number' => $phone_number,
            'user_name' => $fullname,
            'nim' => $nim,
            'tokens' => $keys,
            'created_at' =>$date,
            'status' => 'disabled',
            'createdAt' => $date
        ];
        $postModel->save($datas);
        return $this->response->setJson(["status" => 200, 'token' => $token, 'data'=>$data, "message" => "Successfully!"]); 
        // return redirect()->route('lol');

    }
    public function login()
    {

        $request = request();

        $username = $request->getPost('nim');
        $password = $request->getPost('password');

        $userModel = new UserModel();
        $date = date('Y-m-d H:i:s', strtotime('+7 hours')); 
        // $mail = new PHPMailer(true);

        ///email
	// 	$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
	// 	$mail->isSMTP();                                            //Send using SMTP
	// 	$mail->Host       = 'smtp2go.com';                     //Set the SMTP server to send through
	// 	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	// 	$mail->Username   = 'herca';                     //SMTP username
	// 	$mail->Password   = 'H3rc4@1duaEA';                               //SMTP password
	// 	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	// 	$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		
	// 	//Recipients
	// 	$mail->setFrom('fazrinursyam@gmail.com', 'Herca Academy');
	// 	$mail->addAddress('17200473@bsi.ac.id', 'Fazri');     //Add a recipient
	// 	// $mail->addAddress('fazrinursyam@gmail.com');               //Name is optional
	// 	// $mail->addReplyTo('fazrinursyam@gmail.com', 'Information');
	// 	// $mail->addCC('fazrinursyam@gmail.com');
	// 	// $mail->addBCC('fazrinursyam@gmail.com');
		
	// 	//Attachments
	// 	// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
	// 	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
		
	// 	//Content
	// 	$mail->isHTML(true);                                  //Set email format to HTML
	// 	$mail->Subject = 'VERIFICATION AKUN';
	// 	$mail->Body    = '<div style="font-family:Arial">
	// 	<div style="text-align:center;display:block">
	// 		<div style="max-width:328px;margin:0;padding:0;display:inline-block">
	// 			<div style="margin-bottom:40px">
	// 				<img src="asdasd" style="max-width:100px" class="CToWUd a6T" data-bit="iit" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 591px; top: 110px;"><div id=":16v" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " jslog="91252; u014N:cOuCgd,Kr2w4b,xr6bB; 4:WyIjbXNnLWY6MTc0NDM4NzAzODAzNzEwMTUyOCIsbnVsbCxbXV0." data-tooltip-class="a1V" data-tooltip="Download"><div class="akn"><div class="aSK J-J5-Ji aYr"></div></div></div></div>
	// 			</div>
	
	
	// 			<div style="margin:0px 8.5px 0px 8.5px">
	// 				<div style="margin-bottom:8px;font-weight:700;font-size:18px;text-align:left">Halo, '. $fullname .'</div>
	// 				<div style="margin-bottom:16px;text-align:left">Terima kasih telah mendaftar Herca Academy. Proses pendaftaran Akun Herca Academy hampir selesai. Ayo segera klik tombol di bawah ini untuk <span class="il">verifikasi</span> email kamu.</div>
	// 				<a href="'.('http://localhost:8082/auth/?tokens='.$keys.'').'" target="_blank"><button style="text-decoration:none;background:#1078ca;border-radius:8px;width:100%;height:40px;margin-top:24px;border:none;color:#fff;font-weight:700;font-size:16px"><span class="il">Verifikasi</span> Email</button></a>
	
	
	// 				<div style="margin:32px 0px 32px 0px;width:100%;height:2px;background-color:#eef2f6"></div>
	// 				<div>
	// 					<div style="margin-bottom:8px;font-style:normal;font-weight:700;font-size:14px;text-align:left">Hubungi Kami</div>
					
	// 				</div>
	// 			</div>
	
	
	// 			<div style="margin-top:40px;background:#eef2f6;padding:16px 0px 16px 0px">
	// 				<div style="text-align:center;margin:0px 16px 16px 16px;font-style:normal;font-weight:500;font-size:12px"> Email ini dikirim secara otomatis dan harap tidak membalas email ini.</div>
	// 				<div style="text-align:center;margin:0px 16px 0px 16px;font-style:normal;font-weight:500;font-size:12px"> © '.date("Y").' Herca Academy. All Rights Reserved. </div>
	// 			</div>
	// 		</div>
	// 	</div>
	// </div>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // $mail->send();

        // $user = $userModel->find($username);
        $data = $userModel->where('nim', $username)->first();
        $config         = new Encryption();
        $config->driver = 'OpenSSL';
        
        // $password = $request->getPost('password');
        // $password3 = $request->getPost('password');

        // Your CI3's 'encryption_key'
        $config->key = hex2bin('64c70b0b8d45b80b9eba60b8b3c8a34d0193223d20fea46f8644b848bf7ce67f');
        // Your CI3's 'cipher' and 'mode'
        $config->cipher = 'AES-128-CBC';
        
        $config->rawData        = false;
        $config->encryptKeyInfo = 'encryption';
        $config->authKeyInfo    = 'authentication';


        if(!$data) {
            return $this->response->setJson(["status" => "Invalid Email", "message" => "Bad Request!"]);

        }
        $datas = $data['password'];
        
        $encrypter = Services::encrypter($config, false);
        $decode_password = $encrypter->decrypt(base64_decode($datas));   
        $encoded = base64_encode($encrypter->encrypt($decode_password));

        if($decode_password == $password){

            return $this->response->setJson(["status" => $data, "message" => "Successfully!"]);
        }
        else{
            return $this->response->setJson(["status" => "Invalid Password", "message" => "Bad Request!"]);

        }
        
        // $str = str_replace("".base_url()."/auth/?tokens=","",$tokenPost);

    }
}
