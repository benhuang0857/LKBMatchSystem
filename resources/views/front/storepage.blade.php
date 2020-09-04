@extends('layouts.front')
@section('FrontContent')

<!-- ======= Hero Section ======= -->
<div class="container-fluid no-padding">
    <div class="row">
        <img src="/storage/cover_image/{{$store->cover_image}}" alt="{{$store->title}}" class="img-responsive" style="width:100%;max-height:500px; padding:0px; object-fit: cover;" />
    </div>
</div>

<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
        <h2>About</h2>
        <p>關於我們</p>
    </div>
    <div class="row">

        <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
        <img src="/storage/logo_image/{{$store->logo_image}}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 pt-3 pt-lg-0 content">
        <h3>關於{{$store->title}}</h3>
        <p>
            {{$store->body}}
        </p>
        </div>

    </div>

    </div>
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-title">
        <h2>Services</h2>
        <p>{{$store->title}}的服務</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="200">
        <?php $service = explode(',',$store->service)?>
        @foreach ($service as $service)
            @if ($service == '1')
                <div class="col-md-6">
                <div class="icon-box">
                    <i class='bx bxs-chevrons-down'></i>
                    <h4><a href="#">代書貸款</a></h4>
                    <p>
                        利用您個人信用條件透過民間貸款公司申辦一筆貸款融資周轉，根據所需要貸款金額計算利息每月本利攤還，只要您符合有勞健保和薪轉條件就能申辦民間代書貸款。
                    </p>
                </div>
                </div>
            @endif

            @if ($service == '2')
                <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                    <i class='bx bxs-chevrons-down'></i>
                    <h4><a href="#">小額貸款</a></h4>
                    <p>小額借款，顧名思義就是小金額的信用貸款。而小額借款起源自 1976 年，孟加拉的穆罕默德•尤納斯所創辦的鄉村銀行，業務內容是為社會經濟階層較低的民眾提供信貸服務。</p>
                </div>
                </div>
            @endif

            @if ($service == '3')
                <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                    <i class='bx bxs-chevrons-down'></i>
                    <h4><a href="#">支票貼現</a></h4>
                    <p>支票貼現是一種以折扣預收利息的方式買入票據，使申請人得以現金週轉，多數介於6至8成間。一般以2至4個月為主，支票貼現申請人限制需為公司行號。</p>
                </div>
                </div>
            @endif

            @if ($service == '4')
                <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                    <i class='bx bxs-chevrons-down'></i>
                    <h4><a href="#">汽機車貸款</a></h4>
                    <p>汽機車借款又稱汽機車貸款、汽機車二貸、汽機車融資、汽機車增貸，就是將汽機車當作抵押品，向金融機構申請一筆貸款。可在使用汽機車的前提下向金融機構申辦貸款</p>
                </div>
                </div>
            @endif

            @if ($service == '5')
                <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                    <i class='bx bxs-chevrons-down'></i>
                    <h4><a href="#">二胎房貸</a></h4>
                    <p>二順位房屋貸款亦稱二胎，就是當該房屋在之前已向銀行進行第一次房屋貸款後，用原房屋再向另一家銀行，進行對該標的殘值的再抵押借款，房屋貸款抵押設定出現第2順位債權人。</p>
                </div>
                </div>
            @endif

            @if ($service == '6')
                <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                    <i class='bx bxs-chevrons-down'></i>
                    <h4><a href="#">銀行代辦</a></h4>
                    <p>代辦公司也可以稱作貸款顧問公司， 意即協助貸款人向銀行或融資公司申請貸款。 通常代辦公司號稱了解各家銀行授信角度，會視申貸人自身狀況給予個別銀行的貸款產品建議並協助送件！</p>
                </div>
                </div>
            @endif
        @endforeach
        
    </div>

    </div>
</section><!-- End Services Section -->

<!-- ***** Features Small Start ***** -->
<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>最新優惠</h2>
                </div>
            </div>
            <div class="owl-carousel ads-carousel">
            @foreach ($ad as $ad)
                <div class="col-sm-4 item">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="/storage/adimage/{{$ad->image}}" style="width:100%; max-height:130px; padding:0px; object-fit: cover;" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text">{{$ad->body}}</p>  
                        </div>
                    </div>
                </div>
            @endforeach  
            </div>
        </div>
    </div>
</section>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

<div class=" section-title">
    <h2>Contact</h2>
    <p>聯絡我們</p>
    </div>

    <div class="row">

    <div class="col-lg-12">

        <div class="row">
        <div class="col-md-12">
            <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>我們的位置</h3>
            <p>{{$store->location}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box mt-4">
            <i class="bx bx-envelope"></i>
            <h3>Email</h3>
            <p>{{$store->email}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box mt-4">
            <i class="bx bx-phone-call"></i>
            <h3>致電我們</h3>
            <p>{{$store->phone}}</p>
            </div>
        </div>
        </div>

    </div>

    </div>

    </div>
</section><!-- End Contact Section -->

@endsection