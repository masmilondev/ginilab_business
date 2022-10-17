<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\ICategoryRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getCategories($businessId)
    {
        return $this->model->with(['parent', 'children'])->where('business_id', $businessId)->get();
    }

    public function createCategory(CategoryRequest $request){
        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $image_path = $file->storeAs('category', $request->name . "." . $file->getClientOriginalExtension(), 'public');
            }


            $show_on = 0;
            switch ($request->show_on) {
                case 'online':
                    $show_on = 1;
                    break;
                case 'offline':
                    $show_on = 2;
                    break;
                case 'all':
                    $show_on = 3;
                    break;
                default:
                    $show_on = 3;
                    break;
            }

            $category = $this->model->create([
                'business_id' => auth()->user()->businesses->first()->id,
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'color' => $request->color,
                'image' => $image_path,
                'exclude_from_discount' => $request->exclude_from_discount == null ? false :true,
                'show_on' => $show_on,
            ]);

            $category->save();
            
            DB::commit();

            return true;
        } catch (\Throwable $th) {
            // Show flash mesag
            flash()->error($th->getMessage());
            DB::rollBack();
            return false;
        }
    }
}