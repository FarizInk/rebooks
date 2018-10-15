@extends('layouts.app')

@section('cssplus')
<style>
    .left-sidebar {
        background: #242a33;
    }
    strong {
        font-weight: bolder;
        color: red;
    }
</style>
@endsection

@section('nav')
@include('layouts.header')
@include('layouts.navLeft')
@endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Edit Profile</h3>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        @if($verified == 0)
        <div class="alert alert-danger" role="alert">
          Akun ini belum terferifikasi!
          <form action="{{ route('dashboard.profile.verify') }}" method="post">
                {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Verifikasi</button>
          </form>
        </div>
        @else
        <div class="alert alert-success" role="alert">
          Akun ini sudah terferifikasi.
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{!! asset('images/profile') !!}/{{ Auth::user()->img }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="mdi mdi-book-open-page-variant"></i> <font class="font-medium">10</font></a></div>
                    </div>
                </center>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" action="{{ route('dashboard.profile.update.photo') }}" enctype="multipart/Form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12" for="exampleFormControlFile1">Foto Profil (foto harus berbentuk kotak, atau anda bisa resize <a href="https://imageresize.org/">disini</a>)</label>
                        <input type="file" name="img" class="form-control-file col-md-12" id="exampleFormControlFile1">
                        @if ($errors->has('img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('img') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group" style="margin-bottom: 0">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        @if(session('response'))
        <div class="alert alert-warning" role="alert">
          {{ session('response') }}
        </div>
        @endif
        <div class="alert alert-primary" role="alert">
          Ubah nilai form jika ingin mengganti identitas diri.
        </div>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post">
                    {{ csrf_field() }}
                    <div class="form-group ">
                        <label class="col-md-12">Username</label>
                        <div class="col-md-12">
                            <input disabled class="form-control" name="username" type="text" placeholder="{{ Auth::user()->username }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Nama Lengkap</label>
                        <div class="col-md-12">
                            <input name="name" type="text" value="{{ Auth::user()->name }}" class="form-control form-control-line">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-2">Email</label>
                        <span class="col-md-2"><a href="#changemail" class="btn btn-success">Ubah</a></span>
                        <div class="col-md-12">
                            <input disabled name="email" type="email" placeholder="{{ Auth::user()->email }}" class="form-control form-control-line" name="example-email" id="example-email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Nomor Handphone</label>
                        <div class="col-md-12">
                            <input name="phone" type="number" value="{{ Auth::user()->phone }}" class="form-control form-control-line">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Alamat</label>
                        <div class="col-md-12">
                            <textarea name="address" rows="5" class="form-control form-control-line">{{ Auth::user()->address }}</textarea>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Jenis Kelamin</label>
                        <div class="col-sm-12">
                            <select name="gender" class="form-control form-control-line">
                                <option
                                @if(Auth::user()->gender == 'male')
                                selected
                                @endif
                                 value="male" name="gender">Laki - Laki</option>
                                <option 
                                @if(Auth::user()->gender == 'female')
                                selected
                                @endif 
                                value="female" name="gender">Perempuan</option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Pilih Kota</label>
                        <div class="col-sm-12">
                            <select name="city_id" class="form-control form-control-line">
                                <option value="">-- Pilih Kota --</option>
                                @foreach ($cities as $city)
                                @if($city->id == Auth::user()->city_id)
                                    <option selected name="city_id" value="{{$city->id}}">{{$city->name}}</option>
                                @else
                                    <option name="city_id" value="{{$city->id}}">{{$city->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if ($errors->has('city_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="changemail" class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" action="{{ route('dashboard.profile.update.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="example-email" class="col-md-2">Email</label>
                        <div class="col-md-12">
                            <input name="email" type="email" placeholder="{{ Auth::user()->email }}" class="form-control form-control-line" name="example-email" id="example-email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" action="{{ route('dashboard.profile.update.password') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                            <input name="password" type="password" class="form-control form-control-line">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection