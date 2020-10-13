@extends('layouts.public')
@section('title', 'Search: '.$search)
@section('content')
<main class="search">
    <div class="content">
        <div class="content-header">
        <p class="search"><span>Search For:</span>{{ $search }}</p>
        </div>
        <div class="content-body">
        <ul class="list-search">
            @foreach ($model as $data)
                <li>
                    <a href="{{ url('blog/'.$data->url) }}">
                        <img src="{{ asset('img/post/'.$data->thumbnail) }}" alt="{{ $data->thumbnail }}">
                        <p class="title">{{ $data->title }}</p>
                        <div class="uploader">
                        <img src="img/garuda.jpg" alt="">
                        <p class="name">Fauzi Galih Aji Saputro</p>
                        <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        </div>
        <div class="content-footer"></div>
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
        <!-- <div class="side-advertisement size366x280">
        advertisement 336 x 280
        </div>
        <div class="side-advertisement size300x600">
        advertisement 300 x 600
        </div>
        <div class="side-advertisement size300x600">
        advertisement 300 x 600
        </div> -->
    </div>
</main>