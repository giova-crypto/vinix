<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Tag;
use App\Models\Category;


class PetsController extends Controller
{
    public function home()
    {
        $pets = Pet::all();

        return view('welcome',compact('pets'));
    }

    public function show($id)
    {
        $pet = Pet::find($id);

        return view('pets.show',compact('pet'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('create',compact('categories','tags'));
    }

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

        if($saved){
            notify()->success('Pet created successfully.');
        }else{
            notify()->error('Pet cannot be created.');
        }

        return back();
    }
}
