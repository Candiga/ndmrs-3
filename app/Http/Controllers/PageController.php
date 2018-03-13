<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HealthFacility;

class PageController extends Controller
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

    public function dashboard()
    {
      # code...
      return view('dashboard');
    }

    public function settings()
    {
      # code...
      return view('settings');
    }

    public function reports()
    {
      # code...
      return view('reports.index');
    }

    public function hospitals()
    {
      $hospitals = HealthFacility::where('level', 'Hospital')->orderBy('name', 'asc')->get();

      return view('health_facilities.hospitals', compact('hospitals'));
    }

    public function referrals()
    {
      $referrals = HealthFacility::where('level', 'Referral')->orderBy('name', 'asc')->get();

      return view('health_facilities.referrals', compact('referrals'));
    }

    public function healthCenterII()
    {
      $health_center_IIs = HealthFacility::where('level', 'HCII')->orderBy('name', 'asc')->get();

      return view('health_facilities.health_center_II', compact('health_center_IIs'));
    }

}
