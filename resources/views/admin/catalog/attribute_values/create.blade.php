@extends('admin.layouts.admin_hf')

@section('title', 'Создание свойста')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Каталог</strong></span>
                <a class="breadcrumb-item" href="{{ route('admin.catalog.attribute.values.index', $attribute->id) }}">Свойства</a>
                <span class="breadcrumb-item active">Создание значения</span>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Создание значения</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-content">
                            <form action="{{ route('admin.catalog.attribute.values.store', $attribute->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="number" value="{{ $attribute->id }}" class="form-control" id="attribute_id" name="attribute_id" hidden>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Название</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Название..">
                                        </div>
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group col-md-6">
                                        <label for="value">Значение</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="value" name="value" placeholder="Значение..">
                                        </div>
                                    </div>
                                    @error('value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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