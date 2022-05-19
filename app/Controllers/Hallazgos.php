<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Hallazgos extends BaseController
{

    public function vulnerabilidades_i () {
        $crud = new GroceryCrud();

        //$crud->setTheme('datatables');
        $crud->setTable('rapid7_csv');
        $crud->setSubject('Vulnerabilidades ');
        //$crud->requiredFields(['city']);
        $crud->columns(['risk','title','cvss','severity','exploits','published_on','id']);
        $crud->defaultOrdering('risk', 'desc');
        //$crud->setRead();

        $output = $crud->render();

        return $this->_ejemploOutput($output);
    }

    public function products_management() {
        $crud = new GroceryCrud();

        $crud->setTable('products');
        $crud->setSubject('Product');
        $crud->unsetColumns(['productDescription']);
        $crud->callbackColumn('buyPrice', function ($value) {
            return $value.' &euro;';
        });

        $output = $crud->render();

        return $this->_exampleOutput($output);
    }



    private function _exampleOutput($output = null) {
        return view('example', (array)$output);
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


}
