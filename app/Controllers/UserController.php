<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;
// $encrypter = \Config\Services::encrypter();
use Config\Encryption;
use Config\Services;
use \Firebase\JWT\JWT;
use App\Models\UserModel;
use App\Models\Profile;

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
    public function dashboard()
    {
        return view('dasboard');
        
    }
    
    
    
    public function Register()
    {

        $UserModel = new UserModel();
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
            $confirmPassword = $request->getPost('confirmPassword');
            $username = $request->getPost('username');
            $fullname = $request->getPost('fullname');
            $kelas = $request->getPost('kelas');
            $email = $request->getPost('email');
            $phone_number = $request->getPost('phone_number');
            $profile_pic = $request->getPost('profile_pic');
            $nim = $request->getPost('nim');
            // ];
           

            // $data = $UserModel->where('email_address', $email)->first();

            // $data_n = $UserModel->where('nim', $nim)->first();

            // var_dump($data_n['nim'], $nim);
            // if($data != ""){

            //     if($email == $data['email_address']){
            //         return  $this->response->setJson(["status" => 404, "message" => 'email already exist']); 
                    
            //     }
            // }
            //     if($data_n != ""){
            //         if($nim == $data_n['nim']){
            //             return  $this->response->setJson(["status" => 404, "message" => 'nim already exist']); 
                        
            //         }
            //     }
            //     if($password != $confirmPassword ) {
            //         return  $this->response->setJson(["status" => 404, "message" => "Password Not Valid!"]); 
            //     }

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
            //  $password =  password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
            // $keys = base64_encode($encrypter->encrypt($username));

            
            if (!$this->validate([
                'nim' => [
                    'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.nim]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'min_length' => '{field} Minimal 4 Karakter',
                        'max_length' => '{field} Maksimal 20 Karakter',
                        'is_unique' => 'Nim sudah digunakan sebelumnya'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[4]|max_length[50]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'min_length' => '{field} Minimal 4 Karakter',
                        'max_length' => '{field} Maksimal 50 Karakter',
                    ]
                ],
                'confirmPassword' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                    ]
                ],
                'email' => [
                    'rules' => 'is_unique[users.email_address]|required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'is_unique' => '{field} Already',
                        'min_length' => '{field} Minimal 4 Karakter',
                        'max_length' => '{field} Maksimal 100 Karakter',
                    ]
                ],
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }

            
            // if($this->validate($rules)){
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
            'token_email' => $uid,
            'profile_pic' => $profile_pic,
            'created_at' =>$date,
        ];
        
        ///email
        $datas = [
            'user_id' => $uid,
            'email_address' => $email,
            'password' => $encoded,
            'phone_number' => $phone_number,
            'user_name' => $fullname,
            'nim' => $nim,
            'tokens' => $uid,
            'created_at' =>$date,
            'status' => 'disabled',
            'roles' => 'student',
            'createdAt' => $date
        ];
        
        $UserModel->save($datas);

        $profileModel = new Profile();
        $datas_profile = [
            'user_id' => $uid,
            'full_name' => $fullname,
            'kelas' => $kelas,
            'profile_pic' => '',
            'created_at' =>$date,
        ];
        $profileModel->save($datas_profile);
        // $data['datas'] =  $this->response->setJson(["status" => 200, 'token' => $token, 'data'=>$data, "message" => "Successfully!"]); 
        // return
        // return view('users_login/login', $data);
        session()->setFlashdata('success', 'Berhasil Registrasi! Silahkan login Terlebih Dahulu');
        return redirect()->to(base_url() . 'login');
        // return redirect()->to('/login');
    }
    
    public function loginUrl(){
        
        return view('users_login/login');
    }
    public function RegisterUrl(){
        return view('users_login/register');
    }
    public function login()
    {

        $request = request();

        $username = $request->getPost('nim');
        $password = $request->getPost('password');

        $userModel = new UserModel();
        $profileModel = new Profile();

        $date = date('Y-m-d H:i:s', strtotime('+7 hours')); 
       
        $data = $userModel->where('nim', $username)->first();

        if(!$data) {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->to(base_url() . 'login');

        }
        if($data['roles'] == 'student'){

        
        $dataProfile = $profileModel->where('user_id', $data['user_id'])->first();
        // var_dump($dataProfile);


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

        $datas = $data['password'];
        
        $encrypter = Services::encrypter($config, false);
        $decode_password = $encrypter->decrypt(base64_decode($datas));   
        $encoded = base64_encode($encrypter->encrypt($decode_password));

        if($decode_password == $password){

            // return $this->response->setJson(["status" => $data, "message" => "Successfully!"]);

            session()->set([
                'username' => $data['user_name'],
                'name' => $dataProfile['full_name'],
                'nim' => $data['nim'],
                'user_id' => $data['user_id'],
                'email' => $data['email_address'],
                'kelas' => $dataProfile['kelas'],
                'logged_in' => TRUE,
                'roles' => 'student'
            ]);
            return redirect()->to(base_url() . 'dasboard');
        }
        else{
            // $data = $this->response->setJson(["status" => "Invalid Password", "message" => "Bad Request!"]);
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->to(base_url() . 'login');
        }
    }
    else{

        $dataProfile = $profileModel->where('user_id', $data['user_id'])->first();
        // var_dump($dataProfile);


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

        $datas = $data['password'];
        
        $encrypter = Services::encrypter($config, false);
        $decode_password = $encrypter->decrypt(base64_decode($datas));   
        $encoded = base64_encode($encrypter->encrypt($decode_password));

        if($decode_password == $password){

            // return $this->response->setJson(["status" => $data, "message" => "Successfully!"]);

            session()->set([
                'username' => $data['user_name'],
                'name' => $dataProfile['full_name'],
                'nim' => $data['nim'],
                'user_id' => $data['user_id'],
                'email' => $data['email_address'],
                'kelas' => $dataProfile['kelas'],
                'logged_in' => TRUE,
                'roles' => 'dosen'

            ]);
            return redirect()->to(base_url() . 'dasboard');
        }
        else{
            // $data = $this->response->setJson(["status" => "Invalid Password", "message" => "Bad Request!"]);
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->to(base_url() . 'login');
        // }        return redirect()->to(base_url() . 'login'); 
       }
    }
        
        // $str = str_replace("".base_url()."/auth/?tokens=","",$tokenPost);

    }
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url() . '');

    }
}
