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
            <h1 class="h3 mb-0 text-gray-800">頁面管理</h1>
        </div>
        <table class="table rwdtable shadow mb-4">
            <thead>
                <tr>
                    <th class="col">編號</th>
                    <th class="col">網址</th>
                    <th class="col">標題</th>
                    <th class="col">操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (empty($title))
                        <td data-label="狀態：" class="col">尚未使用</td>                    
                    @else
                        <td data-label="編號：" class="col">1</td>
                        <td data-label="網址：" class="col"><a href="{{"/store/$url"}}">點擊查看</td>
                        <td data-label="標題：" class="col">{{$title}}</td> 
                        <td data-label="操作：" class="col">
                            <a class="btn btn-primary mr-2" href="/admin/storepage/{{$id}}/edit">編輯</a>
                            <form action="/admin/storepage/{{$id}}/delete" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">刪除</button>
                            </form>
                            
                        </td> 
                    @endif
                </tr>
            </tbody>
        </table>

    <a style="{{$style}}" class="btn btn-primary" href="/admin/storepage/create" role="button">創建公司介紹頁面</a>
    </div>

@endsection