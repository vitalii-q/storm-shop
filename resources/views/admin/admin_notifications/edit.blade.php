@extends('admin.layouts.admin_hf')

@section('title', $notification->type.': '.$notification->id)

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                {{--<span class="breadcrumb-item active"><strong></strong></span>--}}
                <a class="breadcrumb-item" href="{{ route('admin.notifications.index') }}">Уведомления</a>
                <span class="breadcrumb-item active">{{ 'Уведомление: '.$notification->id }}</span>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title block-title_order-custom">Уведомление: {{ $notification->id }}</h3>

                            @if($notification->type == 'Комментарий' or $notification->type == 'Сообщение')
                            <form onclick="clickElem('submit{{$notification->id}}')" action="{{ route('admin.notifications.destroy', $notification->id) }}" method="post" class="btn btn-sm btn-primary">
                                @csrf
                                @method('DELETE')

                                <input id="submit{{$notification->id}}" type="submit" value="Delete" hidden>
                                <label for="submit{{$notification->id}}" class="mb-0 cursor-p" data-toggle="tooltip" title="Delete">Удалить</label>
                            </form>
                            @endif
                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-borderless mt-20">
                                <tbody>

                                @if($notification->type == 'Комментарий')
                                    <tr>
                                        <td style="width: 120px" class="font-w600">Тип:</td>
                                        <td>
                                            <span class="badge badge-info">Комментарий</span>
                                            {{--<span class="badge badge-success">{{ __('personal.status.completed') }}</span>--}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 120px" class="font-w600">Детально</td>
                                        <td>{{ $notification->comment->comment }}</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 120px" class="font-w600">Ссылка</td>
                                        <td><a href="{{ route('article', $notification->comment->article->code) }}" target="_blank">{{ $notification->comment->article->title }}</a></td>
                                    </tr>
                                @elseif($notification->type == 'Подписка')
                                    <tr>
                                        <td style="width: 120px" class="font-w600">Тип:</td>
                                        <td>
                                            <span class="badge badge-warning">Подписка</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 120px" class="font-w600">Email</td>
                                        <td>{{ $notification->subscription->email }}</td>
                                    </tr>
                                @elseif($notification->type == 'Сообщение')
                                    <tr>
                                        <td style="width: 120px" class="font-w600">Тип:</td>
                                        <td>
                                            <span class="badge badge-success">Сообщение</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Имя</td>
                                        <td>{{ $notification->message->name }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Email</td>
                                        <td>{{ $notification->message->email }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Сообщение</td>
                                        <td>{{ $notification->message->message }}</td>
                                    </tr>

                                    @if($notification->message->file != null)
                                        <tr>
                                            <td class="font-w600">Файл</td>
                                            @php($fileArray = explode('/', $notification->message->file))
                                            <td><a href="{{ URL::asset($notification->message->file) }}" download="">{{ end($fileArray) }}</a></td>
                                        </tr>
                                    @endif
                                @elseif($notification->type == 'Заказ')
                                    <tr>
                                        <td class="font-w600">Тип:</td>
                                        <td><span class="badge badge-danger">Заказ</span></td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">ID заказа</td>
                                        <td>{{ $notification->order->id }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Заказчик</td>
                                        <td>{{ $notification->order->first_name }} {{ $notification->order->last_name }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Номер телефона</td>
                                        <td>{{ $notification->order->phone }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Сумма покупки</td>
                                        <td>{{ $notification->order->sum.App\Services\CurrencyConversion::getCurrencySymbol($notification->order->currency_id) }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Дата покупки</td>
                                        <td>{{ Date::parse($notification->order->created_at)->format('j F Y') }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Время покупки</td>
                                        <td>{{ Date::parse($notification->order->created_at)->format('H:i') }}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-w600">Статус</td>
                                        <td>
                                            @if($notification->order->status == 1)
                                                <span class="badge badge-info">{{ __('personal.status.formalized') }}</span>
                                            @elseif($notification->order->status == 2)
                                                <span class="badge badge-warning">{{ __('personal.status.pack') }}</span>
                                            @elseif($notification->order->status == 3)
                                                <span class="badge badge-success">{{ __('personal.status.completed') }}</span>
                                            @elseif($notification->order->status == 4)
                                                <span class="badge badge-danger">{{ __('personal.status.canceled') }}</span>
                                            @endif
                                        </td>
                                    </tr>

                                    @if($notification->order->message)
                                    <tr>
                                        <td class="font-w600">Комментарий</td>
                                        <td>{{ $notification->order->message }}</td>
                                    </tr>
                                    @endif
                                @endif
                                </tbody>
                            </table>

                            @if($notification->type == 'Заказ')
                                <div class="block-content_skus block-content_skus-custom">

                                    @foreach($notification->order->skus as $sku)
                                        <div class="block-content_sku flex-container">
                                            <table class="table table-striped table-borderless mt-20 col-md-8">

                                                <tbody>
                                                <tr>
                                                    <td class="font-w600">Название товара</td>
                                                    <td>{{ $sku->product->name }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="font-w600">Детали товара</td>
                                                    <td>{{ $notification->order->getOptions($sku->id) }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="font-w600">Количество</td>
                                                    <td>{{ $sku->quantity($notification->order->id) }}</td>
                                                </tr>

                                                <tr>
                                                    <td class="font-w600">Стоимость</td>
                                                    <td>{{ App\Services\CurrencyConversion::getCurrencyById($sku->product->price, $notification->order->currency_id).App\Services\CurrencyConversion::getCurrencySymbol($notification->order->currency_id) }}</td>
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
                            @endif

                            {{--<div class="block-content_skus block-content_skus-custom">--}}

                                {{--<div class="block-content_sku flex-container">--}}
                                    {{--<table class="table table-striped table-borderless mt-20 col-md-8">--}}

                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td class="font-w600">Название товара</td>--}}
                                            {{--<td></td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}

                                    {{--</table>--}}

                                    {{--<div class="col-md-4 mt-20 animated fadeIn">--}}
                                        {{--<div class="options-container">--}}
                                            {{--<img class="img-fluid options-item order-sku_img-custom" src="" alt="">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
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