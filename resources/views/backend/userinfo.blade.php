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
            <h1 class="h3 mb-0 text-gray-800">修改基本資料</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">基本資料</h1>
        </div>
        <form action="{{url('/admin/ur/info/change')}}" method="POST">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="AdminInputEmail1">您的信箱</label>
            <input type="email" class="form-control" id="AdminInputEmail1" name="email" aria-describedby="emailHelp" placeholder="{{$email}}" required>
        </div>
        <div class="form-group">
            <label for="AdminInputPhone">連絡電話</label>
            <input type="Phone" class="form-control" id="AdminInputPhone" name="phone" placeholder="{{$phone}}" required>
        </div>
        <div class="form-group">
            <label for="AdminInputPassword">您的密碼</label>
            <input type="password" class="form-control" id="AdminInputPassword" name="password" placeholder="請填入您的新密碼" required>
        </div>
        <button type="submit" class="btn btn-primary">確定修改</button>
        <a class="btn btn-primary" href="/admin" role="button">返回上一步</a>
        </form>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    
</div>
@endsection