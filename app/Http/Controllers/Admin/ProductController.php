<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.products.';
    public function index()
    {
        // dd($catalogue);
        $data = Product::query()->with(['catalogue', 'tags'])->latest('id')->get();


        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogues', 'colors', 'sizes', 'tags'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProduct = $request->except(['product_variants', 'tags', 'product_galleries']);
        $dataProduct['is_active'] = isset($dataProduct['is_active']) ? 1 : 0;
        $dataProduct['is_hot_deal'] = isset($dataProduct['is_hot_deal']) ? 1 : 0;
        $dataProduct['is_good_deal'] = isset($dataProduct['is_good_deal']) ? 1 : 0;
        $dataProduct['is_new'] = isset($dataProduct['is_new']) ? 1 : 0;
        $dataProduct['is_show_home'] = isset($dataProduct['is_show_home']) ? 1 : 0;
        $dataProduct['slug'] = Str::slug($dataProduct['name']) . '-' . $dataProduct['sku'];
        if ($dataProduct['img_thumbnail']) {
            $dataProduct['img_thumbnail'] = Storage::put('products', $dataProduct['img_thumbnail']);
        }
        $dataProductVariantsTmp = $request->product_variants;
        $dataProductVariants = [];
        foreach ($dataProductVariantsTmp as $key => $item) {
            $tmp = explode('-', $key);
            $dataProductVariants[] = [
                'product_size_id' => $tmp[0],
                'product_color_id' => $tmp[1],
                'quantity' => $item['quantity'],
                'image' => $item['image'] ?? null,
            ];
        }
        $dataProductTags = $request->tags;
        $dataProductGalleries = $request->product_galleries;

        try {

            DB::beginTransaction();


            /** @var Product $product */
            $product = Product::query()->create($dataProduct);

            foreach ($dataProductVariants as $dataProductVariant) {
                $dataProductVariant['product_id'] = $product->id;
                if ($dataProductVariant['image']) {
                    $dataProductVariant['image'] = Storage::put('products', $dataProductVariant['image']);
                }
                ProductVariant::query()->create($dataProductVariant);
            }

            $product->tags()->sync($dataProductTags);

            foreach ($dataProductGalleries as $item) {

                ProductGallery::query()->create([
                    'product_id' => $product->id,
                    'image' => Storage::put('products', $item)
                ]);
            }

            DB::commit();

            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollBack(); //
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load([
            'catalogue',
            'tags',
            'galleries',
            'variants',
        ]);

        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();

        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'catalogues', 'colors', 'sizes', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        list(
            $dataProduct,
            $dataProductVariants,
            $dataProductGalleries,
            $dataProductTags,
            $dataDeleteGalleries
        ) = $this->handleData($request);

        try {
            DB::beginTransaction();

            $productImgThumbnailCurrent = $product->img_thumbnail; // Lưu lại giá trị hiện tại để xóa

            /** @var Product $product */
            $product->update($dataProduct);

            foreach ($dataProductVariants as $item) {
                $item += ['product_id' => $product->id];

                ProductVariant::query()->updateOrCreate(
                    [
                        'product_id' => $item['product_id'],
                        'product_size_id' => $item['product_size_id'],
                        'product_color_id' => $item['product_color_id'],
                    ],
                    $item
                );
            }

            $product->tags()->sync($dataProductTags);

            foreach ($dataProductGalleries as $item) {
                $item += ['product_id' => $product->id];

                ProductGallery::query()->updateOrCreate(
                    [
                        'id' => $item['id']
                    ],
                    $item
                );
            }

            DB::commit();

            if (!empty($dataDeleteGalleries)) {
                foreach ($dataDeleteGalleries as $id => $path) {
                    ProductGallery::query()->where('id', $id)->delete();

                    if (!empty($path) && Storage::exists($path)) {
                        Storage::delete($path);
                    }
                }
            }

            if (!empty($productImgThumbnailCurrent) && Storage::exists($productImgThumbnailCurrent)) {
                Storage::delete($productImgThumbnailCurrent);
            }

            return back()->with('success', 'Thao tác thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();

            if (
                !empty($dataProduct['img_thumbnail'])
                && Storage::exists($dataProduct['img_thumbnail'])
            ) {

                Storage::delete($dataProduct['img_thumbnail']);
            }

            $dataHasImage = $dataProductVariants + $dataProductGalleries;
            foreach ($dataHasImage as $item) {
                if (!empty($item['image']) && Storage::exists($item['image'])) {
                    Storage::delete($item['image']);
                }
            }

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                $product->tags()->sync([]);
                $product->galleries()->delete();
                $product->variants()->delete();
                $product->delete();
            }, 3);
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}