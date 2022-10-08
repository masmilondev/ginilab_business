<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IBusinessRepository;
use App\Interfaces\IBusinessTypeRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $businessRepository;
    protected $businessTypeRepository;

    public function __construct(IBusinessRepository $businessRepository, IBusinessTypeRepository $businessTypeRepository)
    {
        $this->businessRepository = $businessRepository;
        $this->businessTypeRepository = $businessTypeRepository;
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function businessSetup()
    {
        $data['business'] =
            $this->businessRepository->getBusinessInformation(1);
        $data['business_types'] = $this->businessTypeRepository->getAll();
        $data['route'] = '/business-setup';

        // return response()->json($data['business']->businessType);
        return view('admin.business.index', $data);
    }

    public function branchSetup()
    {
        $data['business'] =
            $this->businessRepository->getBusinessInformation(1);
        $data['business_types'] = $this->businessTypeRepository->getAll();
        $data['route'] = '/branch-setup';

        // return response()->json($data['business']->businessType);
        return view('admin.branch.index', $data);
    }

    public function languages()
    {
        $data['business'] =
            $this->businessRepository->getBusinessInformation(1);
        $data['business_types'] = $this->businessTypeRepository->getAll();
        $data['route'] = '/languages';

        // return response()->json($data['business']->businessType);
        return view('admin.languages.index', $data);
    }

    public function currencies()
    {
        $data['business'] =
            $this->businessRepository->getBusinessInformation(1);
        $data['business_types'] = $this->businessTypeRepository->getAll();
        $data['route'] = '/currencies';

        // return response()->json($data['business']->businessType);
        return view('admin.currencies.index', $data);
    }
}