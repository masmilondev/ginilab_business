<?php

namespace App\Repositories;

use App\Http\Requests\BranchRequest;
use App\Http\Requests\BusinessRequest;
use App\Interfaces\IBranchRepository;
use App\Models\Branch;
use App\Models\Business;

class BranchRepository extends BaseRepository implements IBranchRepository
{
    protected $model;

    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }

    public function getBranches($id)
    {
        return $this->model->with('serviceType')->find($id);
    }

    public function updateBrnach(BranchRequest $request, $id)
    {
        try {
            $branch = $this->model->find($id);
            if ($branch) {
                $branch->name = $request->name;
                $branch->house = $request->house;
                $branch->street = $request->street;
                $branch->zone = $request->zone;
                $branch->city = $request->city;
                $branch->country = $request->country;
                $branch->mobile = $request->mobile;
                $branch->email = $request->email;
                $branch->latitude =  $request->latitude;
                $branch->longitude = $request->longitude;
                $branch->vat = $request->vat;
                $branch->vat_registration_number = $request->vat_registration_number;
                $branch->is_halal = $request->is_halal && $request->is_halal == 1 ?  1 : 0;
                $branch->cloud_sync =
                    $request->cloud_sync && $request->cloud_sync == 1 ?  1 : 0;
                $branch->online_pre_order =
                    $request->online_pre_order && $request->online_pre_order == 1 ?  1 : 0;

                if ($request->busy_until != "NO") {
                    $branch->busy_until = $request->busy_until;
                }

                $branch->service_type_id = $request->service_type_id;
                $branch->save();
                flash('Branch updated')->success();
                return true;
            } else {
                flash("No branch found")->error();
                return false;
            }
        } catch (\Throwable $th) {
            flash('Something went wrong.')->error();
            return false;
        }
    }
}