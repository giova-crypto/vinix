<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Pet;

class FunctionsController extends Controller
{
    public function show($status)
    {
        $pets = Pet::where('status','=',$status)->get();

        if($pets->isEmpty()){
            return response()->json([
                'status'=>Response::HTTP_NOT_FOUND ,
                'type'=>Response::$statusTexts[Response::HTTP_NOT_FOUND ],
                'description'=> 'Pet Not Found.'
            ]);
        }else{
            return response()->json([
                'status'=>Response::HTTP_OK ,
                'type'=>Response::$statusTexts[Response::HTTP_OK ],
                'pet'=>$pets
            ]);
        }
        
    }
}
