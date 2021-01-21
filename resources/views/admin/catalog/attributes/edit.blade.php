@extends('admin.layouts.admin_hf')

@section('title', $attribute->name)

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Каталог</strong></span>
                <a class="breadcrumb-item" href="{{ route('admin.catalog.attributes.index') }}">Свойства</a>
                <span class="breadcrumb-item active">{{ $attribute->name }}</span>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Редактирование свойства - {{ $attribute->name }}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-content">
                            <form action="{{ route('admin.catalog.attributes.update', $attribute->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Название</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="name" name="name" value="@isset($attribute->name){{ $attribute->name }}@endisset" placeholder="Заголовок..">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Настройки свойства</label>
                                        <div class="">
                                            <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                                <input class="custom-control-input" type="checkbox" name="is_filterable" id="is_filterable" value="1" @if($attribute->is_filterable == 1)checked=""@endif>
                                                <label class="custom-control-label" for="is_filterable">Фильтруемое</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                                <input class="custom-control-input" type="checkbox" name="is_required" id="is_required" value="1" @if($attribute->is_required == 1)checked=""@endif>
                                                <label class="custom-control-label" for="is_required">Обязательное</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name_en">Name</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="@isset($attribute->name_en){{ $attribute->name_en }}@endisset" placeholder="Title..">
                                        </div>
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="code">Код свойства</label>
                                        <div class="mb-16">
                                            <input type="code" class="form-control" id="code" name="code" value="@isset($attribute->code){{ $attribute->code }}@endisset" placeholder="Code..">
                                        </div>
                                        @error('code')
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