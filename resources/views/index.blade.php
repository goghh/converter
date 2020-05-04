@extends('layouts.main')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('convert') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control-file" accept="image/jpeg" name="file" id="file" required>
            </div>
            <div class="form-group">
                <select class="form-control" id="to" name="to" required>
                    <option disabled selected value> -- select an option -- </option>
                    @foreach ($options as $option)
                        <option>{{$option}}</option>
                    @endforeach
                </select>
            </div>
            @isset($error)
                <span>{{$error}}</span>
            @endisset
            <button type="submit" class="btn btn-dark">Convert and download</button>
        </form>
    </div>
@endsection
