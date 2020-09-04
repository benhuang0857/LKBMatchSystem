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
            請轉帳至帳戶：2044-10-0011405-0(台新銀行0447太平分行)，請於匯款後將後五碼告知專員；或是點擊「通知後五碼」，填妥後五碼後送出。再核對過後，將會馬上為您開通服務。
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">您所購買的服務</h1>
        <table class="table rwdtable shadow mb-4">
            <thead>
                <tr>
                    <th class="col">編號</th>
                    <th class="col">地區</th>
                    <th class="col">購買月數</th>
                    <th class="col">總金額</th>
                    <th class="col">建立時間</th>
                    <th class="col">過期時間</th>
                    <th class="col">立即繳款</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td data-label="編號：" class="col">{{$i++}}</td> 
                        <td data-label="地區：" class="col">{{$ticket->location}}</td> 
                        <td data-label="購買月數：" class="col">{{$ticket->buy_month}}</td>
                        <td data-label="總金額：" class="col">{{$ticket->price}}</td>
                        <td data-label="建立時間：" class="col">{{$ticket->created_at}}</td>
                        <td data-label="過期時間：" class="col">{{$ticket->expiry}}</td>
                        <td data-label="立即繳款：" class="col">
                        @if(auth()->user()->ticket_id == $ticket->id)
                            <a href="/admin/ticket/{{$ticket->id}}/fivecode">通知後五碼</a>
                        @else
                            已過期
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <!--My table end-->

</div>
<!-- /.container-fluid -->
@endsection