@extends('admin.layouts.admin_hf')

@section('title', 'Панель администрации')

@section('css')
    <link rel="stylesheet" href="{{  URL::asset('js/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{  URL::asset('js/plugins/simplemde/simplemde.min.css') }}">
@endsection

@section('js')
    <script src="{{  URL::asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/simplemde/simplemde.min.js') }}"></script>
    <script>jQuery(function(){ Codebase.helpers(['summernote', 'ckeditor', 'simplemde']); });</script>
@endsection

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Блог</strong></span>
                <a class="breadcrumb-item" href="{{ route('admin.blog.articles.index') }}">Статьи</a>
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
                            <form action="{{ route('admin.blog.articles.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden>

                                        <label for="title">Заголовок</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок..">
                                        </div>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="title_en">Title</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="title_en" name="title_en" placeholder="Title..">
                                        </div>
                                        @error('title_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group row">
                                            <label class="col-12" for="category_id">Категория</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="category_id" name="category_id">
                                                    <option value="">Выбирите категорию</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group row">
                                            <label class="col-12" for="example-multiple-select">Теги</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="tags" name="tags[]" size="5" multiple="">
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('tags')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="preview_text">Превью</label>
                                        <div class="mb-16">
                                            <textarea class="form-control" id="preview_text" name="preview_text" rows="6" placeholder="Описание.."></textarea>
                                        </div>
                                        @error('preview_text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="preview_text_en">Prewiew</label>
                                        <div>
                                            <textarea class="form-control" id="preview_text_en" name="preview_text_en" rows="6" placeholder="Description.."></textarea>
                                        </div>
                                        @error('preview_text_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="code">Код категории</label>
                                        <div class="mb-16">
                                            <input type="code" class="form-control" id="code" name="code" placeholder="Code..">
                                        </div>
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Изображение</label>
                                        <div class="custom-file mb-43">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <input onchange="adminShowImage(this)" type="file" class="custom-file-input js-custom-file-input-enabled" id="image_show_input" name="image" data-toggle="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" for="image_show_input">Выбирите изображение</label>
                                        </div>
                                        @error('image_show_input')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

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
                                    </div>
                                </div>

                                <!-- Summernote (.js-summernote + .js-summernote-air classes are initialized in Helpers.summernote()) -->
                                <!-- For more info and examples you can check out http://summernote.org/ -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Статья</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option">
                                                <i class="si si-wrench"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <label for="text" hidden></label>
                                    <textarea id="text" name="text"></textarea>
                                </div>
                                @error('text')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <!-- END Summernote -->

                                <!-- Summernote (.js-summernote + .js-summernote-air classes are initialized in Helpers.summernote()) -->
                                <!-- For more info and examples you can check out http://summernote.org/ -->
                                <div class="block">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Статья En</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option">
                                                <i class="si si-wrench"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <label for="text_en" hidden></label>
                                    <textarea id="text_en" name="text_en"></textarea>
                                </div>
                                @error('text_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <!-- END Summernote -->

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