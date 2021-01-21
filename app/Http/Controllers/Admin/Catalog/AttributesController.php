<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.catalog.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.attributes.create');
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
            'name_en' => 'required',
            'code' => 'required|unique:attributes',
        ]);

        // создает новую запись в таблице blog_category
        Attribute::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'code' => $request->code,

            'is_filterable' => $request->is_filterable ? 1 : 0,
            'is_required' => $request->is_required ? 1 : 0,
        ]);

        session()->flash('info', 'Атрибут создан');
        return redirect()->route('admin.catalog.attributes.index');
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
        $attribute = Attribute::where('id', $id)->first();
        return view('admin.catalog.attributes.edit', compact('attribute'));
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
            'name_en' => 'required',
            'code' => 'required|unique:blog_categories,id,'.$request->id,
        ]);

        // элемент который обновляем
        $attribute = Attribute::where('id', $id)->first();


        // обновляем элемент в таблице blog_category
        $attribute->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'code' => $request->code,

            'is_filterable' => $request->is_filterable ? 1 : 0,
            'is_required' => $request->is_required ? 1 : 0,
        ]);

        session()->flash('info', 'Атрибут обновлен');
        return redirect()->route('admin.catalog.attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::where('id', $id)->first();

        // удаляем значения атрибута
        foreach ($attribute->attributeValues as $attributeValue) {
            $attributeValue->delete();
        }

        // удаляем атрибут
        $attribute->delete();

        session()->flash('info', 'Атрибут и значения атрибута удалены');
        return redirect()->route('admin.catalog.attributes.index');
    }
}
