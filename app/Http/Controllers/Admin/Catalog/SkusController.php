<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\Sku;
use App\Models\SkuValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $skus = $product->skus()->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.catalog.skus.index', compact('skus', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $attributes = Attribute::get();

        return view('admin.catalog.skus.create', compact('product', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required',
        ]);

        // проверка, создоваемого sku на наличие в бд
        $skuAlreadyExists = Sku::SkuExistenceCheck($product, $request->attribute_id);

        if($skuAlreadyExists == true) {
            session()->flash('info', 'Торговое предложение уже существует');

            $attributes = Attribute::get();
            return view('admin.catalog.skus.create', compact('product', 'attributes'));
        } else {
            $sku = Sku::create([
                'product_id' => $product->id,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);

            // создаем записи в таблице sku_value
            foreach ($request->attribute_id as $skuValue) {
                SkuValue::create([
                    'attribute_value_id' => $skuValue,
                    'sku_id' => $sku->id,
                ]);
            }

            session()->flash('info', 'Торговое предложение создано');
            return redirect()->route('admin.catalog.skus.index', compact('product'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $skuId)
    {
        $sku = Sku::where('id', $skuId)->first();
        return view('admin.catalog.skus.edit', compact('product', 'sku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $skuId)
    {
        $sku = Sku::where('id', $skuId)->first();
        $request->validate([
            'quantity' => 'required',
        ]);

        $sku->update([
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        // создаем записи в таблице sku_value
        $i=1; foreach ($sku->skuValues as $skuValue) {
            $skuValue->update([
                'attribute_value_id' => $request->attribute_id[$i],
                'sku_id' => $sku->id,
            ]);
        $i++;}

        session()->flash('info', 'Торговое предложение обновлено');
        return redirect()->route('admin.catalog.skus.index', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $skuId)
    {
        $sku = Sku::where('id', $skuId)->first();
        foreach ($sku->skuValues as $skuValue) {
            $skuValue->delete();
        }
        $sku->delete();

        session()->flash('info', 'Торговое предложение удалено');
        return redirect()->route('admin.catalog.skus.index', compact('product'));
    }
}
