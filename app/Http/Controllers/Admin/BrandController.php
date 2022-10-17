<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BusinessRequest;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get user with businesses
        $user = auth()->user();
        $businesses = $user->businesses;
        $business = $businesses->first();

        $brands = $this->brandRepository->getBrands($business->id);

        $data['route'] = '/dashboard/brand';
        $data['brands'] = $brands;

        return View('admin.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->json([
            'success' => true,
            'message' => 'Brand added successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        // Add brand
        $user = auth()->user();
        $businesses = $user->businesses;
        $business = $businesses->first();

        $brand = $this->brandRepository->addBrand($request, $business->id);

        if ($brand) {
            return redirect()->route('brand.index')->with('success', 'Brand added successfully');
        } else {
            return redirect()->route('brand.index')->with('error', 'Brand could not be added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->check()) {
            $isSaved = $this->brandRepository->updateBrand($request, $id);

            if ($isSaved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Brand updated successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Brand update failed',
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->check()) {
            $brand = $this->brandRepository->getBrand($id);

            if ($brand) {
                try {
                    $brand->delete();

                    return response()->json([
                        'success' => true,
                        'message' => 'Brand deleted successfully',
                    ]);
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Brand delete failed',
                    ]);
                }
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ]);
    }
}
