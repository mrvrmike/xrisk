<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Tsoporte extends BaseController
{

    public function ciber_kpi() {
        $crud = new GroceryCrud();

        //$crud->setTheme('datatables');
        $crud->setTable('mv_p_ciber_kpi');
        $crud->setSubject('KPI de Ciberseguridad');
        //$crud->requiredFields(['city']);
        $crud->columns(['ciber_kpi_id','title','detalle']);

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
