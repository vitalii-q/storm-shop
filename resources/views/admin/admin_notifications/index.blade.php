@extends('admin.layouts.admin_hf')

@section('title', 'Уведомления')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Управление</strong></span>
                {{--<a class="breadcrumb-item" href="">Generic</a>--}}
                <span class="breadcrumb-item active">Уведомления</span>
            </nav>

            @if(session()->has('info')) <!-- если уведовление или ошибка -->
                <p class="alert alert-info">{{ session()->get('info') }}</p> <!-- выводим сообщение -->
            @endif

            <!-- Table -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Уведомления</h3>

                    {{--<div class="block-options">--}}
                        {{--<div class="block-options-item">--}}
                            {{--<code>.table</code>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="block-content">

                    <table class="table table-sm table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">id</th>
                            <th>Тип</th>
                            <th>Детали</th>
                            {{--<th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>--}}
                            <th class="text-center" style="width: 100px;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($notifications as $notification)
                            <tr>
                                <th class="text-center" scope="row">
                                    @if($notification->views < 1)<div class="admin_new-notification-id">@endif
                                    {{ $notification->id }}
                                    @if($notification->views < 1)</div>@endif
                                </th>

                                <td class="d-none d-sm-table-cell">
                                    @if($notification->type == 'Комментарий')
                                    <span class="badge badge-info">{{ $notification->type }}</span>
                                    @elseif($notification->type == 'Подписка')
                                    <span class="badge badge-warning">{{ $notification->type }}</span>
                                    @elseif($notification->type == 'Сообщение')
                                    <span class="badge badge-success">{{ $notification->type }}</span>
                                    @elseif($notification->type == 'Заказ')
                                        <span class="badge badge-danger">{{ $notification->type }}</span>
                                    @endif
                                </td>

                                <td>
                                    @if($notification->type == 'Комментарий')
                                        {{ mb_strimwidth($notification->comment->comment, 0, 90, '...') }}
                                    @elseif($notification->type == 'Подписка')
                                        {{ $notification->subscription->email }}
                                    @elseif($notification->type == 'Сообщение')
                                        {{ mb_strimwidth($notification->message->message, 0, 90, '...') }}
                                    @elseif($notification->type == 'Заказ')
                                        {{ $notification->order->phone.' / '.$notification->order->email }}
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="btn-group btn-group_table-custom-left">
                                        {{--<a href="{{ route('admin.blog.categories.show', $category->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Open">--}}
                                            {{--<i class="fa fa-folder-open"></i>--}}
                                        {{--</a>--}}

                                        <a href="{{ route('admin.notifications.edit', $notification->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-folder-open"></i>
                                        </a>

                                        @if($notification->type == 'Комментарий' or $notification->type == 'Сообщение')
                                        <form onclick="clickElem('submit{{$notification->id}}')" action="{{ route('admin.notifications.destroy', $notification->id) }}" method="post" class="btn btn-sm btn-secondary">
                                            @csrf
                                            @method('DELETE')

                                            <input id="submit{{$notification->id}}" type="submit" value="Delete" hidden>
                                            <label for="submit{{$notification->id}}" class="mb-0 cursor-p" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </label>
                                        </form>
                                        @endif
                                    </div>
                                </td>

                            </tr>

                            @if($notification->views < 1)
                                @php($notification->increment('views')) <!-- делаем как просмотренное -->
                            @endif
                        @endforeach

                        </tbody>
                    </table>

                    {{ $notifications->links('admin.layouts.admin_pagination') }}

                </div>
            </div>
            <!-- END Table -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection