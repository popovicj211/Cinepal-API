<?php


namespace App\Services;

use App\DTO\CategoriesDTO;
use App\Contracts\CategoriesContract;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class CategoriesService extends BaseService implements CategoriesContract
{
    public function __construct($rimg = null)
    {
        parent::__construct($rimg);
    }

    public function getAllCategories(int $id): array
    {
        $categories = Categories::where('subcategory_id' , '=' , $id)->get();

          $catArr = [];

        foreach ($categories as $cat)
        {
            $catDTO = new CategoriesDTO();

            $catDTO->id = $cat->id;
            $catDTO->name = $cat->name;
            $catDTO->sub = $cat->subcategory_id;

            $catArr[] = $catDTO;
        }

        return $catArr;

    }

    public function getCategory(int $cat, int $id): CategoriesDTO
    {

            $cat = Categories::where([['id', $cat], ['subcategory_id', $id]])->firstOrFail();
            $catDTO = new CategoriesDTO();
            $catDTO->id = $cat->id;
            $catDTO->name = $cat->name;
            $catDTO->sub = $cat->subcategory_id;
            return $catDTO;

    }

    public function addCategory(CategoriesRequest $request)
    {
        $name = $request->get('catName');
        $sub = $request->get('subCat');
        $category = Categories::create([
            'name' => $name,
            'subcategory_id' => $sub
        ]);

        $category->save();
    }

    public function modifyCategory(CategoriesRequest $request , $id)
    {
        $name = $request->get('catName');
        $sub = $request->get('subCat');
        $category = Categories::findOrfail($id);
        $category->update([
            'name' => $name,
            'subcategory_id' => $sub,
            'updated_at' => Carbon::now()->toDateTime()
        ]);
    }

    public function deleteCategory($id)
    {

        $category = Categories::findOrFail($id);

        if ($category != null ) {
            $category->delete();
        }
    }

}
