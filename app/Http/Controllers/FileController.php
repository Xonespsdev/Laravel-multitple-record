<?php
namespace App\Http\Controllers;
use App\File;
use Illuminate\Http\Request;
class FileController extends Controller
{
    protected $uploadPath = '/files/';
    public function Index(Request $request)
    {
        $files = File::all();
        return view('file.index', compact('files'));
    }
    public function Save(Request $request)
    {
        $this->validate($request, [
            'file' => 'max:3000|mimes:pdf,doc,docx,xlsx,pptx,xls,xlsx',
        ]);
        $file = $request->file('file');
        $fileExt = strtolower($file->getClientOriginalExtension());
        $imgOriginalName = $file->getClientOriginalName();
        $img_filename = md5(uniqid('upload_file', true)) . '_uploaded.' . $fileExt;
        $location = public_path($this->uploadPath);
        $file->move($location, $img_filename);
        
        $fileUpload = new File();
        $fileUpload->name = $imgOriginalName;
        $fileUpload->url = $img_filename;
        $fileUpload->save();
        return redirect('/file')->with('success', 'Saved successfully!');
    }
    public function Edit(Request $request, $id)
    {
        $file = File::findOrFail($id);
        return view('file.edit', compact('file'));
    }
    public function Update(Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'max:3000|mimes:pdf,doc,docx,xlsx,pptx,xls,xlsx',
        ]);
        $fileModel = File::findOrFail($id);
        if (!isset($fileModel)) {
            return back();
        }
        $file = $request->file('file');
        $path = public_path($this->uploadPath);
        $fileExt = strtolower($file->getClientOriginalExtension());
        $imgOriginalName = $file->getClientOriginalName();
        $file_name = md5(uniqid('upload_file', true)) . '_uploaded.' . $fileExt;
        try {
            unlink(public_path($this->uploadPath) . $fileModel->url);
        } catch (\Exception $e) {
        }
        $file->move($path, $file_name);
        $fileModel->name = $imgOriginalName;
        $fileModel->url = $file_name;
        $fileModel->save();
        return redirect('/file')->with('success', 'Saved successfully!');
    }
    public function Delete(Request $request, $id)
    {
        $fileModel = File::findOrFail($id);
        try {
            unlink(public_path($this->uploadPath) . $fileModel->url);
        } catch (\Exception $e) {
        }
        $fileModel->delete();
        return back();
    }
}