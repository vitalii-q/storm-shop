@extends('admin.layouts.admin_hf')

@section('title', 'Заказ: '.$order->id)

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <a class="breadcrumb-item" href="{{ route('admin.orders.index') }}">Заказы</a>
                <span class="breadcrumb-item active">Заказ: {{ $order->id }}</span>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Заказ: {{ $order->id }}</h3>
                            {{--<div class="block-options">--}}
                                {{--<button type="button" class="btn-block-option">--}}
                                    {{--<i class="si si-wrench"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        </div>

                        <div class="block-content">
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="block-content">
                                        <div class="form-group row mt--20">
                                            <label class="col-12" for="example-select">Статус заказа</label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1" @if($order->status == 1) selected @endif>Оформлен</option>
                                                    <option value="2" @if($order->status == 2) selected @endif>Упаковывается</option>
                                                    <option value="3" @if($order->status == 3) selected @endif>Завершен</option>
                                                    <option value="4" @if($order->status == 4) selected @endif>Отменен</option>
                                                </select>
                                            </div>
                                        </div>

                                        <table class="table table-striped table-borderless">
                                            <tbody>
                                            <tr>
                                                <td class="font-w600">Заказчик</td>
                                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                            </tr>

                                            <tr>
                                                <td class="font-w600">Номер телефона</td>
                                                <td>{{ $order->phone }}</td>
                                            </tr>

                                            <tr>
                                                <td class="font-w600">Сумма покупки</td>
                                                <td>{{ $order->sum.App\Services\CurrencyConversion::getCurrencySymbol($order->currency_id) }}</td>
                                            </tr>

                                            <tr>
                                                <td class="font-w600">Дата покупки</td>
                                                <td>{{ Date::parse($order->created_at)->format('j F Y') }}</td>
                                            </tr>

                                            <tr>
                                                <td class="font-w600">Время покупки</td>
                                                <td>{{ Date::parse($order->created_at)->format('H:i') }}</td>
                                            </tr>

                                            @if($order->message)
                                                <tr>
                                                    <td class="font-w600">Комментарий</td>
                                                    <td>{{ $order->message }}</td>
                                                </tr>
                                            </tbody>
                                            @endif
                                        </table>

                                        <div class="block-content_skus block-content_skus-custom">

                                            @foreach($skus as $sku)
                                                <div class="block-content_sku flex-container">
                                                    <table class="table table-striped table-borderless mt-20 col-md-8">

                                                        <tbody>
                                                        <tr>
                                                            <td class="font-w600">Название товара</td>
                                                            <td>{{ $sku->product->name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="font-w600">Детали товара</td>
                                                            <td>{{ $order->getOptions($sku->id) }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="font-w600">Количество</td>
                                                            <td>{{ $sku->quantity($order->id) }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="font-w600">Стоимость</td>
                                                            <td>{{ App\Services\CurrencyConversion::getCurrencyById($sku->product->price, $order->currency_id).App\Services\CurrencyConversion::getCurrencySymbol($order->currency_id) }}</td>
                                                        </tr>
                                                        </tbody>

                                                    </table>

                                                    <div class="col-md-4 mt-20 animated fadeIn">
                                                        <div class="options-container">
                                                            <img class="img-fluid options-item order-sku_img-custom" src="{{ URL::asset($sku->product->image_1) }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
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