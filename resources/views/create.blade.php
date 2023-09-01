<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>   
    
        <div class="container m-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="{{url('api/store')}}" method="post">
                    @csrf
                          <div class="form-group">
                              <label>Title</label>
                              <input type="text" class="form-control" id="title" name="title"  required>
                          </div>
                          <div class="form-group">
                              <label>Summary</label>
                              <textarea class="form-control" id="summary" name="summary" rows="3" required></textarea>
                          </div>
                          <div class="form-group pt-3">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </form>
                  </div>   
                </div>
          </div>
    </body>

</html>
