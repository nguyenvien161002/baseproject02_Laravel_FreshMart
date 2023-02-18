<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        // CASE RELOAD PAGE
        if ($request->sort_by && $request->filter) {
            if ($request->sort_by == 'alpha-asc') {
                $products = $this -> filterMePostProducts($request->all(), "name", "asc");
            } elseif ($request->sort_by == 'alpha-desc') {
                $products = $this -> filterMePostProducts($request->all(), "name", "desc");
            } elseif ($request->sort_by == 'price-asc') {
                $products = $this -> filterMePostProducts($request->all(), "price", "asc");
            } elseif ($request->sort_by == 'price-desc') {
                $products = $this -> filterMePostProducts($request->all(), "price", "desc");
            }
        } elseif ($request->filter) {
            $products = $this -> filterMeGetProducts($request->filter);
        } elseif ($request->sort_by) {
            $products = $this -> sortMeGetProducts($request->sort_by);
        } else {
            $products = Products::where('state', 1)->paginate(12);
        }

        // AJAX REQUEST
        if ($request->ajax()) {
            // Button Actions Pagination (Sort)
            if($request->sort_by) { 
                $products = $this -> sortMeGetProducts($request->sort_by);
            }
            // Button Actions Pagination (Filter)
            if($request->filter) {
                $products = $this -> filterMeGetProducts($request->filter);
            }
            // Button Actions Pagination (Sort, filter)
            if($request->sort_by && $request->filter) {
                if ($request->sort_by == 'alpha-asc') {
                    $products = $this -> filterMePostProducts($request->all(), "name", "asc");
                } elseif ($request->sort_by == 'alpha-desc') {
                    $products = $this -> filterMePostProducts($request->all(), "name", "desc");
                } elseif ($request->sort_by == 'price-asc') {
                    $products = $this -> filterMePostProducts($request->all(), "price", "asc");
                } elseif ($request->sort_by == 'price-desc') {
                    $products = $this -> filterMePostProducts($request->all(), "price", "desc");
                }
            }
            return View::make('clients.layouts.products.main', compact([
                'products'
            ]));
        }

        $category_product = CategoryProduct::where('state', 1)->get()->toArray();
        return View::make('clients.layouts.products', compact([
            'category_product', 'products'
        ]));
    }   

    public function detailsProduct($id)
    {
        $category_product = CategoryProduct::where('state', 1)->get()->toArray();
        $product = Products::find($id)->toArray();
        $related_p = Products::where([
            ['id_category_product', '=', $product['id_category_product']],
            ['id', '<>', $id],
            ['discount', '>', 0]
        ])
            ->inRandomOrder()->limit(5)->get()->toArray();
        $images_sub = explode('|', $product['images_sub']);
        return View::make('clients.layouts.details.details_product', compact([
            'category_product', 'product', 'related_p', 'images_sub'
        ]));
    }

    public function getProductsFromCondi(Request $request)
    {
        if ($request->ajax()) {
            $url = $request->url;
            $url_components = parse_url($url);
            if(isset($url_components['query'])) {
                parse_str($url_components['query'], $params);
            }
            $products = Products::where('state', 1)->paginate(12);
            if (isset($params['sort_by'])) {
                if ($params['sort_by'] == 'alpha-asc') {
                    $products = Products::where('state', 1)->orderBy('name', 'asc')->paginate(12);
                } elseif ($params['sort_by'] == 'alpha-desc') {
                    $products = Products::where('state', 1)->orderBy('name', 'desc')->paginate(12);
                } elseif ($params['sort_by'] == 'price-asc') {
                    $products = Products::where('state', 1)->orderBy('price', 'asc')->paginate(12);
                } elseif ($params['sort_by'] == 'price-desc') {
                    $products = Products::where('state', 1)->orderBy('price', 'desc')->paginate(12);
                }
            }
            if (isset($params['filter'])) {
                if ($params['filter'] == "price_under:100000") {
                    $products = Products::where('state', 1)->where('price', '<=', 100000)->paginate(12);
                    if (isset($params['(range_price:100000-200000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 200000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:200000-300000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 300000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:300000-500000)']) || isset($params['price_over:500000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 500000])
                            ->paginate(12);
                    }
                } elseif ($params['filter'] == "(range_price:100000-200000)") {
                    $products = Products::where('state', 1)->whereBetween('price', [100000, 200000])->paginate(12);
                    if (isset($params['price_under:100000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 200000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:200000-300000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 300000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:300000-500000)']) || isset($params['price_over:500000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 500000])
                            ->paginate(12);
                    }
                    if (isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 300000])
                            ->paginate(12);
                    }
                    if (
                        isset($params['(range_price:200000-300000)']) && isset($params['(range_price:300000-500000)'])
                        || (isset($params['(range_price:200000-300000)']) && isset($params['price_over:500000']))
                        || (isset($params['(range_price:300000-500000)']) && isset($params['price_over:500000']))
                    ) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 500000])
                            ->paginate(12);
                    }
                    if ((isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)']))
                        || (isset($params['price_under:100000']) && isset($params['range_price:300000-500000)']))
                        || (isset($params['price_under:100000']) && isset($params['price_over:500000']))
                    ) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 500000])
                            ->paginate(12);
                    }
                } elseif ($params['filter'] == "(range_price:200000-300000)") {
                    $products = Products::where('state', 1)->whereBetween('price', [200000, 300000])->paginate(12);
                    if (isset($params['price_under:100000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 300000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:100000-200000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 300000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:300000-500000)']) || isset($params['price_over:500000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [200000, 500000])
                            ->paginate(12);
                    }
                    if (isset($params['price_under:100000']) && isset($params['(range_price:100000-200000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 300000])
                            ->paginate(12);
                    }
                    if ((isset($params['(range_price:100000-200000)']) && isset($params['(range_price:300000-500000)']))
                        || (isset($params['(range_price:100000-200000)']) && isset($params['price_over:500000']))
                    ) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 500000])
                            ->paginate(12);
                    }
                    if ((isset($params['price_under:100000']) && isset($params['(range_price:300000-500000)']))
                        || (isset($params['price_under:100000']) && isset($params['price_over:500000']))
                    ) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 500000])
                            ->paginate(12);
                    }
                } elseif ($params['filter'] == "(range_price:300000-500000)") {
                    $products = Products::where('state', 1)->whereBetween('price', [300000, 500000])->paginate(12);
                    if (isset($params['price_under:100000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 500000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:100000-200000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 500000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:200000-300000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [200000, 500000])
                            ->paginate(12);
                    }
                    if (isset($params['price_over:500000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [300000, 500000])
                            ->paginate(12);
                    }
                    if ((isset($params['(range_price:200000-300000)']) && isset($params['price_over:500000']))){
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [200000, 500000])
                            ->paginate(12);
                    }
                    if ((isset($params['(range_price:100000-200000)']) && isset($params['price_over:500000']))
                        || (isset($params['(range_price:100000-200000)']) && isset($params['(range_price:200000-300000)']))) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 500000])
                            ->paginate(12);
                    }
                    if ((isset($params['price_under:100000']) && isset($params['(range_price:100000-200000)']))
                        || (isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)']))
                        || (isset($params['price_under:100000']) && isset($params['price_over:500000']))) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 500000])
                            ->paginate(12);
                    }
                } elseif ($params['filter'] == "price_over:500000") {
                    $products = Products::where('state', 1)->where('price', '>=', 500000)->paginate(12);
                    if (isset($params['price_under:100000'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 500000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:100000-200000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 500000])
                            ->paginate(12);
                    }
                    if (isset($params['(range_price:200000-300000)']) || isset($params['(range_price:300000-500000)'])) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [200000, 500000])
                            ->paginate(12);
                    }
                    if ((isset($params['(range_price:100000-200000)']) && isset($params['(range_price:300000-500000)']))
                        || (isset($params['(range_price:100000-200000)']) && isset($params['(range_price:200000-300000)']))
                    ) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [100000, 500000])
                            ->paginate(12);
                    }
                    if ((isset($params['price_under:100000']) && isset($params['(range_price:100000-200000)']))
                        || (isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)']))
                        || (isset($params['price_under:100000']) && isset($params['(range_price:300000-500000)']))
                    ) {
                        $products = Products::where('state', 1)
                            ->whereBetween('price', [0, 500000])
                            ->paginate(12);
                    }
                }
            }
            if((isset($params['sort_by']) && isset($params['filter']))) {
                if ($params['sort_by'] == 'alpha-asc') {
                    $products = $this -> filterMePostProducts($params, "name", "asc");
                } elseif ($params['sort_by'] == 'alpha-desc') {
                    $products = $this -> filterMePostProducts($params, "name", "desc");
                } elseif ($params['sort_by'] == 'price-asc') {
                    $products = $this -> filterMePostProducts($params, "price", "asc");
                } elseif ($params['sort_by'] == 'price-desc') {
                    $products = $this -> filterMePostProducts($params, "price", "desc");
                }
            }
            return Response::json(View::make('clients.layouts.products.main', compact('products'))->render());
        }
    }

    public function getProductOfCategory($id)
    {
        $category_product = CategoryProduct::where('state', 1)->get()->toArray();
        $products = Products::where('state', 1)->where('id_category_product', $id)->paginate(12);
        return View::make('clients.layouts.products', compact([
            'category_product', 'products'
        ]));
    }

    public function filterMePostProducts($params, $field, $type)
    {
        if ($params['filter'] == "price_under:100000") {
            $products = Products::where('state', 1)->where('price', '<=', 100000)->orderBy($field, $type)->paginate(12);
            if (isset($params['(range_price:100000-200000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 200000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:200000-300000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:300000-500000)']) || isset($params['price_over:500000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
        } elseif ($params['filter'] == "(range_price:100000-200000)") {
            $products = Products::where('state', 1)->whereBetween('price', [100000, 200000])->orderBy($field, $type)->paginate(12);
            if (isset($params['price_under:100000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 200000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:200000-300000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 300000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:300000-500000)']) || isset($params['price_over:500000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (
                isset($params['(range_price:200000-300000)']) && isset($params['(range_price:300000-500000)'])
                || (isset($params['(range_price:200000-300000)']) && isset($params['price_over:500000']))
                || (isset($params['(range_price:300000-500000)']) && isset($params['price_over:500000']))
            ) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)']))
                || (isset($params['price_under:100000']) && isset($params['range_price:300000-500000)']))
                || (isset($params['price_under:100000']) && isset($params['price_over:500000']))
            ) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
        } elseif ($params['filter'] == "(range_price:200000-300000)") {
            $products = Products::where('state', 1)->whereBetween('price', [200000, 300000])->orderBy($field, $type)->paginate(12);
            if (isset($params['price_under:100000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:100000-200000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 300000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:300000-500000)']) || isset($params['price_over:500000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [200000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['price_under:100000']) && isset($params['(range_price:100000-200000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['(range_price:100000-200000)']) && isset($params['(range_price:300000-500000)']))
                || (isset($params['(range_price:100000-200000)']) && isset($params['price_over:500000']))
            ) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['price_under:100000']) && isset($params['(range_price:300000-500000)']))
                || (isset($params['price_under:100000']) && isset($params['price_over:500000']))
            ) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
        } elseif ($params['filter'] == "(range_price:300000-500000)") {
            $products = Products::where('state', 1)->whereBetween('price', [300000, 500000])->orderBy($field, $type)->paginate(12);
            if (isset($params['price_under:100000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:100000-200000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:200000-300000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [200000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['price_over:500000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [300000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['(range_price:200000-300000)']) && isset($params['price_over:500000']))){
                $products = Products::where('state', 1)
                    ->whereBetween('price', [200000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['(range_price:100000-200000)']) && isset($params['price_over:500000']))
                || (isset($params['(range_price:100000-200000)']) && isset($params['(range_price:200000-300000)']))) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['price_under:100000']) && isset($params['(range_price:100000-200000)']))
                || (isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)']))
                || (isset($params['price_under:100000']) && isset($params['price_over:500000']))) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
        } elseif ($params['filter'] == "price_over:500000") {
            $products = Products::where('state', 1)->where('price', '>=', 500000)->orderBy($field, $type)->paginate(12);
            if (isset($params['price_under:100000'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:100000-200000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if (isset($params['(range_price:200000-300000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [200000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if(isset($params['(range_price:300000-500000)'])) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [300000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['(range_price:100000-200000)']) && isset($params['(range_price:300000-500000)']))
                || (isset($params['(range_price:100000-200000)']) && isset($params['(range_price:200000-300000)']))
            ) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
            if ((isset($params['price_under:100000']) && isset($params['(range_price:100000-200000)']))
                || (isset($params['price_under:100000']) && isset($params['(range_price:200000-300000)']))
                || (isset($params['price_under:100000']) && isset($params['(range_price:300000-500000)']))
            ) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->orderBy($field, $type)
                    ->paginate(12);
            }
        }
        return $products;
    }

    public function filterMeGetProducts($param)
    {
        if ($param == "price_under:100000") {
            $products = Products::where('state', 1)->where('price', '<=', 100000)->paginate(12);
            $urlFull = urldecode(URL::full());
            if (str_contains("$urlFull", "(range_price:100000-200000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 200000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:200000-300000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:300000-500000)") == true || str_contains("$urlFull", "price_over:500000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->paginate(12);
            }
        } elseif ($param == "(range_price:100000-200000)") {
            $products = Products::where('state', 1)->whereBetween('price', [100000, 200000])->paginate(12);
            $urlFull = urldecode(URL::full());
            if (str_contains("$urlFull", "price_under:100000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 200000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:200000-300000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 300000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:300000-500000)") == true || str_contains("$urlFull", "price_over:500000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:200000-300000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:200000-300000)") == true && str_contains("$urlFull", "(range_price:300000-500000)") == true
                || (str_contains("$urlFull", "(range_price:200000-300000)") == true && str_contains("$urlFull", "price_over:500000") == true)
                || (str_contains("$urlFull", "(range_price:300000-500000)") == true && str_contains("$urlFull", "price_over:500000") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->paginate(12);
            }
            if ((str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:200000-300000)") == true)
                || (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:300000-500000)") == true)
                || (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "price_over:500000") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->paginate(12);
            }
        } elseif ($param == "(range_price:200000-300000)") {
            $products = Products::where('state', 1)->whereBetween('price', [200000, 300000])->paginate(12);
            $urlFull = urldecode(URL::full());
            if (str_contains("$urlFull", "price_under:100000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:100000-200000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 300000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:300000-500000)") == true || str_contains("$urlFull", "price_over:500000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [200000, 500000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:100000-200000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 300000])
                    ->paginate(12);
            }
            if ((str_contains("$urlFull", "(range_price:100000-200000)") == true && str_contains("$urlFull", "(range_price:300000-500000)") == true)
                || (str_contains("$urlFull", "(range_price:100000-200000)") == true && str_contains("$urlFull", "price_over:500000") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->paginate(12);
            }
            if ((str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:300000-500000)") == true)
                || (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "price_over:500000") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->paginate(12);
            }
        } elseif ($param == "(range_price:300000-500000)") {
            $products = Products::where('state', 1)->whereBetween('price', [300000, 500000])->paginate(12);
            $urlFull = urldecode(URL::full());
            if (str_contains("$urlFull", "price_under:100000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:100000-200000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:200000-300000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [200000, 500000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "price_over:500000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [300000, 500000])
                    ->paginate(12);
            }
            if ((str_contains("$urlFull", "(range_price:100000-200000)") == true && str_contains("$urlFull", "price_over:500000") == true)
                || (str_contains("$urlFull", "(range_price:100000-200000)") == true && str_contains("$urlFull", "(range_price:200000-300000)") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->paginate(12);
            }
            if ((str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:100000-200000)") == true)
                || (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:200000-300000)") == true)
                || (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "price_over:500000") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->paginate(12);
            }
        } elseif ($param == "price_over:500000") {
            $products = Products::where('state', 1)->where('price', '>=', 500000)->paginate(12);
            $urlFull = urldecode(URL::full());
            if (str_contains("$urlFull", "price_under:100000") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:100000-200000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->paginate(12);
            }
            if (str_contains("$urlFull", "(range_price:200000-300000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [200000, 500000])
                    ->paginate(12);
            }
            if(str_contains("$urlFull", "(range_price:300000-500000)") == true) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [300000, 500000])
                    ->paginate(12);
            }
            if ((str_contains("$urlFull", "(range_price:100000-200000)") == true && str_contains("$urlFull", "(range_price:300000-500000)") == true)
                || (str_contains("$urlFull", "(range_price:100000-200000)") == true && str_contains("$urlFull", "(range_price:200000-300000)") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [100000, 500000])
                    ->paginate(12);
            }
            if ((str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:100000-200000)") == true)
                || (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:200000-300000)") == true)
                || (str_contains("$urlFull", "price_under:100000") == true && str_contains("$urlFull", "(range_price:300000-500000)") == true)) {
                $products = Products::where('state', 1)
                    ->whereBetween('price', [0, 500000])
                    ->paginate(12);
            }
        }
        return $products;
    }

    public function sortMeGetProducts($param)
    {
        if ($param == 'alpha-asc') {
            $products = Products::where('state', 1)->orderBy('name', 'asc')->paginate(12);
        } elseif ($param == 'alpha-desc') {
            $products = Products::where('state', 1)->orderBy('name', 'desc')->paginate(12);
        } elseif ($param == 'price-asc') {
            $products = Products::where('state', 1)->orderBy('price', 'asc')->paginate(12);
        } elseif ($param == 'price-desc') {
            $products = Products::where('state', 1)->orderBy('price', 'desc')->paginate(12);
        }
        return $products;
    }
}
