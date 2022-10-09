<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Repositories\BranchRepository;
use DateInterval;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected $branchRepository;

    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, $id)
    {
        date_default_timezone_set('Asia/Dhaka');
        $dateTime = new DateTime('now');
        switch ($request->busy_until) {
            case '0':
                $request->busy_until =
                    null;
                break;
            case '1':
                $request->busy_until =
                    $dateTime->add(new DateInterval('PT1H'));
                break;
            case '2':
                $request->busy_until =
                    $dateTime->add(new DateInterval('PT2H'));
                break;
            case '3':
                $request->busy_until =
                    $dateTime->add(new DateInterval('PT3H'));
                break;
            case '24':
                $request->busy_until =
                    new DateTime($dateTime->format('y-m-d') . ' 23:59');
                break;
            default:
                $request->busy_until = "NO";
                break;
        }
        $this->branchRepository->updateBrnach($request, $id);
        return redirect()->back();
    }
}