@extends('admin.layouts.admin_hf')

@section('title', 'Панель администрации')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

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
                                    <td>{{ $order->first_name }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-info">Оформлен</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        {{--<tr>--}}
                            {{--<th class="text-center" scope="row">1</th>--}}
                            {{--<td>Andrea Gardner</td>--}}
                            {{--<td class="d-none d-sm-table-cell">--}}
                                {{--<span class="badge badge-success">VIP</span>--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">--}}
                                        {{--<i class="fa fa-pencil"></i>--}}
                                    {{--</button>--}}
                                    {{--<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">--}}
                                        {{--<i class="fa fa-times"></i>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<th class="text-center" scope="row">3</th>--}}
                            {{--<td>Thomas Riley</td>--}}
                            {{--<td class="d-none d-sm-table-cell">--}}
                                {{--<span class="badge badge-warning">Trial</span>--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">--}}
                                        {{--<i class="fa fa-pencil"></i>--}}
                                    {{--</button>--}}
                                    {{--<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">--}}
                                        {{--<i class="fa fa-times"></i>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<th class="text-center" scope="row">8</th>--}}
                            {{--<td>Helen Jacobs</td>--}}
                            {{--<td class="d-none d-sm-table-cell">--}}
                                {{--<span class="badge badge-danger">Disabled</span>--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">--}}
                                        {{--<i class="fa fa-pencil"></i>--}}
                                    {{--</button>--}}
                                    {{--<button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">--}}
                                        {{--<i class="fa fa-times"></i>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
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