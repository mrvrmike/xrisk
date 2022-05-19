<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Ejemplos extends BaseController
{
	public function customers_management()
	{
	    $crud = new GroceryCrud();

	    $crud->setTable('customers');

	    $output = $crud->render();

		//return $this->_exampleOutput($output);
        return $this->_ejemploOutput($output);
        
	}

	public function orders_management() {
        $crud = new GroceryCrud();

        $crud->setRelation('customerNumber','customers','{contactLastName} {contactFirstName}');
        $crud->displayAs('customerNumber','Customer');
        $crud->setTable('orders');
        $crud->setSubject('Order');
        $crud->unsetAdd();
        $crud->unsetDelete();

        $output = $crud->render();

        return $this->_exampleOutput($output);
    }

    public function offices_management () {
        $crud = new GroceryCrud();

        $crud->setTheme('datatables');
        $crud->setTable('offices');
        $crud->setSubject('Office');
        $crud->requiredFields(['city']);
        $crud->columns(['city','country','phone','addressLine1','postalCode']);
        $crud->setRead();

        $output = $crud->render();

        return $this->_exampleOutput($output);
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

    public function employees_management()
    {
        $crud = new GroceryCrud();

        $crud->setTheme('datatables');
        $crud->setTable('employees');
        $crud->setRelation('officeCode','offices','city');
        $crud->displayAs('officeCode','Office City');
        $crud->setSubject('Employee');

        $crud->requiredFields(['lastName']);

        $output = $crud->render();


        return $this->_exampleOutput($output);
    }

    public function film_management()
    {
        $crud = new GroceryCrud();
        $crud->displayAs('officeCode','Gestion de filmes');
        $crud->setSubject('Filmes');

        $crud->setTable('film');
        $crud->setRelationNtoN('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname');
        $crud->setRelationNtoN('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
        $crud->unsetColumns(['special_features','description','actors']);

        $crud->fields(['title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'SUM(replacement_cost)', 'rating', 'special_features']);

        $output = $crud->render();
        //$view["grocery_crud"] = json_encode($output);
        //$this->parser->parse("pbase1", $view);
        /*$this->parser->parse("plantilla2/main_headbar", $view);
        $this->parser->parse("plantilla2/main_latmen", $view);
        $this->parser->parse("plantilla2/main_body", $view);
        $this->parser->parse("plantilla2/main_footer", $view);
        $this->parser->parse("plantilla2/main_scriptf", $view);
        /*


               echo view('plantilla2/main_head', $data );
        echo view('plantilla2/main_headbar');
        echo view('plantilla2/main_latmen', $data );
        echo view('plantilla2/main_body', $data );
        echo view('plantilla2/main_footer', $data );
        echo view('plantilla2/main_scriptf', $data );
        */

        return $this->_ejemploOutput($output);
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
