<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\media;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()   
    {
        $users = User::with('media')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }
    public function delete(string $id)
    {
        user::find($id)->delete();
        return redirect()->route('web.userIndex');
    }

    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        return view('user.view');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = user::find($id);
        $data = compact('user');
        return view("update")->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            // 'created_by' => 'required',
            // 'updated_by' => 'required',
            'image' => 'required|file|image'
        ]);
        if ($validation->fails()) {
            Session::flash('alert-message', $validation->getMessageBag()->first());
            return redirect()->back()->withInput();
        }
        try {
            $id = $request['id'];
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            if ($request->hasFile('image')) {
                $image = self::imageSave($request->image, 'storage/app/public/imagess');
                $user->image = $image;
            }
            $user->save();
            // dd($user);
            return redirect()->route('web.userIndex')->with('success', 'User and media updated successfully');
        } catch (\Exception $th) {
            Log::info("error " . $th->getMessage());
        }
    }
    public function imageSave($image, $path)
    {
        // dd($image,$path);
        $path  =  base_path($path);
        // dd($image,$path);
        if ($image->isValid() && in_array($image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
            $image_extension    = $image->getClientOriginalExtension();
            $image_size         = $image->getSize();
            $type               = $image->getMimeType();
            $new_name           = rand(1111, 9999) . date('mdYHis') . uniqid() . '.' . $image_extension;
            $thumbnail_name     = 'thumbnail_' . rand(1111, 9999) . date('mdYHis') . uniqid() . '.' .  $image_extension;
            #save thumbnail
            $thumbnail = Image::make($image->getRealPath());
            $thumbnail->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $thumbnail_name);
            #save original
            $image->move($path, $new_name);
            $mediaArray = [
                'type' => $type,
                'file_size' => $image_size,
                'name' => $new_name,
                'thumbnail_name' => $thumbnail_name,
                'created_by' => 1,
                'updated_by' => 2,
            ];
            $media = self::saveMediaData($mediaArray);
            return !empty($media) ? $media->id : null;
        } else {
            Log::error('####### CommenController -> saveImage() #######');
            return null;
        }
    }
    public static function saveImageBase64($image, $path)
    {
        $path  =  base_path($path);
        if ($image) {
            $image_extension    = explode('/', mime_content_type($image))[1];
            $image_size         = (int)(strlen(rtrim($image, '=')) * 0.75);
            $mimeData           = getimagesize($image);
            $type               = $mimeData['mime'];
            $new_name           = rand(1111, 9999) . date('mdYHis') . uniqid() . '.' . $image_extension;
            $thumbnail_name     = 'thumbnail_' . rand(1111, 9999) . date('mdYHis') . uniqid() . '.' .  $image_extension;
            #save original
            $thumbnail = Image::make($image)->save($path . '/' . $new_name);
            #save thumbnail
            $thumbnail->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $thumbnail_name);
            $mediaArray = [
                'type' => $type,
                'file_size' => $image_size,
                'name' => $new_name,
                'thumbnail_name' => $thumbnail_name,
            ];
            $media = self::saveMediaData($mediaArray);
            return !empty($media) ? $media->id : null;
        } else {
            Log::error('####### CommenController -> saveImageBase64() #######');
            return null;
        }
    }
    public static function saveMediaData($mediaArray)
    {
        try {
            $media = media::create($mediaArray);
            return $media;
        } catch (\Exception $e) {
            Log::error('####### CommenController -> saveMediaData() #######  ' . $e->getMessage());
            return null;
        }
    }
    //function for view
    public function show($id)
    {
        $users = user::find($id);
        $data = compact('users');
        return view("user.view")->with($data);
    }
}
