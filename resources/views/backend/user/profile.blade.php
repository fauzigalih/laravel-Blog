@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
    <main>
      @include('layouts.alert')
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <div class="card">
            <h5 class="card-header">Profile User</h5>
            <div class="card-body">
              <form action="{{ url('admin/profile/'. Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                <h5 class="card-title">Personal</h5>
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input name="name" type="name" class="form-control" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input name="email" type="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                      <img src="{{ asset('img/profile/'. Auth::user()->photo) }}" alt="Photo error" style="height: 4rem">
                      <input name="photo" type="file" class="form-control-file mt-2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label">Tentang Kamu</label>
                    <div class="col-sm-9">
                      <textarea name="description" class="form-control" rows="3" placeholder="Perkenalkan diri kamu secara singkat" required>{{ Auth::user()->description }}</textarea>
                    </div>
                </div>

                <h5 class="card-title">Media Social</h5>
                <div class="form-group row">
                    <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                    <div class="col-sm-9">
                      <input name="twitter" type="twitter" class="form-control" placeholder="Link Twitter Profile" value="{{ Auth::user()->medsos['twitter'] ?? null }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                    <div class="col-sm-9">
                      <input name="facebook" type="facebook" class="form-control" placeholder="Link Facebook Profile" value="{{ Auth::user()->medsos['facebook'] ?? null }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
                    <div class="col-sm-9">
                      <input name="instagram" type="instagram" class="form-control" placeholder="Link Instagram Profile" value="{{ Auth::user()->medsos['instagram'] ?? null }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="linkedin" class="col-sm-3 col-form-label">LinkedIn</label>
                    <div class="col-sm-9">
                      <input name="linkedin" type="linkedin" class="form-control" placeholder="Link LinkedIn Profile" value="{{ Auth::user()->medsos['linkedin'] ?? null }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="github" class="col-sm-3 col-form-label">GitHub</label>
                    <div class="col-sm-9">
                      <input name="github" type="github" class="form-control" placeholder="Link GitHub Profile" value="{{ Auth::user()->medsos['github'] ?? null }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>
            </div>
        </div>
        <div class="card mt-3">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">
              <form action="{{ url('admin/password/'. Auth::user()->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="old" class="col-sm-3 col-form-label">Password Lama</label>
                    <div class="col-sm-9">
                      <input name="old" type="password" class="form-control" placeholder="Password Lama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                    <div class="col-sm-9">
                      <input name="password" type="password" class="form-control" placeholder="Password Baru" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirm" class="col-sm-3 col-form-label">Ulangi Password Baru</label>
                    <div class="col-sm-9">
                      <input name="confirm" type="password" class="form-control" placeholder="Ulangi Password Baru" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>
            </div>
        </div>
        <div class="card mt-3">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
              <h5 class="card-title">Hapus akun secara permanen!</h5>
              <p class="card-text">Semua aktivitas akan hilang seperti postingan dan data lainnya ketika menghapus akun.</p>
              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccount">Hapus Akun</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin ingin menghapus akun ini secara permanen? <br>
                Semua aktivitas akan hilang seperti postingan dan data lainnya ketika menghapus akun.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <form action="{{ url('admin/profile/'. Auth::user()->id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->
    </main>
@endsection