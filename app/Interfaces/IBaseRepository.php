<?php

namespace App\Interfaces;

interface IBaseRepository
{
    public function getAll();
    public function find($id);
    public function remove($id);
}