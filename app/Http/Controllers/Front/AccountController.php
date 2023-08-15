<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Order\OrderServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\Mail;
class AccountController extends Controller
{

    private $userService;
    private $orderService;

    public function __construct(UserServiceInterface $userService,OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_client,Constant::user_level_admin] // level CUSTOMER
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect('/cart');
        } else {
            return back()->with('notification', 'Email or Password is not correct Or !!Account was Banned!!');
        }
    }

    public function logout()
    {
        Auth::logout();
        Cart::destroy();
        return back();
    }
    //get
    public function register(){
        return view('front.account.register');
    }

    public function checkEmailExist(Request $request){
        if($request->ajax()){
            $response = [];
            if($this->userService->checkExistAccount($request->email,Constant::user_level_client)){
               $response['notification'] = "Email is Exist";
            }
            return $response;
        }
    }

    public function postRegister(Request $request){


        if($this->userService->checkExistAccount($request->email,Constant::user_level_client)){
            return back()->with('notification','ERROR : Account is Exist !!!');
        }

        //handle pass vs confirm pass && form is null
        if($request->password != $request->password_confirmation || $request->name =='' || $request->email =='' || $request->password =='' ){
            return back()->with('notification','Error .Please fill full form & check your password and submit again');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client, //level CUSTOMER
        ];
        //create User
        $this->userService->create($data);
        return redirect('account/login')->with('notification','Register successfully ! Let login');
    }

    public function showForgot(){
        return view('front.account.forgot');
    }
    public function showReset(){
        return view('front.account.resetpassword');
    }

    public function handleForgot(Request $request){
        $data = [
            'email' => $request->input('email'),
            'token' => $this->randHash(10),
            'created_at' => Carbon::now(),
        ];
        PasswordReset::create($data);

        $code = $data['token'];
        $email_to = $data['email'];
        //send mail
        try{
               Mail::send('front.account.email',compact('code'),
               function ($message) use ($email_to) {
                    $message->from('ngoduchieuxxx@gmail.com','AzDigital');
                    $message->to($email_to,$email_to);
                     $message->subject('Reset Account Password AZDigital');
                });
           }catch(Exception $error){
                return redirect ('/');
           }
        return redirect('/account/resetpassword');
    }

    public function handleResetPassword(Request $request){
        $token = $request->input('token');
        $password = $request->input('password');
        $email = $request->input('email');
        $currentTime = Carbon::now(new DateTimeZone('Asia/Bangkok'));
        $current_time_sub_20_minus = $currentTime->subMinutes(20)->format('Y-m-d H:i:s');

        //dd(PasswordReset::where('email',$email)->where('token',$token)->where('created_at','>=',$current_time_sub_20_minus)->exists());
        if(PasswordReset::where('email',$email)->where('token',$token)->where('created_at','>=',$current_time_sub_20_minus)->exists()){
            User::where('email',$email)->update(['password' => bcrypt($password)]);
            PasswordReset::where('email',$email)->delete();
            return redirect('/');
        }else return redirect('/account/resetpassword')->with('notification','Reset password fail . information is not correct');

        

        
    }
    private function randHash($len=32)
    {
	    return substr(md5(openssl_random_pseudo_bytes(20)),-$len);
    }

    public function myOrderIndex(){
        $orders = $this->orderService->getOrderByUserId(Auth::id());
        return view('front.account.my-order.index',compact('orders'));
    }

    public function myOrderShow($id){
        $order = $this->orderService->find($id);
        return view('front.account.my-order.show',compact('order'));
    }

}
