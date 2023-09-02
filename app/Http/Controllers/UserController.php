<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Exception;


class UserController extends Controller
{
  public function create()
  {
    return view("create");
  }
  public function show()
  { {
      try {

        $clients = Http::get('https://jsonplaceholder.typicode.com/posts');
        //Feed the model with api values
        $clients = $clients->object();

        if (clients::all()->isEmpty()) {
          foreach ($clients as  $cli) {
            $clients = new Clients;
            $clients->id = $cli->id;
            $clients->title = $cli->title;
            $clients->summary = $cli->body;
            $clients->userId = $cli->userId;
            $clients->save();
          }
        }

        $cli = DB::table('clients')->paginate(5);
        //Return model paginate
        return view("index", ['leads' => $cli]);
      } catch (Exception $e) {
        return response()->json(['status' => 400, 'message' => $e->getMessage()]);
      }
    }
  }



  public function store(Request $request)
  {
    try {
      // This commented code records what was received from the post sending in the database.
      //$client = Clients::create($request->only('id', 'userId', 'title','summary')); 
      //return response()->json(['status' => 201,'data' => $client]);
      return response()->json(['status' => 200]);
    } catch (Exception $e) {
      DB::rollBack();
      return response()->json(['status' => 400, 'message' => $e->getMessage()]);
    }
  }
}
