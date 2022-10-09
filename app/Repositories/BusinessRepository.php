<?php

namespace App\Repositories;

use App\Http\Requests\BusinessRequest;
use App\Interfaces\IBusinessRepository;
use App\Models\Business;

class BusinessRepository extends BaseRepository implements IBusinessRepository
{
    protected $model;

    public function __construct(Business $model)
    {
        parent::__construct($model);
    }

    public function getBusinessInformation($id)
    {
        return  $this->model->with(['languages', 'currencies', 'businessType'])->find($id);
    }

    public function updateBusiness(BusinessRequest $request, $id)
    {
        try {
            $business = $this->model->find($id);
            if ($business) {
                $business->name = $request->name;
                $business->website = $request->website;
                $business->playstore_url = $request->playstore_url;
                $business->appstore_url = $request->appstore_url;
                $business->house = $request->house;
                $business->street = $request->street;
                $business->zone = $request->zone;
                $business->business_type_id = $request->business_type_id;
                $business->city = $request->city;
                $business->country = $request->country;
                $business->mobile = $request->mobile;
                $business->email = $request->email;
                $business->save();
                flash("Business udpated")->success();
                return true;
            } else {
                flash("No business found")->error();
                return false;
            }
        } catch (\Throwable $th) {
            flash('Something went wrong.')->error();
            return false;
        }
    }
}