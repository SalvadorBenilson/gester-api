<?php

namespace App\Http\Controllers;
use App\Models\Grupo;

use Illuminate\Http\Request;

class GrupoController extends Controller
{
      public function getAllGrupo() {

        // logic to get all students goes here
        $grupo = Grupo::get()->toJson(JSON_PRETTY_PRINT);
        return response($grupo, 200);

      }
  
      public function createGrupo(Request $request) {

        // logic to create a student record goes here
        $grupo = new Grupo;
        $grupo->numero = $request->numero;
        $grupo->quant_pub = $request->quant_pub;
        $grupo->sup = $request->sup;
        $grupo->aju = $request->aju;
        $grupo->tel_sup = $request->tel_sup;
        $grupo->tel_aju = $request->tel_aju;
        $grupo->territorio_id = $request->territorio_id;
        $grupo->save();

        return response()->json([
          "message" => "Grupo criado com sucesso"
        ], 201);

      }
  
      public function getGrupo($id) {
        // logic to get a student record goes here

        if (Grupo::where('id', $id)->exists()) {
          $grupo = Grupo::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($grupo, 200);
        } else {
          return response()->json([
            "message" => "Grupo não encontrado"
          ], 404);
        }

      }
  
      public function updateGrupo(Request $request, $id) {

        // logic to update a student record goes here
        if (Grupo::where('id', $id)->exists()) {
          $grupo = Grupo::find($id);
          $grupo->numero = is_null($request->numero) ? $grupo->numero : $request->numero;
          $grupo->quant_pub = is_null($request->quant_pub) ? $grupo->numero : $request->quant_pub;
          $grupo->sup = is_null($request->sup) ? $grupo->sup : $request->sup;
          $grupo->aju = is_null($request->aju) ? $grupo->aju : $request->aju;
          $grupo->tel_sup = is_null($request->tel_sup) ? $grupo->tel_sup : $request->tel_sup;
          $grupo->tel_aju = is_null($request->tel_aju) ? $grupo->tel_aju : $request->tel_aju;
          $grupo->territorio_id = $request->territorio_id;
          $grupo->save();
  
          return response()->json([
              "message" => "Grupo salvo com sucesso"
          ], 200);

          } else {
          return response()->json([
              "message" => "Grupo não encontrado"
          ], 404);    
        }

      }
  
      public function deleteGrupo($id) {
        // logic to delete a student record goes here
        if(Grupo::where('id', $id)->exists()) {
          $grupo = Grupo::find($id);
          $grupo->delete();
  
          return response()->json([
            "message" => "Grupo deletado com sucesso"
          ], 202);
        } else {
          return response()->json([
            "message" => "Grupo não encontrado"
          ], 404);
        }
      }
}
