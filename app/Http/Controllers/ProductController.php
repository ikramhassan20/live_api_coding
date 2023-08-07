<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\Client\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * list all products
     *
     *
     * @return data
     */
    public function index()
    {
        $data['products'] = Product::paginate();
        return $data['products'];
    }

    /**
     * get a products
     *
     *
     * @return data
     */
    public function show($id)
    {
        $data['product'] = Product::find($id);
        return $data['product'];
    }

    /**
     * delete a products
     *
     *
     * @return data
     */
    public function destory($id)
    {
        $data['product'] = Product::destroy($id);
        if($data['product']){
            return 'Your selected product is deleted';
        }
        return 'Your product is not delted';
    }

    /**
     * create new product
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $data = $request->only(['name', 'sku', 'photo', 'detail']);

        Product::save($data);
    }
}
