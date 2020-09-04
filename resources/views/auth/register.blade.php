@extends('layouts.backend')
@section('BackendContent')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    var originalPrice = +$('.total').html();

        const $valueSpan = $('.valueSpan');
        const $value = $('#buy-month');
        $valueSpan.html($value.val());

        $value.on('input change', () => {
            $valueSpan.html($value.val());
        });

        $("input[type='checkbox'], #buy-month").change(function() {
            var priceTotal = originalPrice;
            var mul = $("#buy-month").val();

            if(mul == null) mul = 0;
            $("#calculator input[type='checkbox']:checked").each(function() {
                priceTotal += parseInt($(this).siblings('.license_price.bold').html().replace("$", ''), 10);
            });
            $('.total').html(priceTotal*mul);
        });
    });
</script>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        @include('backend.topbar')
        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">創建新用戶</h1>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">姓名(可暱稱)</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">電子郵件(E-Mail)</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-md-4 control-label">連絡電話</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">密碼</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">確認密碼</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                
                <label for="role" class="col-md-4 control-label">帳號身分</label>
                <div class="col-md-6">
                    <select class="form-control" id="role" name="role" required>
                        <option value="manager">網站管理員</option>
                        <option value="normal">付費VIP</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        創建帳號
                    </button>
                </div>
            </div>
        </form>
</div>
<!-- /.container-fluid -->


@endsection

