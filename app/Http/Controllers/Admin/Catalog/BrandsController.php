<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.catalog.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.brands.create');
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
            'code' => 'required|unique:brands',
        ]);
        // кладем файл в файловую систему
        if(isset($request['image'])) {
            Storage::disk('public')->put('files/catalog/brands/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // создает новую запись в таблице blog_category
        Brand::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'description' => $request->description,
            'description_en' => $request->description_en,

            'code' => $request->code,

            'image' => $request->image ? 'storage/files/catalog/brands/'.$request->image->getClientOriginalName() : null,
        ]);

        session()->flash('info', 'Бренд создан');
        return redirect()->route('admin.catalog.brands.index');
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
        $brand = Brand::where('id', $id)->first();
        return view('admin.catalog.brands.edit', compact('brand'));
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
            'code' => 'required|unique:brands,id,'.$request->id,
        ]);

        // элемент который обновляем
        $brand = Brand::where('id', $id)->first();

        // (если убрали или загрузили новое) удаляем старое изображение
        if($request->delete_image === 'yes' or isset($request->image)) {
            $imagePathExp = explode('/', $brand->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/catalog/brands/'.$image);

            $brand->update([ // удаляем путь к файлу в бд или записываем новый путь к изображению
                'image' => $request->image ? 'storage/files/catalog/brands/'.$request->image->getClientOriginalName() : null,
            ]);
        }

        // кладем файл в файловую систему
        if(isset($request->image)) {
            Storage::disk('public')->put('files/catalog/brands/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // обновляем элемент в таблице blog_category
        $brand->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'code' => $request->code,
        ]);

        session()->flash('info', 'Бренд обновлен');
        return redirect()->route('admin.catalog.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->first();

        // удаляем изображение если есть
        if(isset($brand->image)) {
            $imagePathExp = explode('/', $brand->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/catalog/brands/'.$image);
        }

        // удаляем категорию
        $brand->delete();

        session()->flash('info', 'Бренд удален');
        return redirect()->route('admin.catalog.brands.index');
    }
}
