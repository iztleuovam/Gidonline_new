@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actor {{$actor->name}}</div>

                <div class="card-body">
                  <br>
                  <br>
                            <h1>Имя: {{ $actor->name }}</h1>
                            <h1>Рейтинг: {{ $actor->rating }}/10</h1>
                            @foreach($actor->films as $film)

                            <li><a style="font-size:15pt;" href="/film/{{ $film->id }}">{{ $film->name }}  </a></li>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
