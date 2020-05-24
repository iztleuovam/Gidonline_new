<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>ГидОнлайн - Обновление фильма</title>
  </head>
  <body style="background-color: #000;">


<div class="container my-5 justify-content-center" style="background-color: #111;">
            <div class="container col-sm-8 offset-sm-2">
              <br>
                <h1 class="mb-3" style="color:#dadada;">ГидОнлайн - обновление фильма</h1>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <form method="post" action="{{ route('film.edit', $film->id) }}">
                      @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-9 mb-4">
                                <label class="text-secondary" for="title">Название:</label>
                                <input type="text" class="form-control" name="name" style="background-color: #333; color: #dadada;" value="{{$film->name}}"/>
                            </div>

                            <div class="col-md-3 mb-4">
                                <label class="text-secondary" for="position">Год:</label>
                                <input type="number" class="form-control" name="year" style="background-color: #333; color: #dadada;" value="{{$film->year}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-secondary" for="responsibilities">Страна:</label>
                            <input type="text" class="form-control" name="country" style="background-color: #333; color: #dadada;" value="{{$film->country}}"/>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="requirements">Длительность (мин):</label>
                            <input type="text" class="form-control" name="duration" style="background-color: #333; color: #dadada;" value="{{$film->duration}}"/>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="terms">Режиссер:</label>
                            <input type="text" class="form-control" name="director" style="background-color: #333; color: #dadada;" value="{{$film->director}}"/>
                        </div>

                        <div class="form-group">
                            <label class="text-secondary" for="min_salary">Описание фильма:</label>
                            <textarea class="form-control" name="description" id="description" rows="5" style="background-color: #333; color: #dadada;">{{$film->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="max_salary">Ссылка на картинку:</label>
                            <input type="text" class="form-control" name="image" style="background-color: #333; color: #dadada;" value="{{$film->image}}"/>
                        </div>

                        <div class="form-group">
                            <label class="text-secondary" for="skills">Рейтинг (0-10):</label>
                            <input type="number" class="form-control" name="stars" style="background-color: #333; color: #dadada;" value="{{$film->stars}}"/>
                        </div>

                        <div class="form-group">
                            <label class="text-secondary" for="video" style="color: #dadada;">Ссылка на видео:</label>
                            <input type="text" class="form-control" id="video" name="video" style="background-color: #333; color: #dadada;" value="{{$film->video}}"/>
                        </div>
                        <div class="row" style="background-color: #333;">
                          @foreach($genres as $genre)
                            <div class="col-md-4">
                            <div class="form-group">
                              @if($genre->films->contains($film->id))
                              <input type="checkbox" id="genre" name="genres[]" value="{{$genre->id}}" checked>
                              @else
                              <input type="checkbox" id="genre" name="genres[]" value="{{$genre->id}}">
                              @endif
                              <label for="genre" style="color: #dadada"> {{$genre->name}}</label><br>
                            </div>
                            </div>
                          @endforeach
                      </div>

                        <div class="row" style="background-color: #333;">


                        <div class="form-group">
                          <label for="actors" style="color: #dadada; margin-left: 15px; margin-right:15px;">Выберите актеров (зажимая ctrl):</label>
                          <select id="actors" name="actors[]" multiple style="background-color: #333; color: #dadada; width:300px;">
                          @foreach($actors as $actor)
                          @if($actor->films->contains($film->id))
                              <option selected value="{{$actor->id}}">{{$actor->name}}</option>
                          @else
                              <option value="{{$actor->id}}">{{$actor->name}}</option>
                          @endif
                          @endforeach
                          </select>
                        </div>
                        </div>
                        <hr>

                        <br>
                        <button type="submit" class="btn btn-dark">Обновить фильм</button>
                        <br><br>
                    </form>
                </div>
            </div>

    </div>
  </body>
</html>
