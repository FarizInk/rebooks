@extends('layouts.app')

@section('cssplus')
<style>
    @media (min-width: 1024px) {
        .page-wrapper {
            margin-left: 0;
        }
    }
    #wrapper {
        width: 40%;
        margin: 40px 30%;
    }
    strong {
        font-weight: bolder;
        color: red;
    }
</style>
@endsection

@section('content')
<section id="wrapper">
    <div class="login-register">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}" enctype="multipart/Form-data">
                    {{ csrf_field() }}
                    <h3 class="box-title m-b-20">Daftar Sebagai Penjual</h3>
                    <div class="form-group ">
                        <label class="col-xs-12">Username</label>
                        <div class="col-xs-12">
                            <input class="form-control" name="username" value="{{ old('username') }}" type="text" placeholder="Masukkan Username Anda"> </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12">Nama Lengkap</label>
                        <div class="col-xs-12">
                            <input value="{{ old('name') }}" type="text" name="name" placeholder="Masukkan Nama Lengkap Anda" class="form-control form-control-line">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-xs-12">Email</label>
                        <div class="col-xs-12">
                            <input value="{{ old('email') }}" type="email" name="email" placeholder="Masukkan Email Anda" class="form-control form-control-line" name="example-email" id="example-email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12">Password</label>
                        <div class="col-xs-12">
                            <input type="password" name="password" class="form-control form-control-line">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12">Confirm Password</label>
                        <div class="col-xs-12"">
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12">Nomor Handphone</label>
                        <div class="col-xs-12">
                            <input value="{{ old('nomor_hp') }}" type="number" name="nomor_hp" placeholder="Nomor Handphone Anda" class="form-control form-control-line">
                                @if ($errors->has('nomor_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_hp') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12">Alamat</label>
                        <div class="col-xs-12">
                            <textarea name="alamat" rows="5" class="form-control form-control-line">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12">Jenis Kelamin</label>
                        <div class="col-xs-12">
                            <select name="jkel" class="form-control form-control-line">
                                <option name="jkel" value="laki">Laki - laki</option>
                                <option name="jkel" value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12">Pilih Kota Anda</label>
                        <div class="col-xs-12">
                            <select class="form-control form-control-line">
                                <option>Surabaya</option>
                                <option>Jakarta</option>
                                <option>Bandung</option>
                                <option>Yogyakarta</option>
                                <option>Bali</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="exampleFormControlFile1">Foto Profil</label>
                        <input name="img" type="file" class="form-control-file col-md-12" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-warning btn-rounded" type="submit">Daftar</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Sudah Punya Akun ? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Masuk</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection