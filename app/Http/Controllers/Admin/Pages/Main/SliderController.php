<?php

namespace App\Http\Controllers\Admin\Pages\Main;

use App\Models\MainSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = MainSlider::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.pages.main.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.main.slider.create');
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
            'text' => 'required',
            'image' => 'required',
        ]);
        // кладем файл в файловую систему
        if(isset($request['image'])) {
            Storage::disk('public')->put('files/pages/main/slider/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // создает новую запись в таблице blog_category
        MainSlider::create([
            'text' => $request->text,
            'text_en' => $request->text_en,
            'text_top' => $request->text_top,
            'text_top_en' => $request->text_top_en,
            'text_bottom' => $request->text_bottom,
            'text_bottom_en' => $request->text_bottom_en,

            'text_position' => $request->text_position,
            'button' => $request->button,
            'link' => $request->link,

            'image' => $request->image ? 'storage/files/pages/main/slider/'.$request->image->getClientOriginalName() : null,
        ]);

        session()->flash('info', 'Слайд добавлен');
        return redirect()->route('admin.pages.main.slider.index');
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
        $slide = MainSlider::where('id', $id)->first();
        return view('admin.pages.main.slider.edit', compact('slide'));
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
            'text' => 'required',
        ]);

        // элемент который обновляем
        $slide = MainSlider::where('id', $id)->first();

        // (если убрали или загрузили новое) удаляем старое изображение
        if($request->delete_image === 'yes' or isset($request->image)) {
            $imagePathExp = explode('/', $slide->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/pages/main/slider/'.$image);

            $slide->update([ // удаляем путь к файлу в бд или записываем новый путь к изображению
                'image' => $request->image ? 'storage/files/pages/main/slider/'.$request->image->getClientOriginalName() : null,
            ]);
        }

        // кладем файл в файловую систему
        if(isset($request->image)) {
            Storage::disk('public')->put('files/pages/main/slider/'.$request->image->getClientOriginalName(), file_get_contents($request->image));
        }

        // обновляем элемент
        $slide->update([
            'text' => $request->text,
            'text_en' => $request->text_en,
            'text_top' => $request->text_top,
            'text_top_en' => $request->text_top_en,
            'text_bottom' => $request->text_bottom,
            'text_bottom_en' => $request->text_bottom_en,

            'text_position' => $request->text_position,
            'button' => $request->button,
            'link' => $request->link,
        ]);

        session()->flash('info', 'Слайд обновлен');
        return redirect()->route('admin.pages.main.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = MainSlider::where('id', $id)->first();

        // удаляем изображение если есть
        if(isset($slide->image)) {
            $imagePathExp = explode('/', $slide->image);
            $image = end($imagePathExp); // получаем название изображения
            Storage::disk('public')->delete('files/pages/main/slider/'.$image);
        }

        // удаляем категорию
        $slide->delete();

        session()->flash('info', 'Слайд удален');
        return redirect()->route('admin.pages.main.slider.index');
    }
}
