<?php

namespace App\Controllers;
use App\Models\ResumenModel;
use App\Models\ResVul;

use App\Config\Services;



class Gvul extends BaseController
{
    public function tabla_rgeneral()
    {
        // trae los valores de mith user
        $duser= user();

        $model = model(ResVul::class);
        //$data["traedatos"] = $model->getAll();
        $vpag["traedatos"]          = $model->getResumen();
        
        $data["user_name"]          = $duser->username;
        $data["user_mail"]          = $duser->email;
        $data["esta_logeado"]       = logged_in();
        //$data["cierra_sesion"]      = logout($duser);
        $dscript["sp"]              = 'gvul_chart.js';
        
        $vpag["titulo_principal"]   = "Gestión de Vulnerabilidades";
        $vpag["l_menu"]             = "Top Vulnerabilidades";

        //echo view('pbase1', $data );
        /////
        echo view('plantilla2/main_head');
        echo view('plantilla2/main_headbar');
        echo view('plantilla2/main_latmen', $data);
        echo view('plantilla2/main_bodyf', $vpag);
        echo view('plantilla2/main_footer', $data );
        echo view('plantilla2/main_scriptf', $dscript );
        
    }
}
