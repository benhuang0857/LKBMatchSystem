@extends('layouts.backend')
@section('BackendContent')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    
    <!-- Main Content -->
    <div id="content">

        @include('backend.topbar')        
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="alert alert-primary" role="alert">
                尚未開通？請點這裡<a href="/admin/ticket/cart">告知後五碼並開通</a>或是請專員協助您開通。
            </div>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">控制台</h1>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- 狀態 Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">是否開通</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if ($user->ticket_id == 0 || !isset($ticket->checkin) || $ticket->checkin == '-1')
                                    <p>尚未開通</p>   
                                @else
                                    已開通
                                @endif
                            </div>
                            </div>
                            <div class="col-auto">
                            <i class="fa fa-check-circle-o fa-3x"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- 方案 Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">購買區域</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if (!isset($ticket->location))
                                <p>尚未設定</p>
                            @else
                                {{$ticket->location}}
                            @endif
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fa fa-map-marker fa-3x"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- 剩餘天數 Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">到期日</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if (!isset($ticket->expiry))
                                <p>尚未設定</p>   
                            @else
                                {{$ticket->expiry}}
                            @endif
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fa fa-hourglass fa-3x"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- 本月名單人數 Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">本月名單人數</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @if (empty($applications))
                            0 人
                        @else
                            {{count($applications)}}
                        @endif
                        
                        </div>
                    </div>
                        <div class="col-auto">
                        <i class="fa fa-universal-access fa-3x"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </div>


            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">基本資料</h1>
            </div>
            
            <form>
                <div class="form-group">
                    <label for="AdminInputEmail1">您的信箱</label>
                    <input type="email" class="form-control" id="AdminInputEmail1" aria-describedby="emailHelp" placeholder="{{Auth::user()->email}}" readonly>
                </div>
                <div class="form-group">
                    <label for="AdminInputPhone">連絡電話</label>
                    <input type="Phone" class="form-control" id="AdminInputPhone" placeholder="{{Auth::user()->phone}}" readonly>
                </div>
                <div class="form-group">
                    <label for="AdminInputPassword">您的密碼</label>
                    <input type="password" class="form-control" id="AdminInputPassword" placeholder="*****" readonly>
                </div>
                <a class="btn btn-primary" href="/admin/ur/info" role="button">修改個資</a>
            </form>

        </div>
        <!-- /.container-fluid -->
@endsection