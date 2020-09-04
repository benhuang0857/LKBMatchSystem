@extends('layouts.backend')
@section('BackendContent')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        @include('backend.topbar')
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">目前販售清單</h1>
        <table class="table rwdtable shadow mb-4">
            <thead>
                <tr>
                    <th class="col">編號</th>
                    <th class="col">購買帳號</th>
                    <th class="col">地區</th>
                    <th class="col">購買月數</th>
                    <th class="col">總金額</th>
                    <th class="col">建立時間</th>
                    <th class="col">過期時間</th>
                    <th class="col">後五碼</th>
                    <th class="col">目前狀態</th>
                    <th class="col">是否開通</th>
                    @if (auth()->user()->role == 'super')
                    <th class="col">編輯</th>
                    @endif
                    @if (auth()->user()->role == 'super' || auth()->user()->manager)
                    <th class="col">操作</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                @if (count($tickets) == 0 )
                    <td data-label="狀態：" class="col">尚未販售</td>                    
                @else
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td data-label="編號：" class="col">{{$i++}}</td> 
                        <td data-label="購買帳號：" class="col">
                        @if(!isset($user->where('id',$ticket->uid)->first()->email))
                            無
                        @else
                        {{$user->where('id',$ticket->uid)->first()->email}}
                        @endif
                        </td>
                        <td data-label="地區：" class="col">{{$ticket->location}}</td> 
                        <td data-label="購買月數：" class="col">{{$ticket->buy_month}}</td>
                        <td data-label="總金額：" class="col">{{$ticket->price}}</td>
                        <td data-label="建立時間：" class="col">{{$ticket->created_at}}</td>
                        <td data-label="過期時間：" class="col">{{$ticket->expiry}}</td>
                        <td data-label="後五碼" class="col">
                            @if ($ticket->fivecode == '-1')
                                尚未填入
                            @else
                                {{$ticket->fivecode}}
                            @endif                       
                        </td>
                        <td data-label="目前狀態" class="col">
                            @if ( !isset($user->where('id',$ticket->uid)->first()->ticket_id) || $user->where('id',$ticket->uid)->first()->ticket_id == 0 || $user->where('id',$ticket->uid)->first()->ticket_id != $ticket->id)
                                此商品目前無人所有
                            @else
                                使用中
                            @endif
                        </td>
                        <td data-label="是否開通" class="col">
                            @if ($ticket->checkin == '1')
                                已開通
                            @else
                                尚未開通
                            @endif
                        </td>
                        @if (auth()->user()->role == 'super')
                        <td data-label="編輯" class="col"><a href="/admin/ticket/{{$ticket->id}}/edit">點擊設定</a></td>
                        @endif

                        @if (auth()->user()->role == 'super' || auth()->user()->manager)
                        <td data-label="操作：" class="col">
                            <form action="/admin/ticket/{{$ticket->id}}/delete" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">刪除</button>
                            </form>
                        </td>
                        @endif 
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    <!--My table end-->

</div>
<!-- /.container-fluid -->
@endsection