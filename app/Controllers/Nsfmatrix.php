<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Nsfmatrix extends BaseController
{

    public function nsf_ext () {
        $crud = new GroceryCrud();

        $crud->setTable('mv_p_nsfext');
        $crud->setSubject('NSF Extendida');
        //$crud->requiredFields(['city']);
        $crud->columns(['nsfext_id','nsf_fun_id','nsf_cat_id','abrev','descripcion','cis','cobit5','ISA_62443_2','ISA_62443_3','ISO_27001_2013','NIST_SP_800_53_REV_4']);
        
        $crud->setRelation('nsf_fun_id', 'mv_s_nsf_fun', 'descripcion');
        //$crud->setRelation('nsf_cat_id', 'mv_s_status_proyecto', 'descripcion');
        //$crud->setRelation('nsf_scat_id', 'mv_s_status_proyecto', 'descripcion');
        
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
