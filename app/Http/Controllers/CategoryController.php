<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
//use App\Item;
use App\Category;
//use App\Subcategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //$brands=Brand::all();
        //$subcategories=Subcategory::all();
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);//print output
        //Validation
        $request->validate([
            'name' => 'required|string',
            'photo' => 'required|mimes:jpeg,bmp,png',
            ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backendtemplate/categoryimg'),$imageName);

        $myfile='backendtemplate/categoryimg/'.$imageName;

        //Store Data this is column name item->codeno==model name
        $category=new Category;
        $category->name=$request->name;
        $category->photo=$myfile;
        $category->save();

        //Redirect
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        //dd($item);
        return view('backend.categories.edit',compact('category'));
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //dd($request);//print output
        //Validation
        $request->validate([
        'name' => 'required|string',
        'photo' => 'nullable|sometimes|image',
        ]);

        //File Upload
        
        $myfile =$request->old_photo_path;
        //dd($myfile);
        
        if ($request->hasfile('photo')) 
        {
          $imageName = time().'.'.$request->photo->extension(); 
          $name=$request->old_photo_path; 

          // dd($name);
     
          if (file_exists(public_path($name)))
          {
            @unlink(public_path($name));
            $request->photo->move(public_path('backendtemplate/categoryimg'), $imageName);
            $myfile='backendtemplate/categoryimg/'.$imageName;
          }

        }




        //File Upload
        //$imageName=time().'.'.$request->photo->extension();

        //$request->photo->move(public_path('backendtemplate/itemimg'),$imageName);

        //$myfile='backendtemplate/itemimg/'.$imageName;
        //if upload new image,delete old image

        //Update Data this is column name item->codeno==model name
        $category=Category::find($id);
        $category->name=$request->name;
        $category->photo=$myfile;
        $category->save();

        //Redirect
        return redirect()->route('categories.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        //delete related file from storage
        $category->delete();
        return redirect()->route('categories.index');
    }
}
