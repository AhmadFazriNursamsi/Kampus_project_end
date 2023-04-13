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
            $builder->orderBy('meet_matkul', 'asc');
            $builder->where('absensis.id_matkul', $id);
            $query = $builder->get();


            // foreach($query->getResult() as $query){
            //     // var_dump($query->user_id);exit;

            //     $absensis = $absen_user->where('user_id' , $query->user_id)->first();

            //     var_dump($absensis['status']);exit;
            // }



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

    public function dasboardDosen()
    {


        $absen = new AbsensiModel();
        $matkuls = new Matkul();
        $sess= session()->get('user_id'); 

        $data['dbb'] = $matkuls->where('user_id', $sess)->first();
        
        // var_dump($data);exit;

        $datas['absen'] = $absen->where('kd_mtk', $data['dbb']['kd_mtk'])->orderBy('meet_matkul', 'asc')->findAll();


        return view('dasboardDosen', $datas);
        
    }

    
    public function dasboardAbsensi()
    {
        $request = request();

        $user_id = $request->getPost('user_id');
        $matkul_id = $request->getPost('matkul_id');

        
        // $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
        // $explode = explode("/",$matkul_id);

        $absen_user = new AbsensiUsers();

             $db      = \Config\Database::connect();
        // $builder = $db->table('users');
            $builder = $db->table('absensis');
            $builder->select('*');
            $builder->orderBy('meet_matkul', 'DESC');
            $builder->where('id_matkul', $matkul_id);
            $query = $builder->get();

            $dataaa = [
                'statuss' => 2
            ];
            

            $builder = $db->table('absensis_teacher');
            $builder->select('*');
            $builder->where('user_id', $user_id);
            $builder->update($dataaa);
             

           $dbb = $query->getResult();
        //    var_dump($dbb[0]->id);
        // 'user_id',
        // 'id_matkul',
        // 'id_absensis',
        // 'status',
        // 'created_at',
        // 'updated_at'
        $date =  date('Y-m-d h:i', strtotime('+7 hours')); 

        $data = [
              'user_id' => $user_id,
              'id_matkul' => $matkul_id,
              'id_absensis' => $dbb[0]->id,
              'status' => '2',
              'statuss' => '2',
              'created_at' => $date,
          ];
          
          // var_dump( $data, "tetetete");exit;
          $absen_user->save($data);
        // $data = [
        //     'user_id' => $user_id,
        //     'matkul_id' => $matkul_id
        // ];
        return redirect()->to(base_url() . 'absensi/'.$matkul_id.'');


        // return $this->response->setJson(["status" => $data, "message" => "Successfully!"]);

    }
    public function dasboardDosenAdd()
    {

        $request = request();

        $meet = $request->getPost('meet');
        $rangkuman = $request->getPost('rangkuman');
        $berita = $request->getPost('berita');


        $absen = new AbsensiModel();
        $db      = \Config\Database::connect();
        // $builder = $db->table('users');
        
        $matkuls = new Matkul();
        $sess= session()->get('user_id'); 
        $data= $matkuls->where('user_id', $sess)->first();
        $date =  date('Y-m-d h:i', strtotime('+7 hours')); 
        $dataaa = [
            'statuss' => 1
        ];
        

        $builder = $db->table('absensis_teacher');
        $builder->select('*');
        $builder->where('id_matkul', $data['id']);
        $builder->update($dataaa);
        $query = $builder->get();
         
      $data = [
          'id_matkul' => $data['id'],
          'kd_mtk' => $data['kd_mtk'],
          'meet_matkul' => $meet,
            'rangkuman' =>$rangkuman,
            'berita' => $berita,
            'status_absen' => '2',
            'status_hadir' => '5',
            'tgl_absen' => $date,
            'jenis_matkul' =>$data['jenis_matkul'],
            'created_at' => $date,
        ];
        
        // var_dump( $data, "tetetete");exit;
        $absen->save($data);


        // $absen = new AbsensiModel();
        // $matkuls = new Matkul();
        // $sess= session()->get('user_id'); 

        // $data['dbb'] = $matkuls->where('user_id', $sess)->first();

        // $datas['absen'] = $absen->where('kd_mtk', $data['dbb']['kd_mtk'])->findAll();
        return redirect()->to(base_url() . 'dasboard_admin');
        
    }

    

}
