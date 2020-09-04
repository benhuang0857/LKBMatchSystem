@extends('layouts.backend')
@section('BackendContent')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('backend.topbar')
        <!-- Begin Page Content -->
        <div class="container-fluid">        

        <section class="customer-response">
            <div class="container">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">通知店家後五碼</h1>
                </div>
                <div class="customer-response">
                    <form action="/admin/ticket/{{$ticket->id}}/customer_update" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="price">匯款金額：</label>
                            <span><strong>$</strong><span class="total">{{$ticket->price}}</span></span>
                        </div>

                        <div class="form-group">
                            <label for="checkin">是否開通：</label>
                            <span><span class="checkin">
                            @if ($ticket->checkin == 1)
                                已開通
                            @else
                                未開通
                            @endif    
                            </span></span>
                        </div>

                        <div class="form-group">
                            <label for="Inputfivecode">匯款後五碼</label>
                            @if ($ticket->checkin == 1)
                                <input type="text" class="form-control" id="Inputfivecode" name="Inputfivecode" placeholder="請填匯款後五碼" value="{{$ticket->fivecode}}" readonly>
                            @elseif($ticket->checkin != 1 && $ticket->fivecode != '-1')
                                <input type="text" class="form-control" id="Inputfivecode" name="Inputfivecode" placeholder="請填匯款後五碼" value="{{$ticket->fivecode}}" required >
                            @elseif($ticket->checkin != 1 && $ticket->fivecode == '-1')
                                <input type="text" class="form-control" id="Inputfivecode" name="Inputfivecode" placeholder="請填匯款後五碼" required >
                            @endif                                
                        </div>

                        @if ($ticket->checkin == 1)
                            <button type="submit" class="btn btn-primary" disabled>立即通知</button>
                        @else
                            <button type="submit" class="btn btn-primary" >立即通知</button>
                        @endif
                        
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection