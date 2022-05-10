<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pet;
use App\Models\Tag;
use App\Models\Category;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * Laravel 9 REST API CRUD
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::all();

        if($pets->isEmpty()){
            return response()->json([
                'status'=>Response::HTTP_NOT_FOUND ,
                'type'=>Response::$statusTexts[Response::HTTP_NOT_FOUND ],
                'description'=>'Pets Not Found.'
            ]);
        }else{
            return response()->json([
                'status'=>Response::HTTP_OK,
                'type'=>Response::$statusTexts[Response::HTTP_OK],
                'pets' => $pets
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * Laravel 9 REST API CRUD
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'photoUrl'=>'required'
        ]);
        $pet = new Pet;

        $pet->name = $request->name;
        $pet->urlPhoto = $request->photoUrl;
        $pet->category_id = $request->category;
        $pet->status = $request->status;

        $saved = false;
        if($pet->save()){
            $saved=true;
        }

        $pet->tags()->attach($request->tags);

        if(!$saved){
            return response()->json([
                'status'=>Response::HTTP_NOT_FOUND ,
                'type'=>Response::$statusTexts[Response::HTTP_NOT_FOUND ],
                'description'=> 'Pet Not Found.'
            ]);
        }else{
            return response()->json([
                'status'=>Response::HTTP_OK ,
                'type'=>Response::$statusTexts[Response::HTTP_OK ],
                'pet'=>$pet
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pet = Pet::find($id);

        if($pet==null){
            return response()->json([
                'status'=>Response::HTTP_NOT_FOUND ,
                'type'=>Response::$statusTexts[Response::HTTP_NOT_FOUND ],
                'description'=> 'Pet Not Found.'
            ]);
        }else{
            return response()->json([
                'status'=>Response::HTTP_OK ,
                'type'=>Response::$statusTexts[Response::HTTP_OK ],
                'pet'=>$pet
            ]);
        }
        
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'photoUrl'=>'required',
            'category'=>'required',
            'status'=>'required'
        ]);
        
        $pet = Pet::find($id);

        if($pet==null){
            return response()->json([
                'status'=>Response::HTTP_NOT_FOUND ,
                'type'=>Response::$statusTexts[Response::HTTP_NOT_FOUND ],
                'description'=> 'Pet Not Found.'
            ]);
        }

        $pet->name = $request->name ? $request->name : $pet->name;
        $pet->urlPhoto = $request->photoUrl ? $request->photoUrl : $pet->urlPhoto;
        $pet->category_id = $request->category ? $request->category : $pet->category_id;
        $pet->status = $request->name ? $request->name : $pet->name;

        $saved = false;
        if($pet->save()){
            $saved=true;
        }

        $pet->tags()->attach($request->tags);

        if(!$saved){
            return response()->json([
                'status'=>Response::HTTP_BAD_REQUEST ,
                'type'=>Response::$statusTexts[Response::HTTP_BAD_REQUEST ],
                'description'=>'Invalid ID supplied.'
            ]);
        }else{
            return response()->json([
                'status'=>Response::HTTP_CREATED ,
                'type'=>Response::$statusTexts[Response::HTTP_CREATED ],
                'message' => 'Pet Updated Successfully.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);

        if($pet==null){
            return response()->json([
                'status'=>Response::HTTP_NOT_FOUND ,
                'type'=>Response::$statusTexts[Response::HTTP_NOT_FOUND ],
                'description'=> 'Pet Not Found.'
            ]);
        }

        if(!$pet->delete()){
            return response()->json([
                'status'=>Response::HTTP_BAD_REQUEST ,
                'type'=>Response::$statusTexts[Response::HTTP_BAD_REQUEST ],
                'description'=>'Invalid ID supplied.'
            ]);
        }else{
            return response()->json([
                'status'=>Response::HTTP_CREATED ,
                'type'=>Response::$statusTexts[Response::HTTP_CREATED ],
                'message' => 'Pet Deleted Successfully.'
            ]);
        }

    }
}
