<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Matkul;
use CodeIgniter\Controller;

class MatkulController extends Controller
{
    public function index()
    {

        $matkuls = new Matkul();

        $db['dbbb'] = $matkuls->findAll();
        // var_dump($db);exit;
        
        // header('Content-Type: application/json');
        return view('matkul', $db);
        // echo json_encode( $db );
        // $this->output->set_output($data);

        
    }
}
