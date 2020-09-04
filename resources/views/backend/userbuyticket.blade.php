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


        <section class="buy-ticket">
            <div class="container">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">購買服務</h1>
                </div>

                <form class="form-horizontal" method="POST" action="buyticket">
                    {{ csrf_field() }}
                    <div id="calculator" class="form-group">
                        <label for="location" class="col-md-4 control-label">選擇服務地區(可複選)</label>
                        <div class="col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="calculator[]" value="台北基隆">
                            <label class="form-check-label" for="台北基隆地區">台北基隆地區</label><span class="license_price bold"> $1500</span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="calculator[]" value="桃竹苗">
                            <label class="form-check-label" for="桃竹苗地區">桃竹苗地區</label><span class="license_price bold"> $1500</span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="calculator[]" value="中彰投">
                            <label class="form-check-label" for="中彰投地區">中彰投地區</label><span class="license_price bold"> $1500</span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="calculator[]" value="雲嘉南">
                            <label class="form-check-label" for="雲嘉南地區">雲嘉南地區</label><span class="license_price bold"> $1500</span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="calculator[]" value="高屏">
                            <label class="form-check-label" for="高屏地區">高屏地區</label><span class="license_price bold"> $1500</span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="buy-month" class="col-md-4 control-label">購買幾個月</label>
                        <div class="col-md-6">
                            <select class="form-control" id="buy-month" name="buy-month" required>
                                <option value="1">1個月</option>
                                <option value="2">2個月</option>
                                <option value="3">3個月</option>
                                <option value="4">4個月</option>
                                <option value="5">5個月</option>
                                <option value="6">6個月</option>
                            </select>
                        </div>   
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-md-4 control-label">應繳金額</label>
                        <div class="col-md-6">
                            <span>$<span class="total">0</span></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                確定續約
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>   
</div>
<!-- /.container-fluid -->


@endsection

