@extends('admin.layouts.admin_hf')

@section('title', 'Заказы')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Управление</strong></span>
                {{--<a class="breadcrumb-item" href="">Generic</a>--}}
                <span class="breadcrumb-item active">Заказы</span>
            </nav>

            <!-- Small Table -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Заказы</h3>
                    {{--<div class="block-options">--}}
                        {{--<div class="block-options-item">--}}
                            {{--<code>.table-sm</code>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="block-content">
                    <table class="table table-sm table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">id</th>
                            <th>Заказчик</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Статус</th>
                            <th class="text-center" style="width: 100px;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <th class="text-center" scope="row">{{ $order->id }}</th>
                                    <td>{{ $order->first_name.' / '.$order->phone }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        @if($order->status == 1)
                                            <span class="badge badge-info">Оформлен</span>
                                        @elseif($order->status == 2)
                                            <span class="badge badge-warning">Упаковывается</span>
                                        @elseif($order->status == 3)
                                            <span class="badge badge-success">Завершен</span>
                                        @elseif($order->status == 4)
                                            <span class="badge badge-danger">Отменен</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.orders.edit', $order->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View">
                                                <i class="fa fa-folder-open"></i>
                                            </a>

                                            <form onclick="clickElem('submit{{$order->id}}')" action="{{ route('admin.orders.destroy', $order->id) }}" method="post" class="btn btn-sm btn-secondary">
                                                @csrf
                                                @method('DELETE')

                                                <input id="submit{{$order->id}}" type="submit" value="Delete" hidden>
                                                <label for="submit{{$order->id}}" class="mb-0 cursor-p" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </label>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $orders->links('admin.layouts.admin_pagination') }}

                </div>
            </div>
            <!-- END Small Table -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection