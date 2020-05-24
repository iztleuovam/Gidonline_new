@extends('layouts.app')
@section('title')
<title>ГидОнлайн - Твой гид в мире кино!</title>
@endsection
@section('main')
  <div id="posts">
    @foreach($films as $film)
    <a class="mainlink" href="/film/{{$film->id}}">
      <img src="{{$film->image}}" width="200" height="300" alt="">
      <span>{{$film->name}}</span><div class="f-rate">
        @for($i = 1; $i <= 10; $i++)

          @if($i <= $film->stars)
            <img src="{{ URL::to('/') }}/images/rating_on.png" alt="2 votes, average: 6.50 out of 10" class="post-ratings-image">
          @else
            <img src="{{ URL::to('/') }}/images/rating_off.png" alt="2 votes, average: 6.50 out of 10" class="post-ratings-image">
          @endif
        @endfor
      </div>
      <div class="mqn">{{$film->year}}</div>
    </a>
    @endforeach
    <div style="clear:both"></div>
  </div>
 <div id="page_navi">
   <div class="wp-pagenavi">
    @for($i = 1; $i <= 10; $i++)
    @if(app('request')->input('page') == $i)
      <span class="current">{{$i}}</span>
    @else
    <a href="?page={{$i}}" class="page larger">{{$i}}</a>
    @endif
    @endfor
    <span class="extend">...</span>
    <a href="?page=1" class="nextpostslink">Следующая</a>
    <a href="?page=1000" class="last">◊</a>
    </div>
  </div>
@endsection
