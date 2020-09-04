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
        <h1 class="h3 mb-2 text-gray-800">客戶名單</h1>
        <table class="table rwdtable shadow mb-4">
            <thead>
                <tr>
                    <th class="col">編號</th>
                    <th class="col">姓名</th>
                    <th class="col">電話</th>
                    <th class="col">LINE</th>
                    <th class="col">金額</th>
                    <th class="col">區域</th>
                    <th class="col">聯絡時間</th>
                    <th class="col">申請時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (empty($applications))
                    <td data-label="狀態：" class="col">無</td>   
                    @else
                    <?php $i=1;?>
                    @foreach ($applications as $list)
                    <tr>
                        <td data-label="編號：" class="col">{{$i++}}</td>
                        <td data-label="姓名：" class="col">{{$list->name}}</td>
                        <td data-label="電話：" class="col">{{$list->phone}}</td>
                        @if (empty($list->line))
                            <td data-label="LINE：" class="col">未填寫</td>                    
                        @else
                            <td data-label="LINE：" class="col">{{$list->line}}</td> 
                        @endif
                        <td data-label="金額：" class="col">{{$list->amount}}</td>
                        <td data-label="區域：" class="col">{{$list->location}}</td>
                        <td data-label="聯絡時間：" class="col">{{$list->contact_time}}</td>
                        <td data-label="申請時間：" class="col">{{$list->created_at}}</td>
                    </tr>    
                    @endforeach    
                    @endif
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            @if (!empty($applications))
            <ul class="pagination">
                {{ $applications->links() }}
            </ul>
            @endif
        </nav>
    <!--My table end-->

</div>
<!-- /.container-fluid -->
@endsection