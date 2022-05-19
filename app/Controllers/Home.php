<?php

namespace App\Controllers;
use App\Models\ResumenModel;
use App\Config\Services;



class Home extends BaseController
{
    public function index()
    {
        // trae los valores de mith user
        $duser= user();

        $model = model(ResumenModel::class);
        $data["traedatos"] = $model->getAll();
        $data["user_name"] = $duser->username;
        $data["user_mail"] = $duser->email;
        $data["esta_logeado"] = logged_in();
        //$data["cierra_sesion"] = logout();
        

        //echo view('pbase1', $data );
        /////
        echo view('plantilla2/main_head', $data );
        echo view('plantilla2/main_headbar');
        echo view('plantilla2/main_latmen', $data );
        echo view('plantilla2/main_body', $data );
        echo view('plantilla2/main_footer', $data );
        echo view('plantilla2/main_scriptf', $data );
        
    }
}
