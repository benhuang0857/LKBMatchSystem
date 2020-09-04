@extends('layouts.front')
@section('FrontContent')

<div class="main">
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">

            <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
                <img src="{{ URL::asset('images/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                <h3>王先生</h3>
                <h4>業務</h4>
                <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                成功在立刻貸平台申請到5萬，並且不到一天就拿到錢了，沒想到速度那麼快。
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
            </div>

            <div class="testimonial-item">
                <img src="{{ URL::asset('images/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                <h3>林小姐</h3>
                <h4>設計師</h4>
                <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                表單清楚簡單，填寫容易，資料保密不會有電話被打爆的情況，申請完成後處裡快速專業，成功貸款10萬。
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
            </div>

            <div class="testimonial-item">
                <img src="{{ URL::asset('images/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                <h3>吳先生</h3>
                <h4>工程師</h4>
                <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                原本以為申請困難，沒想到3分鐘就媒合成功，找到優質資金其實沒那麼難！成功核貸80萬。
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
            </div>

            <div class="testimonial-item">
                <img src="{{ URL::asset('images/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                <h3>楊先生</h3>
                <h4>學生</h4>
                <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                借款手續簡便，並且利息合理，申請後可以比較多間廠商，來選出最適合自己的貸款方案！成功核貸3萬。
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
            </div>

            </div>

        </div>
    </section><!-- End Testimonials Section -->
    <!-- Sign up form -->
    <section class="application section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Application</h2>
                <p>不用1分鐘，輕鬆申貸好輕鬆！</p>
            </div>
            <div class="application-content">
                <form  action="{{url('/application/submit')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="InputName">姓名</label>
                        <input type="text" class="form-control" id="InputName" name="InputName" placeholder="請填寫您的真實姓名" required>
                    </div>
                    <div class="form-group">
                        <label for="InputPhone">手機</label>
                        <input type="text" class="form-control" id="InputPhone" name="InputPhone" placeholder="請填您的手機" required>
                    </div>
                    <div class="form-group">
                        <label for="InputLineID">LINE ID</label>
                        <input type="text" class="form-control" id="InputLineID" name="InputLineID" placeholder="請填您的LINE ID">
                    </div>
                    <div class="form-group">
                        <label for="InputLocation">希望借貸區域</label>
                        <select class="form-control" id="InputLocation" name="InputLocation" required>
                          <option value="台北基隆">北北基地區</option>
                          <option value="桃竹苗">桃竹苗地區</option>
                          <option value="中彰投">中彰投地區</option>
                          <option value="雲嘉南">雲嘉南地區</option>
                          <option value="高屏">高屏地區</option>
                        </select>
                        <small id="InputCreditHelp" class="form-text text-muted">
                            請依照您的需求真實選填，有助於媒合速度。
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="InputReason">借款標題</label>
                        <input type="text" class="form-control" id="InputReason" name="InputReason" placeholder="填入借款標題">
                        <small id="InputReasonHelp" class="form-text text-muted">
                            請依照您的需求真實選填，有助於過件審核速度。
                        </small>
                    </div>
                    <!-- 使用羅馬數字表示 -->
                    <div class="form-group">
                        <label for="InputCredit">欲貸款金額</label>
                        <input type="text" class="form-control" id="InputCredit" name="InputCredit" placeholder="請填入金額" required>
                        <small id="InputCreditHelp" class="form-text text-muted">
                            請依照您的需求真實選填，有助於過件審核速度。
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="InputContactTime">方便聯絡時間</label>
                        <select class="form-control" id="InputContactTime" name="InputContactTime" required>
                            <option value="時間不拘">時間不拘</option>
                            <option value="早上(9:00~12:00)">早上(9:00~12:00)</option>
                            <option value="下午(12:00~18:00)">下午(12:00~18:00)</option>
                            <option value="晚上(18:00~24:00)">晚上(18:00~24:00)</option>
                        </select>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="CheckRule" name="CheckRule" required>
                        <label class="form-check-label" for="CheckRule">同意個資法</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">送出申請</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection