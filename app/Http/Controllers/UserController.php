<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Exception;


class UserController extends Controller
{

  
  
    public function create(){
      return view("create");
    }

    /**
       * @OA\Get(
       *    path="/",
       *    tags={"Clients"},
       *    summary="Get list of clients",
       *    description="Get list of clients",
       *   @OA\RequestBody(
       *         required=true,
       *         @OA\JsonContent(
       *            @OA\Property(property="userId", type="string", format="string", example="Test Article Title"),
       *            @OA\Property(property="id", type="string", format="string", example="This is a description for kodementor"),
       *            @OA\Property(property="title", type="string", format="string", example="Published"),
       *         ),
       *      ),
       *     @OA\Response(
       *          response=200, description="Success",
       *          @OA\JsonContent(
       *             @OA\Property(property="status", type="integer", example="200"),
       *             @OA\Property(property="data",type="object")
       *          )
       *       )
       *  )
       */
  
    public function show()
    {
      {
        try {
            
            $clients = Http::get('https://jsonplaceholder.typicode.com/posts');
            //alimento modelo con los datos del JSON
            $clients = $clients->object();
            
            //Alimento modelo con los datos del JSON
            //Control de llenadp
            if (clients::all()->isEmpty()) {
              foreach ($clients as  $cli) {
                $clients = new Clients;
                $clients->id = $cli->id;
                $clients->title = $cli->title;
                $clients->body = $cli->summary;
                $clients->userId = $cli->userId;
                $clients->save();
              }
            }
         
            $cli=DB::table('clients')->paginate(5);
            //Devuelvo el modelo paginao
            return view("index", ['leads' => $cli]);
           // return response()->json(['status' => 200, 'data' => $clients]);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
  }
  
  
  
        /**
       * @OA\Post(
       *      path="/",
       *      operationId="store",
       *      tags={"Clients"},
       *      summary="Store clients in DB",
       *      description="Store client in DB",
       *      @OA\RequestBody(
       *         required=true,
       *         @OA\JsonContent(
       *            required={"userId", "title", "status"},
       *            @OA\Property(property="userId", type="string", format="string", example="Test Book Title"),
       *            @OA\Property(property="body", type="string", format="string", example="This is a description for kodementor"),
       *            @OA\Property(property="title", type="string", format="string", example="Published"),
  
       *         ),
       *      ),
       *     @OA\Response(
       *          response=200, description="Success",
       *          @OA\JsonContent(
       *             @OA\Property(property="status", type="integer", example=""),
       *             @OA\Property(property="data",type="object")
       *          )
       *       )
       *  )
       */
      public function store(Request $request)
      {
          try {
             // This commented code records what was received from the post sending in the database.
              //$client = Clients::create($request->only('id', 'userId', 'title','summary')); 
              //return response()->json(['status' => 201,'data' => $client]);
              return response()->json(['status' => 201]);
          } catch (Exception $e) {
              DB::rollBack();
              return response()->json(['status' => 400, 'message' => $e->getMessage()]);
          }
      }
  
}
