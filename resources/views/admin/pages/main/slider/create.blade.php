@extends('admin.layouts.admin_hf')

@section('title', 'Панель администрации')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Страницы</strong></span>
                <span class="breadcrumb-item active">Главная</span>
                <a class="breadcrumb-item" href="{{ route('admin.pages.main.slider.index') }}">Слайд</a>
                <span class="breadcrumb-item active">Создание</span>
            </nav>

            @if(session()->has('info')) <!-- если уведовление или ошибка -->
                <p class="alert alert-info">{{ session()->get('info') }}</p> <!-- выводим сообщение -->
            @endif

            <div class="row">
                <div class="col-md-12">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Создание статьи</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-content">
                            <form action="{{ route('admin.pages.main.slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>

                                        <label for="text_top">Текст сверху</label>
                                        <div class="mb-16">
                                            <textarea class="form-control" id="text_top" name="text_top" rows="6" placeholder="Текст сверху.."></textarea>
                                        </div>
                                        @error('text_top')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="preview_text_en">Text top</label>
                                        <div class="mb-16">
                                            <textarea class="form-control" id="text_top_en" name="text_top_en" rows="6" placeholder="Text top.."></textarea>
                                        </div>
                                        @error('text_top_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="text_top">Текст снизу</label>
                                        <div class="mb-16">
                                            <textarea class="form-control" id="text_bottom" name="text_bottom" rows="6" placeholder="Текст снизу.."></textarea>
                                        </div>
                                        @error('text_bottom')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="preview_text_en">Text bottom</label>
                                        <div>
                                            <textarea class="form-control" id="text_bottom_en" name="text_bottom_en" rows="6" placeholder="Text bottom.."></textarea>
                                        </div>
                                        @error('text_bottom_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="title">Заголовок</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="text" name="text" placeholder="Заголовок..">
                                        </div>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="title_en">Title</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="text_en" name="text_en" placeholder="Title..">
                                        </div>
                                        @error('text_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="example-select">Местоположение текста</label>
                                        <div class="mb-16">
                                            <select class="form-control" id="text_position" name="text_position">
                                                <option value="text-left">Текст слева</option>
                                                <option value="text-center">Текст по центру</option>
                                                <option value="text-right">Текст вправа</option>
                                            </select>
                                        </div>
                                        @error('text_position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Кнопка подробнее</label>
                                        <div class="mb-16">
                                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                                <input class="custom-control-input" type="radio" name="button" id="example-inline-radio1" value="1" checked="">
                                                <label class="custom-control-label" for="example-inline-radio1">Да</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                                <input class="custom-control-input" type="radio" name="button" id="example-inline-radio2" value="0">
                                                <label class="custom-control-label" for="example-inline-radio2">Нет</label>
                                            </div>
                                        </div>

                                        <label for="title">Ссылка</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="link" name="link" placeholder="Cсылка..">
                                        </div>
                                        @error('link')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Изображение</label>
                                        <div class="custom-file mb-43">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <input onchange="adminShowImage(this)" type="file" class="custom-file-input js-custom-file-input-enabled" id="image_show_input" name="image" data-toggle="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" for="image_show_input">Выбирите изображение</label>
                                        </div>

                                        <div class="col-md-12 animated fadeIn">
                                            <div class="options-container">
                                                <img id="imgShowElement" class="img-fluid options-item" src="{{ URL::asset('media/photos/photo1.jpg') }}" alt="">
                                                <div class="options-overlay bg-black-op-75">
                                                    <div class="options-overlay-content">
                                                        <h3 class="h4 text-white mb-5">Изображение</h3>
                                                        {{--<h4 class="h6 text-white-op mb-15">More Details</h4>--}}
                                                        <a onclick="adminEditImg()" class="btn btn-sm btn-rounded btn-alt-primary min-width-75">
                                                            <i class="fa fa-pencil"></i> Редактировать
                                                        </a>
                                                        <a onclick="adminDeleteImg()" class="btn btn-sm btn-rounded btn-alt-danger min-width-75">
                                                            <i class="fa fa-times"></i> Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 col-xl-4">
                                        <button type="submit" class="btn btn-primary min-width-125">Сохранить</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- END Default Elements -->
                </div>
            </div>


        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection