@extends('layouts.app')

@section('cssplus')
<style>
    @media (min-width: 1024px) {
        .page-wrapper {
            margin-left: 0;
        }
    }
    #recoverform {
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
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <div class="form-group ">
        <div class="col-xs-12">
            <h3>Reset Password</h3>
            <p class="text-muted">Masukkan email Anda dan petunjuk akan dikirimkan kepada Anda!</p>
        </div>
    </div>
    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control" name="email" type="text" required placeholder="Email" value="{{ old('email') }}"> </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
    </div>
    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Kirim</button>
        </div>
    </div>
</form>
@endsection