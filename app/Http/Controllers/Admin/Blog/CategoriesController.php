<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\BlogCategory;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.blog.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.categories.create');
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
            'code' => 'required|unique:blog_categories',
        ]);

        // кладем файл в файловую систему
        if(isset($request['image'])) {
            Storage::disk('public')->put('files/blog/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // создает новую запись в таблице blog_category
        BlogCategory::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'code' => $request->code,

            'image' => $request->image ? 'storage/files/blog/'.$request->image->getClientOriginalName() : null,
        ]);

        session()->flash('info', 'Категория добавлена');
        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BlogCategory::where('id', $id)->first();
        return view('admin.blog.categories.edit', compact('category'));
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
            'code' => 'required|unique:blog_categories,id,'.$request->id,
        ]);

        // элемент который обновляем
        $category = BlogCategory::where('id', $id)->first();

        // (если убрали или загрузили новое) удаляем старое изображение
        if($request->delete_image === 'yes' or isset($request->image)) {
            $imagePathExp = explode('/', $category->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/blog/category/'.$image);

            $category->update([ // удаляем путь к файлу в бд или записываем новый путь к изображению
                'image' => $request->image ? 'storage/files/blog/category/'.$request->image->getClientOriginalName() : null,
            ]);
        }

        // кладем файл в файловую систему
        if(isset($request->image)) {
            Storage::disk('public')->put('files/blog/category/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // обновляем элемент в таблице blog_category
        $category->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'code' => $request->code,
        ]);

        session()->flash('info', 'Категория обновлена');
        return redirect()->route('admin.blog.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = BlogCategory::where('id', $id)->first();

        // удаляем изображение если есть
        if(isset($category->image)) {
            $imagePathExp = explode('/', $category->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/blog/category/'.$image);
        }

        // удаляем категорию
        $category->delete();

        session()->flash('info', 'Категория удалена');
        return redirect()->route('admin.blog.categories.index');
    }
}
