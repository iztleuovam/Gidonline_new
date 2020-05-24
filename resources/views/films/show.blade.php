@extends('layouts.app')
@section('title')
<title>{{$film->name}} - смотреть онлайн бесплатно в хорошем качестве</title>
@endsection
@section('main')
<div id="face" itemscope="" itemtype="http://schema.org/Movie">
  	 <div id="single">
	      <img class="t-img" src="{{$film->image}}" width="200" height="300" alt="Под водой" itemprop="image">

         <div class="t-row">
           <div class="r-1"><div class="rl-1">название</div><div class="rl-2"><h1 itemprop="name">{{$film->name}}</h1></div></div>
           <div class="r-2"><div class="rl-1">год</div><div class="rl-2" itemprop="dateCreated">{{$film->year}}</div></div>
           <div class="r-1"><div class="rl-1">страна</div><div class="rl-2">{{$film->country}}</div></div>
           <div class="r-2"><div class="rl-1">жанр</div><div class="rl-2" itemprop="genre">
             @foreach($film->genres as $genre)
               <a href="/genre/{{$genre->code}}/" rel="tag">{{$genre->name}}</a>,
             @endforeach
             </div>
           </div>
           <div class="r-1"><div class="rl-1">время</div><div class="rl-2">{{$film->duration}} мин</div></div>
           <div class="r-2"><div class="rl-1">просмотр</div><div class="rl-2">
           дублированный, 16+
                      </div></div>
                      <div class="r-1" style="margin-bottom:7px">
                        <div class="rl-1">в главных ролях</div>
                        <div class="rl-2">
                          @foreach($film->actors as $actor)
                          <a href="/actor/{{$actor->id}}/" rel="tag">{{$actor->name}}</a>,
                          @endforeach
                        </div>
                      </div>
                    </div>
         <div style="clear:both"></div>
             <script type="text/javascript">jQuery(document).ready(function(){jQuery('.infotext').each(textmore('.infotext',6,500,18));});</script>
      	     <div class="description">
<div id="icoblock">
 <script type="text/javascript">
   function BgFade() {
    document.getElementById('addf').style.background = '#222';
    document.getElementById('addf').style.transition = '1s';
   }
     function BgFadeIn() {
    document.getElementById('addf').style.background = '#333';
   }
       function BgFadeOut() {
    document.getElementById('addf').style.background = '#222';
    document.getElementById('addf').style.transition = '0.1s';
   }

 </script>
  <script type="text/javascript">
   function BgFade11() {
    document.getElementById('addf11').style.background = '#222';
    document.getElementById('addf11').style.transition = '1s';
   }
     function BgFadeIn11() {
    document.getElementById('addf11').style.background = '#333';
   }
       function BgFadeOut11() {
    document.getElementById('addf11').style.background = '#222';
    document.getElementById('addf11').style.transition = '0.1s';
   }

 </script>
          <a id="addf11" href="javascript:;" onclick="alert('Чтобы отложить фильм на потом необходимо зарегистрироваться')"><span id="see_but_add"></span><span id="see_but_txt">На потом</span></a>

          <a id="addf" href="javascript:;" class="favorite_but" 
          @guest onclick="alert('Чтобы добавить фильм в избранное необходимо зарегистрироваться')" @endguest
          @auth onclick="location.href='/favorite/{{$film->id}}/{{Auth::user()->id}}'" @endauth>
          <span id="fav_but_add"></span><span id="fav_but_txt">Избранное</span></a>


</div>
         <div id="prr">Про фильм</div>
      		 <div class="infotext" itemprop="description" style="position: relative;"><div class="content-wrapper contracted" style="line-height: 18px; height: 108px;">
           <p>{{$film->description}}. <span class="gnv">© ГидОнлайн</span></p>
         </div><p class="more-link"><a class="more">Подробнее...</a></p></div>
             </div>
         <div id="goplay" onclick="alert('Для участия в рейтинге нужно зарегистрироваться')">
           <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
             <meta itemprop="bestRating" content="10"><meta itemprop="ratingValue" content="6.87">
             <meta itemprop="ratingCount" content="244">
             @for($i = 1; $i <= 10; $i++)
               @if($i <= $film->stars)
                 <img src="{{ URL::to('/') }}/images/rating_on.png" alt="2 votes, average: 6.50 out of 10" class="post-ratings-image">
               @else
                 <img src="{{ URL::to('/') }}/images/rating_off.png" alt="2 votes, average: 6.50 out of 10" class="post-ratings-image">
               @endif
             @endfor
             <div class="ratings-score">Рейтинг фильма: {{$film->stars}}</div>
             <div class="ratings-users">Всего просмотров: {{$film->views}}</div></div></div>
            <div class="tray">






             <iframe id="cdn-player" class="ifram"
             src="{{$film->video}}"
             frameborder="0" scrolling="no" allowfullscreen=""></iframe>

             </div>

</div>

           <div id="comments">
          <div class="znt com">Комментарии</div>

@guest
@if(session()->get('admin')!= null)
<div id="ct-reg"><p><img src="{{ URL::to('/') }}/images/popcorm1.gif" alt=""> Вы хотите обновить/удалить этот фильм?
  <img src="{{ URL::to('/') }}/images/declare.gif" alt=""><br> <a href="/film-delete/{{$film->id}}">Удалить</a>  / <a href="/film-edit/{{$film->id}}">Обновить</a></p>
</div>
@else
<div id="ct-reg"><p><img src="{{ URL::to('/') }}/images/popcorm1.gif" alt=""> Комментирование этого фильма доступно
  <img src="{{ URL::to('/') }}/images/declare.gif" alt=""><br> зарегистрированным пользователям </p>
</div>
@endif
@endguest
@auth
<div id="respond">
	 	<div class="respond-form clearfix">

      <form name="contact_form" action="/comment-add/{{$film->id}}/{{Auth::user()->id}}" method="post" id="comment-form">
        @csrf <!-- {{ csrf_field() }} -->
          <textarea name="body" id="comment" tabindex="2" cols="" rows="" onclick="document.getElementById('comment').style.backgroundImage='none';" onkeydown="limitText(this.form.comment,this.form.countdown,1000);" onkeyup="limitText(this.form.comment,this.form.countdown,1000);" maxlength="1001" style="background-image: none;"></textarea>
          <button type="submit" class="submit" name="submit">Отправить</button>
					<input readonly="" id="climit" type="text" name="countdown" size="4" value="1000">
			</form>
  	</div>
</div>
@endauth
<ul class="comment-list">
  @foreach($film->comments as $comment)
			<li class="comment byuser comment-author-osjulie even thread-even depth-1" itemprop="reviews" itemscope="" itemtype="//schema.org/Review">
  			<div class="comment clearfix">
  			  <div itemprop="author" itemscope="" itemtype="//schema.org/Person">
  				  <div class="ct-avatar right">
  				  				  <img style="height:70px;width:70px" src="{{ URL::to('/') }}/images/a-def1.jpg" alt="">
  				  </div>
  				  <span class="ct-author" itemprop="name">{{$comment->user->name}}</span>
  			  </div>
  				<div class="ct-text clearfix" id="comment-1121391" itemprop="reviewBody">
  					<p>{{$comment->body}}</p>

  				</div>
  			</div>
  	  </li>
		@endforeach
</ul>
<span style="position:absolute"><a rel="nofollow" class="pr_c noLogin" href="https://gidonline.io/film/pod-vodoj/comment-page-2/#comments"> </a></span><span style="position:absolute;right:18px"></span>           </div>

   </div>
@endsection
