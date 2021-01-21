@extends('admin.layouts.admin_hf')

@section('title', 'Торговые предложения - '.$product->name)

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Каталог</strong></span>
                <a class="breadcrumb-item" href="{{ route('admin.catalog.products.index') }}">Продукция</a>
                <span class="breadcrumb-item active">Торговые предложения - {{ $product->name }}</span>
            </nav>

            @if(session()->has('info')) <!-- если уведовление или ошибка -->
                <p class="alert alert-info">{{ session()->get('info') }}</p> <!-- выводим сообщение -->
            @endif

            <!-- Table -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Торговые предложения</h3>

                    {{--<div class="block-options">--}}
                        {{--<div class="block-options-item">--}}
                            {{--<code>.table</code>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <a href="{{ route('admin.catalog.skus.create', $product->id) }}" type="button" class="btn btn-sm btn-primary">Добавить</a>
                </div>
                <div class="block-content">

                    <table class="table table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">Id</th>
                            <th>Название</th>
                            {{--<th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>--}}
                            <th class="text-center" style="width: 100px;">Действия</th>
                        </tr>
                        </thead>

                        <tbody>

                            @foreach($skus as $sku)
                                <tr>
                                    <th class="text-center" scope="row">{{ $sku->id }}</th>
                                    <td>
                                        @php($i=0) @foreach($sku->skuValues as $value)
                                            @if($i>0) - @endif {{ $value->attributeValue->name }}
                                        @php($i++) @endforeach
                                    </td>
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="badge badge-warning">Trial</span>--}}
                                    {{--</td>--}}
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.catalog.skus.edit', [$product->id, $sku->id]) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <form onclick="clickElem('submit{{$sku->id}}')" action="{{ route('admin.catalog.skus.destroy', [$product->id, $sku->id]) }}" method="post" class="btn btn-sm btn-secondary">
                                                @csrf
                                                @method('DELETE')

                                                <input id="submit{{$sku->id}}" type="submit" value="Delete" hidden>
                                                <label for="submit{{$sku->id}}" class="mb-0 cursor-p" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </label>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $skus->links('admin.layouts.admin_pagination') }}

                </div>
            </div>
            <!-- END Table -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection