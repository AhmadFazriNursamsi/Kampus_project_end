<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Matkul;
use App\Models\AbsensiUsers;

use App\Models\AbsensiModel;
use CodeIgniter\Controller;

class MatkulController extends Controller
{
    public function index()
    {

        $matkuls = new Matkul();

        $db['dbbb'] = $matkuls->findAll();
        return view('matkul', $db);
        // echo json_encode( $db );
        // $this->output->set_output($data);

        
    }
    public function absensiUrl($id = null){
        // var_dump($id);
        $matkuls = new Matkul();
        $absen = new AbsensiModel();
        $absen_user = new AbsensiUsers();


        // $db['dbb'] = $matkuls->findAll();
        $data['dbb'] = $matkuls->where('id', $id)->first();
        $datas['dbbb'] = $absen->where('id_matkul', $id)->findAll();
        // var_dump($datas['dbbb']['id']);exit;
        $db      = \Config\Database::connect();
        // $builder = $db->table('users');
            $builder = $db->table('absensis_teacher');
            $builder->select('*');
            $builder->join('absensis', 'absensis.id = absensis_teacher.id_absensis');
            $builder->where('absensis.id_matkul', $id);
            $query = $builder->get();

            // $data_tech = [];
            // var_dump($query->getResult());exit;
            // foreach ($query->getResult() as $row) {
            //     // echo $row
            //     $data_tech[] =  array($row);
            // }
            // // $datasU['user'] = $absen_user->where('id_absesnsis', $datas['dbbb']['id'])->findAll();
            // var_dump($id, $query->getResult());exit;

        
        $dat = [
            'data' => $data,
            'datas' => $datas,
            'data_tech' => $query->getResult()
        ];
        
        // var_dump($dat);exit;

        return view('matkul_absen', $dat);
    }

    

}
