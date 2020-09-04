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
            <h1 class="h3 mb-0 text-gray-800">消息、廣告管理</h1>
        </div>
        <table class="table rwdtable shadow mb-4">
            <thead>
                <tr>
                    <th class="col">編號</th>
                    <th class="col">標題</th>
                    <th class="col">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;?>
                @if (!count($ad))
                    <td data-label="狀態：" class="col">尚未使用</td>                    
                @else
                    @foreach ($ad as $ad)
                    <tr>
                        <td data-label="編號：" class="col">{{$i++}}</td>
                        <td data-label="標題：" class="col">{{$ad->title}}</td> 
                        <td data-label="操作：" class="col">
                            <a class="btn btn-primary mr-2" href="/admin/ads/{{$ad->id}}/edit">編輯</a>
                            <form action="/admin/ads/{{$ad->id}}/delete" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">刪除</button>
                            </form>
                        </td> 
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    <a class="btn btn-primary" href="/admin/ads/create" role="button">創建新消息或廣告</a>
    </div>

@endsection