<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    @yield('title')
  </head>
  <body>
      <div id="headerline">
        <a class="logo" href="/">
          <img src="{{ URL::to('/') }}/images/logo.png" alt="">
          <div id="srch">
            <form method="get" name="searchform" id="searchform" action="/">
              <input type="text" name="search" id="search" class="srch_query" placeholder="Название фильма...">
              <input id="btnSearch" type="submit" name="submit" value="Поиск">
            </form>
          </div>
        </a>
      </div>
      <div id="container">
      <div id="header"></div>
        <div id="topls">
          @foreach($topfilms as $topfilm)
          <a href="/film/{{$topfilm->id}}" class="toplink">
            <img src="{{$topfilm->image}}" width="120" height="170" alt="">
            {{$topfilm->name}}
          </a>
          @endforeach
        </div>
        <div id="catline">
          <ul>
            @foreach($genres as $genre)
              <li>
                <a href="/genre/{{ $genre->code }}">{{ Str::upper($genre->name) }}</a>
              </li>
            @endforeach
          </ul>
        </div>

        <div id="infoline">
        <a rel="nofollow" class="rat noLogin" href="/favorites"><img src="{{ URL::to('/') }}/images/rating_on.png" title="Моё избранное" alt=""></a>
        <div id="inls">
          <img id="lin" src="{{ URL::to('/') }}/images/lin.png" alt="">новое на сайте
        </div>
        </div>

        <div id="main">
          @yield('main')
        </div>

       <div id="side">
         @guest
         @if(session()->get('admin')!= null)
         <a id="reg_button" rel="nofollow" href="/film-add"><span style="">ФИЛЬМ</span></a>
         <a id="in_button" rel="nofollow" href="/actor-add"><span style="">АКТЕР</span></a>
         <a id="faq_button_nr" rel="nofollow" href="/admin-logout/"><span>?</span></a>
         @else
          <a id="reg_button" rel="nofollow" href="/register"><span style="">РЕГИСТРАЦИЯ</span></a>
          <a id="in_button" rel="nofollow" href="/login"><span style="">ВХОД</span></a>
          <a id="faq_button_nr" rel="nofollow" href="/admin-login"><span>?</span></a>
          @endif
        @endguest
        @auth
        <a id="logout_button" rel="nofollow" href="/logout"><span style="">ВЫЙТИ</span></a>
        @endauth

        <div class="sbin" style="height:669px;">

        <a class="chie" href="/advise/">Случайные фильмы <img src="/im/arr-r.png" alt=""></a>
        <div class="mna">
          @foreach($randfilms as $randfilm)
          <a class="sblink" href="/film/{{$randfilm->id}}"><img src="{{$randfilm->image}}" width="113" height="165" alt="">{{$randfilm->name}}</a>
          @endforeach
        </div>

        </div>

        <div class="sbin" style="height:696px;margin-top:4px">

        <a class="chie" href="/advise-serials/">Рекомендуемые фильмы <img src="/im/arr-r.png" alt=""></a>
        <div class="mna">
          @foreach($topside as $randfilm)
          <a class="sblink" href="/film/{{$randfilm->id}}"><img src="{{$randfilm->image}}" width="113" height="165" alt="">{{$randfilm->name}}</a>
          @endforeach
        </div>

      </div>
    </div>

    <div id="footer">©&nbsp;<div id="fleft"><a id="link" href="/">ГидОнлайн</a> - Твой гид в мире кино!</div><div id="fright"><a href="/login">Войти</a> ♦ <a rel="nofollow" href="/admin-login">Администратору</a> ♦ <a rel="nofollow" href="/register">Зарегистрироваться</a></div></div>
    </div>



  </body>
</html>
