<?php

namespace App\Models;

use CodeIgniter\Model;

class ResumenModel extends Model
{
    protected $table = 'tresumen';

    public function getAll()
    {
        return $this->findAll();
    }

    public function getResumen() {
        $query   = $db->query('SELECT titulo, nombre FROM '.$table);
        $results = $query->getResult();
        return $results;

    }

}