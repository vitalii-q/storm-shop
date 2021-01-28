<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Models\Attribute;
use App\Models\AttributeProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.catalog.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $attributes = Attribute::get();

        return view('admin.catalog.products.create', compact('categories', 'brands', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ // валидация
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'code' => 'required|unique:products',
        ]);
        // кладем файл в файловую систему
        if(isset($request['image'])) {
            Storage::disk('public')->put('files/catalog/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // создает новую запись в таблице
        $product = Product::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'description_bottom' => $request->description_bottom,
            'description_bottom_en' => $request->description_bottom_en,
            'information' => $request->information,
            'information_en' => $request->information_en,

            'code' => $request->code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,

            'new' => $request->new ? 1 : 0,
            'sale' => $request->sale ? 1 : 0,
            'bestseller' => $request->bestseller ? 1 : 0,

            'image_1' => $request->image ? 'storage/files/catalog/'.$request->image->getClientOriginalName() : null,
        ]);

        $product->attributes()->sync($request->attr); // синхронизируем продукт с аттрибутами

        session()->flash('info', 'Продукт создан');
        return redirect()->route('admin.catalog.products.index');
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
    public function edit($id)
    {
        $categories = Category::get();
        $brands = Brand::get();
        $product = Product::where('id', $id)->first();
        $attributes = Attribute::get();
        return view('admin.catalog.products.edit', compact('categories','brands', 'product', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([ // валидация
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'code' => 'required|unique:blog,id,'.$request->id,
        ]);

        // элемент который обновляем
        $product = Product::where('id', $id)->first();

        // (если убрали или загрузили новое) удаляем старое изображение
        if($request->delete_image === 'yes' or isset($request->image)) {
            $imagePathExp = explode('/', $product->image_1);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/catalog/'.$image);

            $product->update([ // удаляем путь к файлу в бд или записываем новый путь к изображению
                'image_1' => $request->image ? 'storage/files/catalog/'.$request->image->getClientOriginalName() : null,
            ]);
        }

        // кладем файл в файловую систему
        if(isset($request->image)) {
            Storage::disk('public')->put('files/catalog/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // обновляем элемент
        $product->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'description_bottom' => $request->description_bottom,
            'description_bottom_en' => $request->description_bottom_en,
            'information' => $request->information,
            'information_en' => $request->information_en,

            'code' => $request->code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,

            'new' => $request->new ? 1 : 0,
            'sale' => $request->sale ? 1 : 0,
            'bestseller' => $request->bestseller ? 1 : 0,
        ]);

        $product->attributes()->sync($request->attr); // синхронизируем продукт с аттрибутами

        session()->flash('info', 'Продукт обновлен');
        return redirect()->route('admin.catalog.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();

        // удаляем изображение если есть
        if(isset($product->image_1)) {
            $imagePathExp = explode('/', $product->image_1);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/catalog/'.$image);
        }

        // удаляем торговые предложения продукта
        $skus = Sku::where('product_id', $id)->get();
        foreach ($skus as $sku) {
            foreach ($sku->skuValues as $skuValue) {
                $skuValue->delete();
            }
            $sku->delete();
        }

        // удаляем продукт
        $product->delete();

        session()->flash('info', 'Продукт удален вместе с торговыми предложениями');
        return redirect()->route('admin.catalog.products.index');
    }
}
