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
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProfileController extends Controller
{
  //function for user profile
  public function view($id)
  {
    $users = user::find($id);
    $data = compact('users');
    return view('user.userprofile', ['users' => $users]);
  }

  }

