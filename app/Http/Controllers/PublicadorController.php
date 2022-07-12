<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicador;

class PublicadorController extends Controller
{
      public function getAllPublicador() {
        // logic to get all students goes here
        $publicador = Publicador::get()->toJson(JSON_PRETTY_PRINT);
        return response($publicador, 200);
      }
  
      public function createPublicador(Request $request) {
        // logic to create a student record goes here
        $publicador = new Publicador;
        $publicador->nome = $request->nome;
        $publicador->morada = $request->morada;
        $publicador->telefone = $request->telefone;
        $publicador->email = $request->email;
        $publicador->recebido = $request->recebido;
        $publicador->devolver = $request->devolver;
        $publicador->territorio_id = $request->territorio_id;
        $publicador->grupo_id = $request->grupo_id; 
        $publicador->save();

        return response()->json([
          "message" => "Publicador criado com sucesso"
        ], 201);
      }
  
      public function getPublicador($id) {
        // logic to get a student record goes here
        if (Publicador::where('id', $id)->exists()) {
          $publicador = Publicador::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($publicador, 200);
        } else {
          return response()->json([
            "message" => "Publicador não encontrado"
          ], 404);
        }
      }
  
      public function updatePublicador(Request $request, $id) {
        // logic to update a student record goes here
        if (Publicador::where('id', $id)->exists()) {
          $publicador = Publicador::find($id);
          $publicador->nome = is_null($request->nome) ? $publicador->nome : $request->nome;
          $publicador->morada = is_null($request->morada) ? $publicador->morada : $request->morada;
          $publicador->telefone = is_null($request->telefone) ? $publicador->telefone : $request->telefone;
          $publicador->email = is_null($request->email) ? $publicador->email : $request->email;
          $publicador->recebido = is_null($request->recebido) ? $publicador->recebido : $request->recebido;
          $publicador->devolver = is_null($request->devolver) ? $publicador->devolver : $request->devolver;
          $publicador->territorio_id = is_null($request->territorio_id) ? $publicador->territorio_id : $request->territorio_id;
          $publicador->grupo_id = is_null($request->grupo_id) ? $publicador->grupo_id : $request->grupo_id; 
          $publicador->save();
  
          return response()->json([
              "message" => "Publicador salvo com sucesso"
          ], 200);

          } else {
          return response()->json([
              "message" => "Publicador não encontrado"
          ], 404);    
        }
      }
  
      public function deletePublicador($id) {
        // logic to delete a student record goes here
          if(Publicador::where('id', $id)->exists()) {
            $publicador = Publicador::find($id);
            $publicador->delete();
    
            return response()->json([
              "message" => "Publicador deletado com sucesso"
            ], 202);
          } else {
            return response()->json([
              "message" => "Publicador não encontrado"
            ], 404);
          }
      }
}
