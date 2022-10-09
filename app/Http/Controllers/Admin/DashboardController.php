<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IBranchRepository;
use App\Interfaces\IBusinessRepository;
use App\Interfaces\IBusinessTypeRepository;
use App\Interfaces\ICurrencyRepository;
use App\Interfaces\ILanguageRepository;
use App\Interfaces\IServiceTypesRepository;
use App\Repositories\BranchRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\LanguageRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $businessRepository;
    protected $businessTypeRepository;
    protected $branchRepository;
    protected $currencyRepository;
    protected $languageRepository;
    protected $serviceTypesRepository;

    public function __construct(
        IBusinessRepository $businessRepository,
        IBusinessTypeRepository $businessTypeRepository,
        IBranchRepository $branchRepository,
        ICurrencyRepository $currencyRepository,
        ILanguageRepository $languageRepository,
        IServiceTypesRepository $serviceTypesRepository,
    ) {
        $this->businessRepository = $businessRepository;
        $this->businessTypeRepository = $businessTypeRepository;
        $this->branchRepository = $branchRepository;
        $this->currencyRepository = $currencyRepository;
        $this->languageRepository = $languageRepository;
        $this->serviceTypesRepository = $serviceTypesRepository;
    }

    public function index()
    {
        $data['route'] = '/admin';
        return view('admin.dashboard', $data);
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
        $data['branch'] =
            $this->branchRepository->getBranches(1);
        $data['service_types'] =
            $this->serviceTypesRepository->getAll();
        $data['route'] = '/branch-setup';

        // return response()->json($data);
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