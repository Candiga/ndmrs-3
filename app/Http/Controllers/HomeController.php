<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

        public function hospitals()
        {
          $hospitals = HealthFacility::where('level','hospital')->get();
          return view('health_facilities.hospitals',compact('hospitals'));
        }
        public function referrals()
        {
          $referrals = HealthFacility::where('level','referral')->get();
          return view('health_facilities.referrals',compact('referrals'));
        }
        public function healthCentreII()
        {
          # code...
        }
        public function healthCentreIII()
        {
          # code...
        }
        public function healthCentreIV()
        {
          # code...
        }

}
