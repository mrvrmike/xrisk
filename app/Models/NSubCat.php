<?php

namespace App\Models;

use CodeIgniter\Model;

class NSubCat extends Model
{
    protected $table = 'nstscat';

    public function getAll()
    {
        return $this->findAll();
    }



}