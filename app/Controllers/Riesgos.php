<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Riesgos extends BaseController
{

    public function g_riesgos_y_oportunidades () {
        $crud = new GroceryCrud();

        //$crud->setTheme('datatables');
        $crud->setTable('mv_p_griskoport');
        $crud->setSubject('Gestión de riesgos y oportunidades ');
        //$crud->requiredFields(['city']);
        $crud->columns(['mv_p_griskoport_id','mv_s_ries_opor_id','g_activo_id','desc_evento','mv_s_niv_prob_id','mv_s_niv_impc_id','nivel_riesgo','mv_s_estr_grisk','control_desc','estado_id','pavance','responsable_id','accountable_id']);
        $crud->setRelation('mv_s_ries_opor_id', 'mv_s_ries_opor', 'descripcion');
        $crud->setRelation('mv_s_niv_prob_id', 'mv_s_niv_prob_impc', 'descripcion');
        $crud->setRelation('mv_s_niv_impc_id', 'mv_s_niv_prob_impc', 'descripcion');
        $crud->setRelation('mv_s_estr_grisk', 'mv_s_estr_grisk', 'descripcion');
        $crud->setRelation('estado_id', 'mv_s_status_proyecto', 'descripcion');
        //$crud->defaultOrdering('risk', 'desc');
        //$crud->setRead();

        $output = $crud->render();

        return $this->_ejemploOutput($output);
    }

    private function _ejemploOutput($output = null) {
        /*echo view('plantilla2/main_head', (array)$output );
        echo view('plantilla2/main_headbar');
        echo view('plantilla2/main_latmen', (array)$output);
        echo view('plantilla2/main_body', (array)$output);
        echo view('plantilla2/main_footer', (array)$output);
        echo view('plantilla2/main_scriptf', (array)$output);*/
        //return view('example', (array)$output);
        return view('pall_main2', (array)$output);
    }

    private function _ejemploOutput_a($output = null) {
        echo view('plantilla2/main_head', (array)$output );
        echo view('plantilla2/main_headbar');
        echo view('plantilla2/main_latmen', (array)$output);
        echo view('plantilla2/main_body', (array)$output);
        echo view('plantilla2/main_footer', (array)$output);
        echo view('plantilla2/main_scriptf', (array)$output);
        
        //return view('pall_main2', (array)$output);
    }

}
