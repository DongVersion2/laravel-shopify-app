<?php

use Illuminate\Support\Facades\Route;
use Osiset\ShopifyApp\Util\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Http;

Route::get("/test", function() {
   return 1; 
});

Route::get('/', function () {

    // Storefront API Token
    $storefrontAccessToken = '6ad34864ea347eb7ebef1634e0b5aa2f'; // Ông chủ thay thế token đúng

    // Domain của cửa hàng
    $shopifyDomain = 'phandong-test.myshopify.com'; // Ông chủ thay thế bằng domain đúng

    // GraphQL query để lấy danh sách sản phẩm cùng với metafields
    $query = <<<GRAPHQL
    {
        products(first: 5) {
            edges {
                node {
                    id
                    title
                    description
                    onlineStoreUrl
                    images(first: 1) {
                        edges {
                            node {
                                src
                            }
                        }
                    }
                    metafield(namespace: "custom", key: "product_views") {
                        value
                    }
                }
            }
             
        }
    }
    GRAPHQL;

    // Gửi yêu cầu tới Storefront API
    $response = Http::withHeaders([
        'X-Shopify-Storefront-Access-Token' => $storefrontAccessToken,
        'Content-Type' => 'application/json',
    ])->post("https://{$shopifyDomain}/api/2024-07/graphql.json", [
        'query' => $query
    ]);
    // dd($response->json());
    // Kiểm tra và xử lý kết quả trả về
    if ($response->successful()) {
        $products = $response->json()['data']['products']['edges'];
        // dd($products);
        $products = array_map(function($item) {
            return $item['node'];
        }, $products);

        return view('welcome', compact('products'));
    } else {
        return response()->json(['error' => 'Something went wrong'], 500);
    }
});

