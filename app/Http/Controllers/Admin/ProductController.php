<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function product_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Product $product) {

                    $btn = '<a href="/admin/products/' . $product->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
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
                ->addColumn('image', function (Product $product) {


                    $img = '<img src="' . $product->getCoverImage() . '" style="width:70px;" class="img-thumbnail " >';

                    return $img;
                })
                ->addColumn('status', function (Product $product) {
                    if ($product->status) {
                        $spn = '<span class="text-success"><i class="far fa-check-circle text-success"></i> Active</span>';
                    } else {
                        $spn = '<span class="text-danger"><i class="far fa-times-circle text-danger"></i> Inactive</span>';
                    }
                    return $spn;
                })
                ->addColumn('last_order', function (Product $product) {
                    return $product->name;
                })
                ->addColumn('brand', function (Product $product) {
                    return $product->brand->name;
                })
                ->addColumn('categories', function (Product $product) {
                    return $product->categories->pluck('name')->implode(', ');
                })
                ->addColumn('created_at_visual', function (Product $product) {
                    return Carbon::parse($product->created_at)->diffForHumans();
                })
                ->rawColumns(['action', 'created_at_visual', 'image', 'last_order', 'status', 'brand', 'categories'])
                ->make(true);
        }
        return view('admin.products.product_list');
    }

    public function product_add()
    {
        return view('admin.products.product_add');
    }

    public function product_detail(Request $request, $id)
    {
        $getBackCategoryUrl = $request->get('categoryFromUrl') ?? null;
        $getBackSellerUrl = $request->get('sellerFromUrl') ?? null;
        Product::findOrFail($id);
        
        return view('admin.products.product_detail', compact('id', 'getBackCategoryUrl', 'getBackSellerUrl'));
    }

    public function bulk_upload()
    {
        return view('admin.products.bulk_upload');
    }

    public function bulk_export()
    {

        $csvFileName = 'upload/csv/result_data_' . now()->format('Y_m_d_His') . '.csv';
        $csvFilePath = public_path($csvFileName);


        $fp = fopen($csvFileName, 'w');


        $headers = ['sku', 'product_name', 'tax_rate', 'unit_price', 'unit_per_price', 'stock', 'brand_name', 'pack_size', 'unit_weight', 'product_description', 'image_file_name', 'category_1', 'category_2'];
        fputcsv($fp, $headers);

        $products = Product::all();
        foreach ($products as $product) {
            $category = $product->categories->where('category_id', null)->first();
            if (!is_null($category)) {
                $sub_category = $product->categories->where('category_id', $category->id)->first();
            } else {
                $sub_category = null;
            }

            fputcsv($fp, [
                $product->sku,
                $product->name,
                $product->taxrate,
                floatval($product->unit_price),
                floatval($product->unit_per_price),
                $product->stock,
                optional($product->brand)->name,
                optional($product->productdetail)->pack,
                optional($product->productdetail)->unit_weight,
                optional($product->productdetail)->description,
                basename($product->getCoverImage()),
                $category ? $category->name : '',
                $sub_category ? $sub_category->name : '',
            ]);
        }

        fclose($fp);


        return response()->download($csvFilePath, basename($csvFilePath))->deleteFileAfterSend(true);
    }
}
