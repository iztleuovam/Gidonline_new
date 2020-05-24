@extends('layouts.app')

@section('main')
<div id="posts">
@foreach($favorites as $favorite)
<a class="mainlink" href="/favorites/{{ $favorite->playlist }}">
<img src="https://png.pngtree.com/thumb_back/fw800/background/20190221/ourmid/pngtree-fluid-laser-gradient-abstract-pattern-image_23350.jpg" width="200" height="300" alt="">
<span>{{ $favorite->playlist }}</span>
<div class="f-rate" style="color:red; padding-left:10%;">{{$user->name}}</div>
</a>

@endforeach

</div>

@endsection
