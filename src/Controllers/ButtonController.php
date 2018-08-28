<?php
namespace sandeep\BangarhSocial\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use sandeep\BangarhSocial\San_Helpers;
class ButtonController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
    	return View('sandeep::button', [
                    'data' => '',
                    'page' => 'home'
                    ]);
    }
}
