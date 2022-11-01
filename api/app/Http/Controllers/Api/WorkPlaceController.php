<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\WorkDay;
use App\Http\Controllers\Controller;

use App\Models\Estado;
use App\Models\Cidade;

class WorkPlaceController extends Controller
{
    public function getCities($id){
        
        $cidades = Cidade::where('estados_id',$id)->get();
        $answer = "";
        foreach ($cidades as $cidade) {
            $answer .= "<option value=". $cidade->id . ">" . $cidade->nome . "</option>";
        }
        return response()->json([$answer],200);
    }
}
