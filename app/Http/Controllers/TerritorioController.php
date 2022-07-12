<?php

namespace App\Http\Controllers;

use App\Models\Territorio;
use Illuminate\Http\Request;

class TerritorioController extends Controller
{
      public function getAllTerritorio() {
        // logic to get all students goes here
        $territorio = Territorio::get()->toJson(JSON_PRETTY_PRINT);
        return response($territorio, 200);
      }
  
      public function createTerritorio(Request $request) {
        // logic to create a student record goes here
        $territorio = new Territorio();
        $territorio->numero = $request->numero;
        $territorio->tipo = $request->tipo;
        $territorio->anexo = $request->anexo;
        $territorio->save();

        return response()->json([
          "message" => "Territorio criado com sucesso"
        ], 201);
      }
  
      public function getTerritorio($id) {
        // logic to get a student record goes here
        if (Territorio::where('id', $id)->exists()) {
          $territorio = Territorio::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($territorio, 200);
        } else {
          return response()->json([
            "message" => "Territorio não encontrado"
          ], 404);
        }
      }
  
      public function updateTerritorio(Request $request, $id) {
        // logic to update a student record goes here
        if (Territorio::where('id', $id)->exists()) {
          $territorio = Territorio::find($id);
          $territorio->numero = is_null($request->numero) ? $territorio->numero : $request->numero;
          $territorio->tipo = is_null($request->tipo) ? $territorio->tipo : $request->tipo;
          $territorio->anexo = is_null($request->anexo) ? $territorio->anexo : $request->anexo;
          $territorio->save();
  
          return response()->json([
              "message" => "Territorio salvo com sucesso"
          ], 200);

          } else {
          return response()->json([
              "message" => "Territorio não encontrado"
          ], 404);    
        }
      }
  
      public function deleteTerritorio($id) {
        // logic to delete a student record goes here
        if(Territorio::where('id', $id)->exists()) {
          $territorio = Territorio::find($id);
          $territorio->delete();
  
          return response()->json([
            "message" => "Territorio deletado com sucesso"
          ], 202);
        } else {
          return response()->json([
            "message" => "Territorio não encontrado"
          ], 404);
        }
      }
}
