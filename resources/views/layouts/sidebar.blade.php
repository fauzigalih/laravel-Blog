<div class="content-side">
    <div class="accordion side-new" id="accordionExample">
      <div class="card">
        <div class="card-header header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-block text-left side-new-title" type="button" data-toggle="collapse"
              data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <span>#</span> Blog Terbaru
            </button>
          </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <ul>
              @foreach ($blog as $data)
                <li>
                  <a href="{{ url('blog/'.$data->url) }}">
                    <img src="{{ asset('img/post/'.$data->thumbnail) }}" alt="">
                    <p class="title">{{ $data->title }}</p>
                    <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                  </a>
                </li>
              @endforeach
              @if ($blog->count() >= 5)
                <li>
                  <a href="{{ url('blog') }}" class="more">
                    <p>SHOW MORE</p>
                  </a>
                </li>
              @elseif ($blog->count() == 0)
                <li>
                    <a href="#" class="more">
                    <p>Tidak ada blog yang ditampilkan.</p>
                    </a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-block text-left collapsed side-new-title" type="button" data-toggle="collapse"
              data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <span>#</span> Project Terbaru
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <ul>
              @foreach ($project as $data)
                <li>
                  <a href="{{ url('project/'.$data->url) }}">
                    <img src="{{ asset('img/garuda.jpg') }}" alt="">
                    <p class="title">{{ $data->title }}</p>
                    <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                  </a>
                </li>
              @endforeach
              @if ($project->count() >= 5)
                <li>
                  <a href="{{ url('project') }}" class="more">
                    <p>SHOW MORE</p>
                  </a>
                </li>
              @elseif ($project->count() == 0)
                <li>
                    <a href="#" class="more">
                    <p>Tidak ada project yang ditampilkan.</p>
                    </a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn btn-block text-left collapsed side-new-title" type="button" data-toggle="collapse"
              data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <span>#</span> Template Terbaru
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <div class="card-body">
            <ul>
              @foreach ($template as $data)
                <li>
                  <a href="{{ url('template/'.$data->url) }}">
                    <img src="{{ asset('img/garuda.jpg') }}" alt="">
                    <p class="title">{{ $data->title }}</p>
                    <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                  </a>
                </li>
              @endforeach
              @if ($template->count() >= 5)
                <li>
                  <a href="{{ url('template') }}" class="more">
                    <p>SHOW MORE</p>
                  </a>
                </li>
              @elseif ($template->count() == 0)
                <li>
                    <a href="#" class="more">
                    <p>Tidak ada template yang ditampilkan.</p>
                    </a>
                </li>
              @endif
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