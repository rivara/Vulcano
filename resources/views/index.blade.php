<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>   
        <div class="container m-2">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                    <div class="w-100 mt-2 mr-5">  
                            <a href="{{ route('create') }}" class="btn btn-success" style="float:right">+</a>
                        </div> 
                            <h5 class="card-header">Laravel</h5>
                            
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">summary</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leads as $lead)
                                            <tr>
                                            <td> {{$lead->id}} <td>
                                            <td> {{$lead->title}} <td>
                                            <td> {{$lead->body}} <td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>

            {{ $leads->render() }}
            </div>   
        </div>
    </body>

</html>
