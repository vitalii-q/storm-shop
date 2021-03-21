@extends('admin.layouts.admin_hf')

@section('title', 'Статистика')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <!-- Small Table -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Лидеры продаж</h3>
{{--                    <div class="block-options">--}}
{{--                        <div class="block-options-item">--}}
{{--                            <code>.table-sm</code>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="block-content">
                    <table class="table table-sm table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">Позиция</th>
                            <th class="text-center" style="width: 50px;">id</th>
                            <th style="text-align: center">Название</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Продаж</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Остаток</th>
                            <th class="text-center" style="width: 100px;">Ссылка</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php($i=1) @foreach($bestsellers as $bestseller)
                            <tr>
                                <th class="text-center" scope="row">{{ $i++ }}</th>
                                <td style="text-align: center">{{ $bestseller->id }}</td>
                                <th class="text-center" scope="row">{{ $bestseller->name }}</th>
                                <td>{{ $bestseller->count }}</td>
                                <td class="d-none d-sm-table-cell">{{ \App\Models\Product::getProductStockBalance($bestseller->id) }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ '/catalog/' . \App\Models\Product::getCategoryCodeByProductId($bestseller->id) . '/' . $bestseller->code }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Link" target="_blank">
                                            <i class="fa fa-mail-forward"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Small Table -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
