<?php

namespace App\Controllers;
use App\Models\ResumenModel;
use App\Models\ResVul;

use App\Config\Services;



class Tvul extends BaseController
{
    public function top_vul_cisa()
    {
        // trae los valores de mith user
        $duser= user();

        $model = model(ResVul::class);
        //$data["traedatos"] = $model->getAll();
        $vpag["traedatos"]          = $model->getResumen();
        
        $data["user_name"]          = $duser->username;
        $data["user_mail"]          = $duser->email;
        $data["esta_logeado"]       = logged_in();
        $dhead["dhead"]               = 'ahead1.js';
        $dfoot["dfoot"]               = 'afoot1.js';
        
        //$dscript["sp"]              = 'gvul_chart.js';
        
        $vpag["titulo_principal"]   = "Gestión de Vulnerabilidades";
        $vpag["l_menu"]             = "Top Vulnerabilidades";

        //echo view('pbase1', $data );
        /////
        echo view('plantilla2/main_head', $dhead);
        echo view('plantilla2/main_headbar');
        echo view('plantilla2/main_latmen', $data);
        echo view('plantilla2/main_body_top_vul_cisa', $vpag);
        echo view('plantilla2/main_footer', $dfoot );
        //echo view('plantilla2/main_scriptf', $dscript );
        echo view('plantilla2/main_scriptf' );
        
    }
}
