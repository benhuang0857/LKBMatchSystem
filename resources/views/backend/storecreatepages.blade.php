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
            <h1 class="h3 mb-0 text-gray-800">創建公司介紹頁面</h1>
        </div>

        <div class="main">
            <!-- Sign up form -->
            <section class="create-page">
                <div class="container">
                    <div class="create-page">
                        <form action="/admin/storepage/create/submit" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="InputTitle">店名</label>
                                <input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="請填寫標題" required>
                            </div>
                            <div class="form-group">
                                <label for="InputURL">URL</label>
                                <input type="text" class="form-control" id="InputURL" name="InputURL" placeholder="填寫URL" required>
                                <section>
                                    <p style="color:red">請勿填入特殊字元，例如：\/" '.之類的字元，若無法建立成功代表您的URL與其他人的相同，更換即可創建成功</p>
                                </section>
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
                                <label for="InputEmail">商店EMAIL</label>
                                <input type="text" class="form-control" id="InputEmail" name="InputEmail" placeholder="請填寫EMAIL" required>
                            </div>

                            <div class="form-group">
                                <label for="InputEmail">商店手機</label>
                                <input type="text" class="form-control" id="InputPhone" name="InputPhone" placeholder="請填寫顯示的手機" required>
                            </div>

                            <div class="form-group">
                                <label for="InputLocation">商店地址</label>
                                <input type="text" class="form-control" id="InputLocation" name="InputLocation" placeholder="請填寫要顯示的地址" required>
                            </div>

                            <div class="form-group">
                                <label for="InputBody">商店介紹</label>
                                <textarea type="body" id="article-ckeditor" class="form-control" name="InputBody" required rows="15"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cover_image">上傳頁面大圖</label>
                                <input type="file" name="cover_image" id="cover_image" required>
                                <img src="" id="cover_image-tag" width="200px" />
                            </div>
                            <div class="form-group">
                                <label for="logo_image">上傳LOGO或店照</label>
                                <input type="file" name="logo_image" id="logo_image" required>
                                <img src="" id="logo_image-tag" width="200px" />
                            </div>
                            
                            <button type="submit" class="btn btn-primary">送出</button>
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