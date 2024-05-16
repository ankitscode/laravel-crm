<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\crm;
use App\Models\User;
use App\Models\media;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\ImageManager;
use Intervention\Image\Filters\FilterInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{

  //function for retreiving data from database
  public function index()
  {
    $users = User::all();
    return view("dashboard.dashboard", compact('users'));
  }

  //function for delete
  public function delete($id)
  {
    user::find($id)->delete();
    return redirect()->route('web.userIndex');
  }
  //function for edit
  public function edit($id)
  {
    $crmm = crm::find($id);
    $data = compact('crmm');
    return view("update")->with($data);
  }
  //function for updating
  public function update(Request $request)
  {

    // $validation = Validator::make($request->all(), [
    //   'name' => 'required',
    //   'email' => 'required',
    //   'phone_number' => 'required',
    //   'thumbnail_name' => 'required',
    //   'created_by' => 'required',
    //   'updated_by' => 'required',
    //   'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg'
    // ]);
    // if ($validation->fails()) {
    //   Session::flash('alert-message', $validation->getMessageBag()->first());
    //   return redirect()->back()->withInput();
    // }
    $id = $request['id'];
    $crmm = crm::find($id);
    $crmm->name = $request->name;
    $crmm->email = $request->email;
    $crmm->phone_number = $request->phone_number;
    if ($request->hasfile('image')) {
      $file = $request->file('image');
      $extenstion = $file->getClientOriginalExtension();
      $filename = time() . '.' . $extenstion;
      $file->storeAs('public/imagess', $filename);
      $crmm->image = $filename;
    }
    $crmm->save();
    $media = new Media();
    $media->type = $request->type;
    $media->name = $request->name;
    $media->created_by = $request->created_by;
    $media->updated_by = $request->updated_by;
    if ($request->hasFile('thumbnail_name')) {
      $file = $request->file('thumbnail_name');
      $file_size = $file->getSize();
      $mime_type = $file->getClientMimeType();
      $extension = $file->getClientOriginalExtension();
      $filename = time() . '.' . $extension;
      $image = Image::make($file);
      $thumbnail = $image->resize(400, 400, function ($constraint) {
        $constraint->aspectRatio();
      });
      $thumbnail->save('public/imagess' . $filename);
      $file->storeAs('public/imagess', $filename);
      $media->thumbnail_name = $filename;
      $media->file_size = $file_size;
      $media->type = $mime_type;
    }
    $media->save();
    return redirect()->route('web.userIndex')->with('success', 'CRM and Media updated successfully');
  }
  //function for view
  public function show($id)
  {
    $users = user::find($id);
    // dd($users);
    $data = compact('users');
    return view("user.view")->with($data);
  }
  //function for user profile
  public function view($id)
  {
    $users = user::find($id);
    $data = compact('users');
    return view('user.userprofile', ['users' => $users]);
  }
}
