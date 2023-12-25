<?php
 
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
 
use Illuminate\Http\Request;
 
class LoginController extends Controller
{
 
    use AuthenticatesUsers;
 
    protected $redirectTo = RouteServiceProvider::HOME;
 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    public function login(Request $request)
    {   
        $input = $request->all();
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
       
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'ahligizi') {
                return redirect()->route('ahligizi.home');
            }else if (auth()->user()->type == 'pramusaji') {
                return redirect()->route('pramusaji.home');
            }else if (auth()->user()->type == 'distributor') {
                return redirect()->route('distributor.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
            
    }
}