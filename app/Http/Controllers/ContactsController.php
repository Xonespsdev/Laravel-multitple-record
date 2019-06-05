<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;
use File;

class ContactsController extends Controller
{
    protected $uploadPath = '/images/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::orderBy('id', 'desc')->paginate(10);
        return view('index', compact("contacts"));
    }

    public function add()
    {
        return view('insert');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('insert');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

// Loop Save Contacts
    public function Save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'image'=>'max:3000|mimes:jpeg,png,jpg',
            'record'=>'required'
        ]);

        $record=$request->record;
        // $file = $request->file('image');
        // $fileExt = strtolower($file->getClientOriginalExtension());
        // $imgOriginalName = $file->getClientOriginalName();
        // $img_filename = md5($imgOriginalName) . microtime() . '_uploaded.' . $fileExt;
        // $location = public_path($this->uploadPath);
        // $file->move($location, $img_filename);

        for ($i=0;$i<$record;$i++){
            $save = new Contacts;
            // if($i > 0){
            //     File::copy($location.$img_filename, $location . $i . '-' . $img_filename);
            // }
            $save->name = $request->name;
            $save->lastname = $request->lastname;
            $save->gender = $request->gender;
            $save->age = $request->age;
            $save->phone = $request->phone;
            $save->address = $request->address;
            $save->image = 'abcd';
            $save->save();
        }


        return redirect('/')->with('success', 'Saved successfully!');
    }
    public function ContactEdit($id){
        $contactEdit = Contacts::find($id);
        return view('edit',compact('contactEdit'));
    }

// Loop Update Contacts
    public function ContactUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'record'=>'required'
        ]);
        $record=$request->record;
        $all = Contacts::all();
        if($all->count() >= $record && $record > 0){
           for ($i=0; $i < $record;$i++){
                $update = $all[$i];
                $update->name = $request->name;
                $update->lastname = $request->lastname;
                $update->gender = $request->gender;
                $update->age = $request->age;
                $update->phone = $request->phone;
                $update->address = $request->address;
                $update->save();
            }
        }
        return redirect('/')->with('success', 'Saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    // Delete Contacts
    public function ContactDelete( $id)
    {
        $delete = Contacts::where('name',$id);
        $delete->delete();
        return back();
    }
}
