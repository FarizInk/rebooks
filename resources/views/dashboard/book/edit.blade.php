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
@if(session('response'))
<div class="alert alert-success" role="alert">
  {{ session('response') }}
</div>
@endif
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a onclick="window.history.back();" href="#" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xlg-9 col-md-7">
        @foreach($data as $book)
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" action="{{ route('dashboard.book.update.cover', $book->slug) }}" method="post" enctype="multipart/Form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <img class="col-sm-12" style="width: 220px; margin-bottom: 12px;" src="{!! asset('images/cover') !!}/{{ $book->cover }}">
                        <label class="col-md-12" for="exampleFormControlFile1">Foto Cover (foto harus berbentuk kotak, atau anda bisa resize <a href="https://imageresize.org/">disini</a>)</label>
                        <input name="cover" type="file" class="form-control-file col-md-12" id="exampleFormControlFile1" value="{{ old('cover') }}">
                        @if ($errors->has('cover'))
                            <span class="help-block">
                                <strong class="col-md-12">{{ $errors->first('cover') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" action="{{ route('dashboard.book.update', $book->slug) }}" method="post" enctype="multipart/Form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">Judul Buku</label>
                        <div class="col-md-12">
                            <input name="title" type="text" value="{{ $book->title }}" class="form-control form-control-line">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Kategori (Kategori dipisah dengan tanda koma dan harus 1 kata perkategori)</label>
                        <div class="col-md-12 row">
                            @foreach($genres as $key => $genre)
                            <div class="col-md-2">
                                <input type="checkbox" name="genres[]" id="checkbox_{{ $i = $key+1 }}" class="chk-col-teal" value="{{ $genre->id }}"
                                @php
                                foreach($book->genres()->get() as $bookgen){
                                    if ($genre->id == $bookgen->id) {
                                        echo "checked";
                                    }
                                }
                                @endphp>
                                <label for="checkbox_{{ $i }}">{{ $genre->name }}</label>
                            </div>
                            @endforeach
                            @if ($errors->has('genres'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('genres') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="staticDate" class="col-sm-2 col-form-label">Tanggal/hari</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticDate" value="{{ date('d-m-Y', strtotime($book->created_at)) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Kondisi :</label>
                        <div class="form-check col-md-12">
                          <input @if($book->condition == "new")
                            checked
                          @endif
                          class="form-check-input" type="radio" name="condition" id="Radios1" value="new">
                          <label class="form-check-label" for="Radios1">
                            Baru
                          </label>
                        </div>
                        <div class="form-check col-md-12">
                          <input 
                          @if($book->condition == "second")
                            checked
                          @endif
                          class="form-check-input" type="radio" name="condition" id="Radios2" value="second">
                          <label class="form-check-label" for="Radios2">
                            Bekas
                          </label>
                        </div>
                        @if ($errors->has('condition'))
                            <span class="help-block">
                                <strong>{{ $errors->first('condition') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Harga(dalam satuan rupiah)</label>
                        <div class="col-md-12">
                            <input name="price" value="{{ $book->price }}" type="number" class="form-control form-control-line">
                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Pengarang</label>
                        <div class="col-md-12">
                            <input name="author_book" type="text" value="{{ $book->author_book }}" class="form-control form-control-line">
                            @if ($errors->has('author_book'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('author_book') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Penerbit</label>
                        <div class="col-md-12">
                            <input name="publisher_book" value="{{ $book->publisher_book }}" type="text" class="form-control form-control-line">
                            @if ($errors->has('publisher_book'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publisher_book') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tahun Terbit</label>
                        <div class="col-md-12">
                            <input name="publication_year_book" value="{{ $book->publication_year_book }}" type="number" class="form-control form-control-line">
                            @if ($errors->has('publication_year_book'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publication_year_book') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Detail Tambahan</label>
                        <div class="col-md-12">
                            <textarea name="description" rows="5" class="form-control form-control-line">{{ $book->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="overflow: -webkit-paged-x">
                        <label class="col-md-12" style="margin-bottom: 12px;">Checklis jika ingin menghapus foto.</label>
                        <div class="col-md-12 row">
                            @foreach($book->images as $key => $image)
                            <div class="col-md-3">
                                <input type="checkbox" name="imagesrep[]" id="checkbox_{{ $i = $key+1 }}" class="chk-col-teal" value="{{ $image->name }}">
                                <label for="checkbox_{{ $i }}"><img src="{!! asset('images/post') !!}/{{ $image->name }}" style="max-width: 100%; margin-bottom: 12px;"></label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="exampleFormControlFile1">Tambah Foto</label>
                                <input name="images[]" type="file" class="form-control-file" id="exampleFormControlFile1" multiple>
                                @if ($errors->has('images'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-primary" role="alert">
                                  Anda bisa menambahkan lebih dari 1 foto sekaligus.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection