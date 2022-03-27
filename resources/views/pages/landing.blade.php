@extends('layouts.appl')

@section('title')
viho - Premium Admin Template
@endsection

@section('conten')
    <!--home section start-->
        <section class="landing-home section-pb-space" id="home"><img class="img-fluid bg-img-cover" src="{{ url('/assets/images/landing/landing-home/home-bg2.jpg') }}" alt="">
          <div class="custom-container">
            <div class="row">
              <div class="col-12">
                <div class="landing-home-contain">
                  <div>
                    <div class="landing-logo"><img class="img-fluid" src="{{ url('/assets/images/landing/landing-home/logo.png') }}" alt=""></div>
                    <h6>clean design </h6>
                    <h2>viho Bootstrap <span>Admin Template</span></h2>
                    <p>When it comes to dashboard or web apps. one of the first impression you consider is the design. It needs to be high quality enough otherwise you will lose potential users due to bad design.</p>
                    <div class="landing-button"><a class="btn-landing btn-lg me-3" href="index.html" target="_blank"><img class="img-fluid" src="{{ url('/assets/images/logo/html.png') }}" alt="">Html</a><a class="btn-landing btn-lg btn-secondary me-3" href="https://react.pixelstrap.com/viho" target="_blank"> <img class="img-fluid" src="{{ url('/assets/images/logo/react.png') }}" alt="">React</a><a class="btn-landing btn-lg btn-success" href="https://laravel.pixelstrap.com/viho/dashboard" target="_blank"><img class="img-fluid" src="{{ url('/assets/images/logo/laravel.png') }}" alt="">Laravel</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="position-block">   
            <div class="circle1 opicity3"></div>
            <div class="star"><i class="fa fa-asterisk"></i></div>
            <div class="star star1"><i class="fa fa-asterisk"></i></div>
            <div class="star star2 opicity3"><i class="fa fa-asterisk"></i></div>
            <div class="star star3"> <i class="fa fa-times"></i></div>
            <div class="star star4 opicity3"><i class="fa fa-times"></i></div>
            <div class="star star5 opicity3"> <i class="fa fa-times"></i></div>
            <ul class="animat-block">
              <li><img class="img-fluid img-parten top-parten" src="{{ url('/assets/images/landing/landing-home/home-position/img-parten.png') }}" alt="">
                <div><img class="img-fluid img1 v-align-t m-t-30" src="{{ url('/assets/images/landing/landing-home/home-position/img-1.jpg') }}" alt=""><img class="img-fluid img2 v-align-t" src="{{ url('/assets/images/landing/landing-home/home-position/img-2.jpg') }}" alt=""><img class="img-fluid img3 v-align-b" src="{{ url('/assets/images/landing/landing-home/home-position/img-3.jpg') }}" alt=""><img class="img-fluid img4 v-align-b" src="{{ url('/assets/images/landing/landing-home/home-position/img-4.jpg') }}" alt=""></div>
              </li>
              <li>
                <div><img class="img-fluid img5" src="{{ url('/assets/images/landing/landing-home/home-position/img-5.png') }}" alt=""><img class="img-fluid img6 v-align-c" src="{{ url('/assets/images/landing/landing-home/home-position/img-6.jpg') }}" alt=""></div>
              </li>
              <li><img class="img-fluid img-parten bottom-parten" src="{{ url('/assets/images/landing/landing-home/home-position/img-parten.png') }}" alt="">
                <div><img class="img-fluid img7 v-align-t" src="{{ url('/assets/images/landing/landing-home/home-position/img-7.jpg') }}" alt=""><img class="img-fluid img8 v-align-t" src="{{ url('/assets/images/landing/landing-home/home-position/img-8.jpg') }}" alt=""><img class="img-fluid img9" src="{{ url('/assets/images/landing/landing-home/home-position/img-9.jpg') }}" alt=""></div>
              </li>
            </ul>
          </div>
        </section>
        <!--home section end-->
        
        <!--unic-cards start-->
        <section class="unique-cards section-py-space">
          <div class="title">
            <h2>unique cards</h2>
          </div>
          <div class="custom-container">
            <div class="row unique-block">
              <div class="col-lg-5 col-sm-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/1.jpg') }}" alt=""></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/2.jpg') }}" alt=""></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/3.jpg') }}" alt=""></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-lg-6 col-sm-12">
                        <div class="card">
                          <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/11.jpg') }}" alt=""></div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <div class="card">
                          <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/12.jpg') }}" alt=""></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/4.jpg') }}" alt=""></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/5.jpg') }}" alt=""></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-12">
                <div class="row">
                  <div class="col-lg-12 col-sm-5">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/6.jpg') }}" alt=""></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-7">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/9.jpg') }}" alt=""></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-6">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/7.jpg') }}" alt=""></div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-6">
                    <div class="card">
                      <div class="img-wrraper"><img class="img-fluid w-100" src="{{ url('/assets/images/landing/unique-cards/8.jpg') }}" alt=""></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--unic-cards end-->
@endsection