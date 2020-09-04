@extends('layouts.backend')
@section('BackendContent')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('backend.topbar')
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <section class="edit-ticket">
            <div class="container">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">訂單設定</h1>
                </div>
                <div class="edit-ticket">
                    <form class="form-group" action="/admin/ticket/{{$ticket->id}}/update" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <strong>購買的區域：</strong><span class="calculator">{{$ticket->location}}</span>
                        </div>

                        <div class="form-group">
                            <strong>購買月數：</strong><span class="buy-month">{{$ticket->buy_month}} 個月</span>
                        </div>

                        <div class="form-group">
                            <strong>訂單金額：</strong><span class="total">{{$ticket->price}} 新台幣</span>
                        </div>

                        <div class="form-group">
                            <strong>販售人帳號：</strong><span class="buy-month">{{$user->email}}</span>
                        </div>

                        <div class="form-group">
                            <strong>匯款後五碼：</strong>
                            @if ($ticket->fivecode != '-1')
                            <span  class="fivecode">{{$ticket->fivecode}}</span>
                            @else
                            <span  class="fivecode">尚未填寫</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <strong>設定是否開通：</strong>
                            @if ($ticket->checkin != 0)
                            <span  class="checkin">已開通</span>
                            @else
                            <span  class="checkin">未開通</span>
                            @endif
                        </div>

                        @if (auth()->user()->role == 'super')
                        <div class="form-group">
                            <label for="Inputfivecode">匯款後五碼</label>
                            @if ($ticket->fivecode != '-1')
                            <input type="text" class="form-control" id="Inputfivecode" name="Inputfivecode" placeholder="請填匯款後五碼" value="{{$ticket->fivecode}}" required>
                            @else
                            <input type="text" class="form-control" id="Inputfivecode" name="Inputfivecode" placeholder="尚未填寫" required>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="InputOK">設定是否開通</label>
                                <select class="form-control" id="InputOK" name="InputOK" required>
                                    @if ($ticket->checkin == 0)
                                        <option selected="selected" value="0">不開通</option>
                                        <option  value="1">開通</option>
                                    @endif

                                    @if ($ticket->checkin == 1)
                                        <option value="0">不開通</option>
                                        <option selected="selected" value="1">開通</option>
                                    @endif
                                    
                                </select>
                        </div>

                        <button type="submit" class="btn btn-primary">立即通知</button>
                        @endif

                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection