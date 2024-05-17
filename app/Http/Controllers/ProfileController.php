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
    $user = user::find($id);
    $data = compact('user');
    return view("update")->with($data);
  }
  //function for updating

  /**
   * use USER Model for saving User details instead of crm.-done
   * 
   * save Image information in media table 
   * every image should have its name as well as it's optimize version as thumbnail.
   * 
   * First save user information then check image is present in request
   * or not 
   * then save image in storage as well as it's information in database
   * 
   * also save image id in USER table for refernce.
   */
  public function update(Request $request)
  {
    $validation = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required',
      'phone_number' => 'required',
      'created_by' => 'required',
      'updated_by' => 'required',
      'image' => 'required|file|image'
    ]);
    if ($validation->fails()) {
      Session::flash('alert-message', $validation->getMessageBag()->first());
      return redirect()->back()->withInput();
    }
    $id = $request['id'];
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $mime_type = $file->getClientMimeType();
      $extension = $file->getClientOriginalExtension();
      $filename = time() . '.' . $extension;
      $file_size = $file->getSize();
      $user->image = $filename;
      if (in_array($mime_type, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp'])) {
        $image = Image::make($file);
        $thumbnail = $image->resize(600, 600, function ($constraint) {
          $constraint->aspectRatio();
        });
        Storage::put('public/imagess/' . $filename, (string) $thumbnail->encode());
        $media = new Media();
        $media->type = $mime_type;
        $media->name = $filename;
        $media->created_by = $request->created_by;
        $media->updated_by = $request->updated_by;
        $media->thumbnail_name = 'thumbnail'. $filename;
        $media->file_size = $file_size;
        $media->save();       
        $user->id =$media->id;
      }
    }
    $user->save();
    return redirect()->route('web.userIndex')->with('success', 'User and media updated successfully');
  }
  //function for view
  public function show($id)
  {
    $users = user::find($id);
    $data = compact('users');
    return view("user.view")->with($data);
  }
  //function for user profile
  public function view($id) {
    $users = user::find($id);
    $data = compact('users');
    return view('user.userprofile', ['users' => $users]);
  }
}
