<?php

namespace App\Controllers;
use App\Models\ResumenModel;


class Dashboard extends BaseController{
    
    public function index() {
        $model = model(ResumenModel::class);
        $data["traedatos"] = $model->getAll();
        $data["mmaster"] = 'Maikel Villar';
        echo view('plantilla2/main_head', $data );
        echo view('plantilla2/main_headbar');
        echo view('plantilla2/main_latmen', $data );
        echo view('plantilla2/main_body', $data );
        echo view('plantilla2/main_footer', $data );
        echo view('plantilla2/main_scriptf', $data );
    }

    /*
    public function index() {
        $model = model(ResumenModel::class);
        $data["traedatos"] = $model->getAll();
        $data["mmaster"] = 'Maikel Villar';
        echo view('plantillas/cab1', $data );
        echo view('plantillas/bod1');
        echo view('plantillas/foot1', $data );
    }
    */

}
