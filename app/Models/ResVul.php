<?php

namespace App\Models;

use CodeIgniter\Model;

class ResVul extends Model
{
    protected $table = 'rapid7_csv';

    public function getAll()
    {
        return $this->findAll();
    }

    public function getResumen() {
        $table = 'rapid7_csv';
        $db = db_connect();
        $query   = $db->query('SELECT ip_address_i, sum(risk) AS suma FROM '.$table.' WHERE risk > 0 GROUP BY ip_address_i ORDER BY suma DESC' );
        $results = $query->getResult();
        return $results;
    }

}
