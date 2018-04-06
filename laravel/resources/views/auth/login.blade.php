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
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <h3 class="box-title m-b-20">Masuk Sebagai Penjual</h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="email" type="text" required="" placeholder="Username"> </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" required="" placeholder="Password"> </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-info pull-left p-t-0">
                                    <input id="checkbox-signup" name="remember" type="checkbox" class="filled-in chk-col-light-blue">
                                    <label for="checkbox-signup"> Ingat saya </label>
                                </div>
                                <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Lupa Password ?</a>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Masuk</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Belum Punya Akun ? <a href="{{ route('register') }}" class="text-info m-l-5"><b>Daftar</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

