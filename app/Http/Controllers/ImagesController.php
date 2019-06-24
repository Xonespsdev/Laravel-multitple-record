<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    protected $uploadPath = '/images/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Images::all();
        return view('images.index',compact('images'));
    }

// Save Image function
    public function SaveImage(Request $request)
    {
        $this->validate($request, [
            'image'=>'max:3000|mimes:jpeg,png,jpg,docx,pdf',
        ]);
        $file = $request->file('image');
        $fileExt = strtolower($file->getClientOriginalExtension());
        $imgOriginalName = $file->getClientOriginalName();
        $img_filename = md5($imgOriginalName) . microtime() . '_uploaded.' . $fileExt;
        $location = public_path($this->uploadPath);
        $file->move($location, $img_filename);

        $save = new Images;
        $save->image = $img_filename;
        $save->save();

        return redirect('/image')->with('success', 'Saved successfully!');

    }

    public function EditImage($id)
    {
      $imageEdit=Images::find($id);
      return view('images.edit',compact('imageEdit'));

  }   


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        // Update Image function
        public function UpdateImage(Request $request, $id)
        {
            $this->validate($request, [
                'image'=>'max:3000|mimes:jpeg,png,jpg',
            ]);

             $update =Images::find($id);
            if(!isset($update))
                return back();
            if($file= $request->hasFile('image')){
                $file = $request->file('image');
                $path =public_path($this->uploadPath);
                $getimageName = time().'.'.$file->getClientOriginalExtension();
                try {
                    unlink(public_path($this->uploadPath) . $update->image);

                }catch (\Exception $e){            
                }
                $file->move($path, $getimageName);
                $update->image=$getimageName;
                $update->save();
            }

            return redirect('/image')->with('success', 'Saved successfully!');

        }
        // Delete Image function
        public function DeleteImage($id)
        {
         $delete = Images::find($id);
         unlink(public_path($this->uploadPath) . $delete->image);
         $delete->delete();
         return back();
     }
 }
