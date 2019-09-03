<?php

namespace App\Http\Controllers;

use App\Classes\Wallet;
use App\models\Opcode;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        //if($this->isVerified()) {
        return view('/');
        //}else{
        //return redirect('verifyOtp');
        //}
    }

    public function aboutus () {

        return view('frontend.about');
    }

    public function faq () {

        return view('frontend.faq');
    }

    public function bus () {

        return view('frontend.bus');
    }

    public function support () {

        return view('frontend.support');
    }

    public function sitemap () {

        return view('frontend.sitemap');
    }

    public function terms () {

        return view('frontend.terms');
    }

    public function isVerified () {
        $user = Auth::user();
        if ( $user->isVerified == '1' ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function feedback () {

        return view('frontend.feedback');
    }

    public function contact () {

        return view('frontend.contact');
    }

    public function mobilerecharge ( Request $request ) {
        $user           = Auth::user();
        $rechargeamount = $request->input('amount');
        $tel            = $request->input('tel');
        $operator       = $request->input('oprator');
        $fromwallet     = $request->input('fromwallet');
        $encrypted_data = Wallet::recharge_mobile($user, $rechargeamount, 'INR', $tel, $operator, $fromwallet);
        $access_code    = 'AVOQ72EH49BC73QOCB';

        return view('ccavredirectform', compact('encrypted_data', 'access_code'));

    }

    public function walletrecharge ( Request $request ) {
        $user           = Auth::user();
        $amount         = $request->input('amount');
        $encrypted_data = Wallet::recharge_wallet($user, 'INR', $amount);
        $access_code    = 'AVOQ72EH49BC73QOCB';

        return view('ccavredirectform', compact('encrypted_data', 'access_code'));

    }

    public function mobilerechargemiddle ( Request $request ) {
        $prepaidprovider = $request->input('oprator');
        $type            = $request->input('type');
        $operatorname    = Opcode::where('opcode', $request->input('oprator'))->first()->name;
        $prepaidamount   = $request->input('amount');
        $tel             = $request->input('tel');
        $fromwallet      = $request->input('fromwallet');

        return view('forms.rechargemobileform', compact('prepaidprovider', 'prepaidamount', 'tel', 'fromwallet', 'operatorname', 'type'));
    }
}
