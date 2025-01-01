<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Models\Blog;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    } 
    
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully logged in');
        }
      else{
        return redirect("login")->withErrors('Opps! You have entered invalid credentials');
      }
    }

    public function registration()
    {
        return view('auth.register');
    }  

    public function postRegistration(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed', // Ensure password matches confirmation
    ]);

    // Set default role to 2
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 2, // Automatically set the role to 2 (author)
    ]);

    Auth::login($user);

    return redirect()->intended('dashboard')
        ->withSuccess('Registration successful! Welcome to the dashboard.');
}



    public function dashboard()
    {

        $blogCount = Blog::count(); // Assuming the Blog model exists
        $userCount = User::count(); // Assuming the User model exists

        // dd($blogCount, $userCount);

        if(Auth::check()){
            return view('dashboard', compact('blogCount', 'userCount'));
        }

        
  
        return redirect("login")->withSuccess('Opps! You do not have access');

        
    }

    public function logout() {
        
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }




}
