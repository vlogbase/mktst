<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function category_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Category $category) {

                    $btn = '<a href="/admin/categories/' . $category->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    </a>
                    ';
                    return $btn;
                })
                ->addColumn('image', function (Category $category) {

                    if (strlen($category->image) > 2) {
                        $img = '<img src="' . $category->image . '" style="width:70px;" class="img-thumbnail " >';
                    } else {
                        $img = "No Image";
                    }
                    return $img;
                })
                ->addColumn('products', function (Category $category) {
                    return $category->activeProducts->count();
                })
                ->addColumn('child', function (Category $category) {
                    return $category->childrenCategories->count();
                })
                ->addColumn('parent', function (Category $category) {
                    if ($category->parent) {
                        $prn = $category->parent->name;
                    } else {
                        $prn = 'Main';
                    }
                    return $prn;
                })
                ->addColumn('created_at_visual', function (Category $category) {
                    return Carbon::parse($category->created_at)->diffForHumans();
                })
                ->rawColumns(['action', 'created_at_visual', 'image', 'products', 'child', 'parent'])
                ->make(true);
        }
        return view('admin.categories.category_list');
    }

    public function category_tree()
    {
        $parentCategories = Category::where('category_id', NULL)->get();
        return view('admin.categories.category_tree', compact('parentCategories'));
    }

    public function category_add()
    {
        return view('admin.categories.category_add');
    }

    public function category_detail($id)
    {
        Category::findOrFail($id);
        return view('admin.categories.category_detail', compact('id'));
    }

    public function category_delete($id)
    {
        $category = Category::findOrFail($id);
        $category->activeProducts()->detach();
        $category->delete();

        return view('admin.categories.category_list');
    }
}
