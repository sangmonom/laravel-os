<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Item;
use App\Brand;
use App\Subcategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $brands=Brand::all();
        $subcategories=Subcategory::all();
        return view('backend.items.create',compact('brands','subcategories'));
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
            'codeno' => 'required|string',
            'name' => 'required|string',
            'photo' => 'required|mimes:jpeg,bmp,png',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'description' => 'required|string',
            'brand'=>'required',
            'subcategory'=>'required',
        ]);

        //File Upload
        $imageName=time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backendtemplate/itemimg'),$imageName);

        $myfile='backendtemplate/itemimg/'.$imageName;

        //Store Data this is column name item->codeno==model name
        $item=new Item;
        $item->codeno=$request->codeno;//input name
        $item->name=$request->name;
        $item->photo=$myfile;
        $item->price=$request->price;
        $item->discount=$request->discount;
        $item->description=$request->description;
        $item->brand_id=$request->brand;
        $item->subcategory_id=$request->subcategory;

        $item->save();

        //Redirect
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::find($id);//obj
        return view('backend.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands=Brand::all();
        $subcategories=Subcategory::all();
        $item=Item::find($id);
        //dd($item);
        return view('backend.items.edit',compact('item','brands','subcategories'));
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
        'codeno' => 'required|string',
        'name' => 'required|string',
        'photo' => 'nullable|sometimes|image',
        'price' => 'required',
        'discount' => 'required',
        'description' => 'required',
        'brand' => 'required',
        'subcategory' => 'required',
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
            $request->photo->move(public_path('backendtemplate/itemimg'), $imageName);
            $myfile='backendtemplate/itemimg/'.$imageName;
          }

        }




        //File Upload
        //$imageName=time().'.'.$request->photo->extension();

        //$request->photo->move(public_path('backendtemplate/itemimg'),$imageName);

        //$myfile='backendtemplate/itemimg/'.$imageName;
        //if upload new image,delete old image

        //Update Data this is column name item->codeno==model name
        $item=Item::find($id);
        $item->codeno=$request->codeno;//input name
        $item->name=$request->name;
        $item->photo=$myfile;
        $item->price=$request->price;
        $item->discount=$request->discount;
        $item->description=$request->description;
        $item->brand_id=$request->brand;
        $item->subcategory_id=$request->subcategory;

        $item->save();

        //Redirect
        return redirect()->route('items.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        //delete related file from storage
        $item->delete();
        return redirect()->route('items.index');
    }
}
