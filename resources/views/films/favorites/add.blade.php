<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>ГидОнлайн - Добавление в плейлист</title>
  </head>
  <body style="background-color: #000;">
  <div class="container" style="margin-top: 120px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card" style="background-color: #333;">
                <div class="card-header" style="background-color: #111;color: #dadada;">
                  <img src="{{ URL::to('/') }}/images/logo.png" style="display: block; margin: 0 auto;"alt="">
                </div>

                <div class="card-body" style="background-color: #181818;">

                    <form method="POST" action="/favorite-add/{{$film_id}}/{{$user_id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="playlist" class="col-md-4 col-form-label text-md-right" style="color: #dadada;">Плейлист</label>

                            <div class="col-md-6">
                                <input id="playlist" type="text" class="form-control" name="playlist" list="playlists" style="background-color: #333; color: #eee;">
                                <datalist id="playlists">
                                @foreach($playlists as $playlist)
                                <option value="{{$playlist->playlist}}">
                                @endforeach
                                </datalist>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">Добавить</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>