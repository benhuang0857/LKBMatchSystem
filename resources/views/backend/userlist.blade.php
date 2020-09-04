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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">您所建立的使用者</h1>
        </div>
        <table class="table rwdtable shadow mb-4">
            <thead>
                <tr>
                    <th class="col">編號</th>
                    <th class="col">身分</th>
                    <th class="col">Email</th>
                    <th class="col">購買的服務</th>
                    <th class="col">電話</th>
                    <th class="col">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                @foreach ($users as $user)
                <tr>
                    @if (auth()->user()->id != $user->id)
                        <td data-label="編號：" class="col">{{$i++}}</td>
                        <td data-label="身分：" class="col">
                            @if ($user->role == 'super')
                                最高權限使用者
                            @elseif ($user->role == 'manager')
                                系統管理者
                            @else
                                VIP用戶
                            @endif
                        </td>
                        <td data-label="Email：" class="col">{{$user->email}}</td>
                        @if (empty($user->ticket_id))
                        <td data-label="購買的服務：" class="col">尚未購買</td> 
                        @else
                        <td data-label="購買的服務：" class="col"><a href="/admin/ticket/{{$user->ticket_id}}/edit">點擊查看</a></td> 
                        @endif
                        <td data-label="電話：" class="col">{{$user->phone}}</td> 
                        <td data-label="操作：" class="col">
                            <a class="btn btn-primary mr-2" href="/admin/user/{{$user->id}}/show">購買服務</a>
                            <form action="/admin/user/{{$user->id}}/delete" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">刪除用戶</button>
                            </form>
                        </td> 
                    @endif                    
                </tr>
                @endforeach   
            </tbody>
        </table>
    <a class="btn btn-primary" href="/register" role="button">建立新使用者</a>
    </div>

@endsection