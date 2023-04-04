<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Matkul extends BaseController
{
    public function index()
    {
        return view('matkul.php');
    }
}
