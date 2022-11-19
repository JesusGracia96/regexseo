@extends('layout.app')
<link rel="stylesheet" href="{{ asset('/css/upload.css') }}">

@section('content')
    <div class="">
        <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data" class="text-center d-flex flex-column justify-content-center align-items-center">
            @csrf
            <h2>UPLOAD YOUR IMAGE</h2>
            <div id="imagen-muestra" class="imagen-muestra d-none"></div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input id="btnOpenFileSel" type="button" class="form-control file-control c-pointer" onclick="openFileInput(event)" value="CHOOSE FILE">
                <input style="display:none" type="file" name="image" id="image">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="title">TITLE</label>
                <input class="form-control" type="text" placeholder="IMAGE TITLE" name="title">
            </div>
            <div class="form-group">
                <label for="description">DESCRIPTION</label>
                <input class="form-control" type="text" placeholder="IMAGE DESCRIPTION" name="description">
            </div>
            <button type="submit" class="btn btn-submit">UPLOAD</button>
        </form>
    </div>
    <script src="{{ asset('/js/upload.js') }}"></script>
@endsection
