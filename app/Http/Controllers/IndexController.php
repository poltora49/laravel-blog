<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Utilities\Notification\MessengerNotificatorInterface;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    //
    public function laslesVpn(){
        return view('LaslesVpn');
    }
}
