@extends('layouts.public')
@section('title', $model->title)
@section('content')
<main>
    <div class="content">
      <div class="content-header">
        <div class="content-header-uploader">
          <div class="content-uploader">
            <img src="{{ asset('img/garuda.jpg') }}" alt="">
            <a href="">Fauzi Galih Aji Saputro</a>
            <p class="content-update">Nov 11, 2020</p>
            <div class="content-uploader-media">
              <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-github" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
        <div class="content-header-title">{!! $model->title !!}</div>
      </div>
      <div class="content-body">
        <div class="content-body-generate">
          {!! html_entity_decode($model->article) !!}
        </div>
        <div class="content-tag">
          <ul>
            <li><a href="">Authentication</a></li>
            <li><a href="">Responsive</a></li>
            <li><a href="">Rest Api</a></li>
          </ul>
        </div>
        <div class="side-advertisement size480x320">
          advertisement 480 x 320
        </div>
        <div class="side-advertisement size580x400">
          advertisement 580 x 400
        </div>
        <div class="content-uploader-detail">
          <img src="img/garuda.jpg" alt="">
          <p class="written-by">Written By</p>
          <a href="">Fauzi Galih Aji Saputro</a>
          <p class="quotes-uploader">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit quisquam praesentium
            at libero modi, possimus corrupti quo dignissimos, eligendi minus suscipit nisi perferendis. Possimus natus
            quia nam sunt, rerum deleniti.</p>
          <div class="content-uploader-media">
            <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-github" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="content-footer">
        <div class="content-comment">

        </div>
        <div class="other-article">

        </div>
      </div>
    </div>
    <div class="content-side">
      <div class="accordion side-new" id="accordionExample">
        <div class="card">
          <div class="card-header header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-block text-left side-new-title" type="button" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span>#</span> The Latest Blog
              </button>
            </h2>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <ul>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="" class="more">
                    <p>SHOW MORE</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-block text-left collapsed side-new-title" type="button" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span>#</span> The Latest Project
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <ul>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="" class="more">
                    <p>SHOW MORE</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-block text-left collapsed side-new-title" type="button" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <span>#</span> The Latest Template
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <ul>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="img/garuda.jpg" alt="">
                    <p class="title">Authentication dan authorization Authentication dan authorization</p>
                    <p class="date">Nov 11, 2020</p>
                  </a>
                </li>
                <li>
                  <a href="" class="more">
                    <p>SHOW MORE</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="newsletter">
        <p class="title">Newsletter</p>
        <p class="message">Dapatkan informasi terbaru dengan berlangganan newsletter.</p>
        <form action="">
          <input type="text" class="form-control" placeholder="Nama Lengkap" required>
          <input type="email" class="form-control" placeholder="Alamat Email" required>
          <button class="btn btn-success">Ya, Saya Mau!</button>
        </form>
      </div>
      <div class="side-advertisement size366x280">
        advertisement 336 x 280
      </div>
      <div class="side-advertisement size300x600">
        advertisement 300 x 600
      </div>
      <div class="side-advertisement size300x600">
        advertisement 300 x 600
      </div>
    </div>
  </main>
  @endsection