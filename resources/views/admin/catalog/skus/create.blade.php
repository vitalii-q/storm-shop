@extends('admin.layouts.admin_hf')

@section('title', 'Создание торгового предложения')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Каталог</strong></span>
                <a class="breadcrumb-item" href="{{ route('admin.catalog.products.index') }}">Продукция</a>
                <a class="breadcrumb-item" href="{{ route('admin.catalog.skus.index', $product->id) }}">Торговые предложения - {{ $product->name }}</a>
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
                            <h3 class="block-title">Создание торгового предложения</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-content">
                            <form action="{{ route('admin.catalog.skus.store', $product) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="price">Цена</label>
                                        <div class="mb-16">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Цена..">
                                        </div>
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="price">Количество</label>
                                        <div class="mb-16">
                                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Количество..">
                                        </div>
                                        @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        @foreach($product->attributes as $attribute)
                                            <div class="form-group row">
                                                <label class="col-12" for="attribute_{{ $attribute->id }}">{{ $attribute->name }}</label>
                                                <div class="col-md-12">
                                                    <select class="form-control" id="attribute_{{ $attribute->id }}" name="attribute_id[{{ $attribute->id }}]">
                                                        <option value="">Выбирите {{ mb_strtolower($attribute->name) }}</option>

                                                        @foreach($attribute->attributeValues as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @error('attribute_{{ $attribute->id }}')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        @endforeach
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