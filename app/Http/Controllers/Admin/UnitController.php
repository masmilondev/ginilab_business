<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UnitRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $unitRepository;

    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
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

        $units = $this->unitRepository->getUnits($business->id);

        $data['route'] = '/dashboard/unit';
        $data['units'] = $units;

        return View('admin.unit.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

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
            $isSaved = $this->unitRepository->updateUnit($request, $id);

            if ($isSaved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Unit updated successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Unit update failed',
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
        // Check is user is logged in
        if (auth()->check()) {
            $unit = $this->unitRepository->getUnit($id);

            if ($unit) {
                try {
                    $unit->delete();

                    return response()->json([
                        'success' => true,
                        'message' => 'Unit deleted successfully',
                    ]);
                } catch (\Throwable $th) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Unit delete failed',
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Unit not found',
                ]);
            }
        }
    }
}
