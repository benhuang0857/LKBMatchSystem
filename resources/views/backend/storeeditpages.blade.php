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
            <h1 class="h3 mb-0 text-gray-800">編輯公司介紹頁面</h1>
        </div>

        <div class="main">
            <!-- Sign up form -->
            <section class="create-page">
                <div class="container">
                    <div class="create-page">
                        <form action="/admin/storepage/{{$page->id}}/update" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="InputTitle">店名</label>
                                <input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="請填寫標題" value="{{$page->title}}" required>
                            </div>
                            <div id="service" class="form-group">
                                <label for="service" class="col-md-4 control-label">選擇服務項目</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="1">
                                        <label class="form-check-label" for="代書貸款">代書貸款</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="2">
                                        <label class="form-check-label" for="小額借貸">小額借貸</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="3">
                                        <label class="form-check-label" for="支票貼現">支票貼現</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="4">
                                        <label class="form-check-label" for="汽機車貸款">汽機車貸款</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="5">
                                        <label class="form-check-label" for="二胎房貸">二胎房貸</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="service[]" value="6">
                                        <label class="form-check-label" for="銀行代辦">銀行代辦</label>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputBody">商店介紹</label>
                                <textarea type="body" id="article-ckeditor" class="form-control" name="InputBody" required rows="15">{{$page->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="cover_image">上傳頁面大圖</label>
                                <input type="file" name="cover_image" id="cover_image">
                                <img src="/storage/cover_image/{{$page->cover_image}}" id="cover_image-tag" width="200px" />
                            </div>
                            <div class="form-group">
                                <label for="logo_image">上傳LOGO或店照</label>
                                <input type="file" name="logo_image" id="logo_image">
                                <img src="/storage/logo_image/{{$page->logo_image}}" id="logo_image-tag" width="200px" />
                            </div>
                            <button type="submit" class="btn btn-primary">編輯</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#logo_image-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo_image").change(function(){
            readURL(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#cover_image-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cover_image").change(function(){
            readURL2(this);
        });
    </script>
@endsection