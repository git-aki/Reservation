@extends('layouts.app')

@section('content')

<section class="probootstrap-slider flexslider">
    <ul class="slides">
       <li style="background-image: url(img/slider_1.jpg);" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate">Welcome to Atlantis</h1>
                  <div class="probootstrap-animate probootstrap-sub-wrap">都会の喧騒から離れて、一時のひと時をAtlantisで</div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(img/slider_2.jpg);" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading probootstrap-animate">一生に一度の体験をお楽しみください</h1>
                  <div class="probootstrap-animate probootstrap-sub-wrap">普段の生活とは離れてゆっくりとしたひと時を</div>
                </div>
              </div>
            </div>
          </div>
          
        </li>
    </ul>
  </section>

<section class="probootstrap-cta probootstrap-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="probootstrap-cta-heading">すぐに予約される方はこちらから<span> &mdash; </span></h2>
          <div class="probootstrap-cta-button-wrap"><a href="{{ route('reservation') }}" class="btn btn-primary">予約画面へ</a></div>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section">
    <div class="container">
      <div class="row mb30">
        <div class="col-md-8 col-md-offset-2 probootstrap-section-heading text-center">
          <h2>Services</h2>
          <p><img src="img/curve.svg" class="svg" alt="Free HTML5 Bootstrap Template"></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="service left-icon probootstrap-animate">
            <div class="icon">
              <img src="img/flaticon/svg/001-building.svg" class="svg" alt="Free HTML5 Bootstrap Template by uicookies.com">
            </div>
            <div class="text">
              <h3>各種お部屋をご用意してあります。</h3>
              <p>ご質問や確認事項など、お気軽にお問い合わせください。</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>  
          </div>
        </div>
        <div class="col-md-6">
          <div class="service left-icon probootstrap-animate">
            <div class="icon">
              <img src="img/flaticon/svg/003-restaurant.svg" class="svg" alt="Free HTML5 Bootstrap Template by uicookies.com">
            </div>
            <div class="text">
              <h3>cafe</h3>
              <p>軽食などのここでしか食べられないメニューも！！</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="probootstrap-section probootstrap-section-dark">
    <div class="container">
      <div class="row mb30">
        <div class="col-md-8 col-md-offset-2 probootstrap-section-heading text-center">
          <h2>Best rooms</h2>
          <p class="lead">当ホテルが自信を持って紹介させていただきます。</p>
          <p><img src="img/curve.svg" class="svg" alt="Free HTML5 Bootstrap Template"></p>
        </div>
      </div>
      <div class="row probootstrap-gutter10">
        <div class="col-md-6">
          <div class="probootstrap-block-image-text">
            <figure>
              <a href="img/img_1.jpg" class="image-popup">
                <img src="img/img_1.jpg" alt="Free HTML5 Bootstrap Template by uicookies.com" class="img-responsive">
              </a>
              <div class="actions">
                <a href="https://vimeo.com/45830194" class="popup-vimeo"><i class="icon-play2"></i></a>
              </div>
            </figure>
            <div class="text">
              <h3><a href="#">Executive Room</a></h3>
              <div class="post-meta">
                <ul>
                  <li><span class="review-rate">4.7</span> <i class="icon-star"></i> 252件 クチコミ</li>
                </ul>
              </div>
              <p>客室は、それぞれに贅を尽くし普段体験出来ないような贅沢を</p>
              <p><a href="#" class="btn btn-primary">予約する</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="probootstrap-block-image-text">
            <figure>
              <a href="img/img_2.jpg" class="image-popup">
              <img src="img/img_2.jpg" alt="Free HTML5 Bootstrap Template by uicookies.com" class="img-responsive">
              </a>
              <div class="actions">
                <a href="https://vimeo.com/45830194" class="popup-vimeo"><i class="icon-play2"></i></a>
              </div>
            </figure>
            <div class="text">
              <h3><a href="#">Deluxe Room</a></h3>
              <div class="post-meta">
                <ul>
                  <li><span class="review-rate">4.7</span> <i class="icon-star"></i> 252件 クチコミ</li>
                </ul>
              </div>
              <p>ご夫婦やカップルの方に大変人気です。</p>
              <p><a href="#" class="btn btn-primary">予約する</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="probootstrap-section">
    <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-relative">
            <h3 class="mt0 mb30">Rooms</h3>
            <ul class="probootstrap-owl-navigation absolute right">
              <li><a href="#" class="probootstrap-owl-prev"><i class="icon-chevron-thin-left"></i></a></li>
              <li><a href="#" class="probootstrap-owl-next"><i class="icon-chevron-thin-right"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 probootstrap-relative">
            <div class="owl-carousel owl-carousel-carousel">
              <div class="item">
                <div class="probootstrap-room">
                  <a href="#"><img src="img/img_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a>
                  <div class="text">
                    <h3>Executive Room</h3>
                    <p>一泊あたり<strong>¥8000</strong></p>
                    <div class="row justify-content-between">
                      <div class="post-meta col-8">
                          <span class="review-rate">4.7</span> <i class="icon-star"></i> 252件 クチコミ
                      </div>
                      <div class="col-4">
                        <p><a href="#" class="btn btn-primary">予約する</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="probootstrap-room">
                  <a href="#"><img src="img/img_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a>
                  <div class="text">
                    <h3>Deluxe Room</h3>
                    <p>一泊あたり<strong>¥7000</strong></p>
                    <div class="row justify-content-between">
                      <div class="post-meta col-8">
                          <span class="review-rate">4.7</span> <i class="icon-star"></i> 252件 クチコミ
                      </div>
                      <div class="col-4">
                        <p><a href="#" class="btn btn-primary">予約する</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="probootstrap-room">
                  <a href="#"><img src="img/img_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a>
                  <div class="text">
                    <h3>Superior Room</h3>
                    <p>一泊あたり<strong>¥6000</strong></p>
                    <div class="row justify-content-between">
                      <div class="post-meta col-8">
                          <span class="review-rate">4.7</span> <i class="icon-star"></i> 252件 クチコミ
                      </div>
                      <div class="col-4">
                        <p><a href="#" class="btn btn-primary">予約する</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="probootstrap-room">
                  <a href="#"><img src="img/img_4.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a>
                  <div class="text">
                    <h3>Standard Room</h3>
                    <p>一泊あたり<strong>¥5000</strong></p>
                    <div class="row justify-content-between">
                      <div class="post-meta col-8">
                          <span class="review-rate">4.7</span> <i class="icon-star"></i> 252件 クチコミ
                      </div>
                      <div class="col-4">
                        <p><a href="#" class="btn btn-primary">予約する</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>

  <section class="probootstrap-half">
    <div class="image" style="background-image: url(img/slider_2.jpg);"></div>
    <div class="text">
      <div class="probootstrap-animate fadeInUp probootstrap-animated">
        <h2 class="mt0">旅のサポートを</h2>
        <div class="row">
          <div class="col-md-6">
            <p>のんびり一人旅でもビジネスでも、ゆっくりくつろげるお部屋。</p>    
          </div>
          <div class="col-md-6">
            <p>また、ご夫婦や恋人とのご宿泊にもご好評いただいております。</p>    
          </div>
        </div>
        <p><a href="#" class="link-with-icon white">Learn More <i class=" icon-chevron-right"></i></a></p>
      </div>
    </div>
  </section>

@endsection