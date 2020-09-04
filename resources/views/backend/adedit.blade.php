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
                        <form action="/admin/ads/{{$ad->id}}/update" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="InputTitle">店名</label>
                                <input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="請填寫標題" value="{{$ad->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="InputBody">商店介紹</label>
                                <textarea type="body" id="article-ckeditor" class="form-control" name="InputBody" required rows="15">{{$ad->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="adimage">上傳頁面大圖</label>
                                <input type="file" name="adimage" id="adimage">
                                <img src="/storage/adimage/{{$ad->image}}" id="adimage-tag" width="200px" />
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
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#adimage-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#adimage").change(function(){
            readURL2(this);
        });
    </script>
@endsection