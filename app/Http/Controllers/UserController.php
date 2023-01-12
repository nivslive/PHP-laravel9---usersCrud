<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():Array
    {
        return DB::select('SELECT id, name, email, privilege FROM users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function privilege(Request $request) {
      try { 
        DB::table('users')
          ->where('id',  '=' , $request->id )
          ->update([
            'privilege' => $request->privilege, 
          ]);
        return response()->json('Dado atualizado!', 200);
      } catch(\Illuminate\Database\QueryException $ex){ 
        return response()->json('Erro ao atualizar o usuário. Possivelmente ele não existe', 400);
      }
    }
    public function email(Request $request) {
      try { 
        DB::table('users')
          ->where('id',  '=' , $request->id )
          ->update([
            'email' => $request->email, 
          ]);
        return response('Dado atualizado!', 200);
      } catch(\Illuminate\Database\QueryException $ex){ 
        return response('Erro ao atualizar o usuário. Possivelmente ele não existe', 400);
      }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request): Response
    {         
      try { 
          DB::table('users')->where('id', $request->id)->get(); response('Dado atualizado!', 200);
          return response()->json('Dado atualizado!', 200);
        } catch(\Illuminate\Database\QueryException $ex){ 
        return response()->json('Erro ao atualizar o usuário. Possivelmente ele não existe', 400);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        try { 
            DB::table('users')
              ->where('id',  '=' , $request->id )
              ->update([
                'privilege' => $request->privilege,
                'email' => $request->email, 
                'name' => $request->name, 
              ]);
            return response('Dado atualizado!', 200);
          } catch(\Illuminate\Database\QueryException $ex){ 
            return response('Erro ao atualizar o usuário. Possivelmente ele não existe', 400);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        return DB::table('users')->delete($request->id);
    }
}
