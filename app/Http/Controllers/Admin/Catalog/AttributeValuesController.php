<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($attributeId)
    {
        $attribute = Attribute::where('id', $attributeId)->first();
        $attributeValuesCollection = $attribute->attributeValues;

        // формируем массив с id значений аттрибутов
        $attributeValuesIds = [];
        foreach($attributeValuesCollection as $attributeValueCollection) {
            array_push($attributeValuesIds, $attributeValueCollection->id);
        }
        $attributeValues = AttributeValue::whereIn('id', $attributeValuesIds)->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.catalog.attribute_values.index', compact('attribute', 'attributeValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($attributeId)
    {
        $attribute = Attribute::where('id', $attributeId)->first();
        return view('admin.catalog.attribute_values.create', compact('attribute'));
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
            'name' => 'required|unique:attribute_value',
            'value' => 'required|unique:attribute_value',
        ]);

        // создает новую запись в таблице blog_category
        AttributeValue::create([
            'name' => $request->name,
            'value' => $request->value,
            'attribute_id' => $request->attribute_id,
        ]);

        $attribute = Attribute::where('id', $request->attribute_id)->first();
        $attributeValues = $attribute->attributeValues;

        session()->flash('info', 'Значение свойства создано');
        return redirect()->route('admin.catalog.attribute.values.index', compact('attribute', 'attributeValues'));
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
    public function edit($attributeId ,$id)
    {
        $attribute = Attribute::where('id', $attributeId)->first();
        $attributeValue = AttributeValue::where('id', $id)->first();
        return view('admin.catalog.attribute_values.edit', compact('attribute', 'attributeValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $attributeId, $valueId)
    {
        $attributeValue = AttributeValue::where('id',  $valueId)->first();
        $attribute = Attribute::where('id',  $attributeId)->first();

        $request->validate([ // валидация
            'name' => 'required|unique:attribute_value,id'.$request->id,
            'value' => 'required|unique:attribute_value,id'.$request->id,
        ]);

        // создает новую запись в таблице blog_category
        $attributeValue->update([
            'name' => $request->name,
            'value' => $request->value,
            'attribute_id' => $attributeValue->attribute_id,
        ]);

        session()->flash('info', 'Значение свойства обновлено');
        return redirect()->route('admin.catalog.attribute.values.index', compact('attributeId'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($attributeId, $valueId)
    {
        $attributeValue = AttributeValue::where('id', $valueId)->first();
        $attribute = Attribute::where('id', $attributeId)->first();

        $attributeValue->delete();

        session()->flash('info', 'Значение свойства удалено');
        return redirect()->route('admin.catalog.attribute.values.index', compact('attribute'));
    }
}
