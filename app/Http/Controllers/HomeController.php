<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function showLatestProducts()
    {
        // Lấy sản phẩm mới nhất cùng với các quan hệ
        $productLasted = Product::with(['catalogue', 'tags'])
            ->orderBy('created_at', 'desc')
            ->first();
        // dump($productLasted);
        $latestProducts3 = Product::with(['catalogue', 'tags'])
            ->orderBy('created_at', 'desc')
            ->take(3)  // Lấy 3 sản phẩm mới nhất
            ->get();
        $topViewedProduct = Product::with(['catalogue', 'tags'])
            ->orderBy('views', 'desc')  // Sắp xếp theo lượt xem
            ->first();
        // Truyền biến đến view
        $catalogues = Catalogue::all(); // Lấy tất cả danh mục
        return view(
            'welcome',
            [
                'productLasted' => $productLasted,
                'latestProducts3' => $latestProducts3,
                'topViewedProduct' => $topViewedProduct,
                'catalogues' => $catalogues,
            ]  // Truyền biến topViewedProduct đến view
        );
    }
}
