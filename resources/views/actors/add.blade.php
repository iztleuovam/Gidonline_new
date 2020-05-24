<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>ГидОнлайн - Добавление актера</title>
  </head>
  <body style="background-color: #000;">


<div class="container my-5 justify-content-center" style="background-color: #111;">
            <div class="container col-sm-8 offset-sm-2">
              <br>
                <h1 class="mb-3" style="color:#dadada;">ГидОнлайн - Добавление актера</h1>
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

                    <form method="post" action="{{ route('actor.add') }}">
                        @csrf
                        <div class="form-group">
                            <label class="text-secondary" for="responsibilities">Имя:</label>
                            <input type="text" class="form-control" name="name" style="background-color: #333; color: #dadada;"/>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary" for="requirements">Рейтнг (0-10):</label>
                            <input type="number" class="form-control" name="rating" style="background-color: #333; color: #dadada;"/>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-dark">Добавить актера</button>
                        <br>
                        <br>
                    </form>
                </div>
            </div>

    </div>
  </body>
</html>
