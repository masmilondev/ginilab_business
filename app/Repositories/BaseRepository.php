<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function getAll()
    {
        return $this->model->get();
    }
    public function find($id)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $data;
        } else {
            flash('No data found')->error();
            return null;
        }
    }
    public function remove($id)
    {
        try {
            $data = $this->model->find($id);
            if ($data) {
                $data->delete();
                flash('Data deleted')->success();
                return true;
            } else {
                flash('No data found')->error();
                return null;
            }
        } catch (\Throwable $th) {
            flash('Something went wrong')->error();
            return null;
        }
    }
}