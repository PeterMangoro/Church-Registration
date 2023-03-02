<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $twelve_years = Carbon::now()->subYears(12);
        $thirty_years = Carbon::now()->subYears(30);

        $new_believers = User::whereNull('pastor')->count();
        $believers = User::whereNotNull('pastor')->count();
        $sunday_school = User::where('dob', '>' ,$twelve_years )->count();
        $youth = User::where('dob', '<' ,$twelve_years )->where('dob','>',$thirty_years)->count();
        $over_comers = User::where('dob','<',$thirty_years )->count();
        $male = User::where('gender','male')->count();
        $female = User::where('gender','female')->count();
        $need_accommodation = User::where('need_accommodation','yes')->count();
        
        
        return inertia('Dashboard',[
           'data'=> [
            'new_believers'=>$new_believers,
            'believers'=>$believers,
            'sunday_school'=>$sunday_school,
            'youth'=>$youth,
            'over_comers'=>$over_comers,
            'male'=>$male,
            'female'=>$female,
            'need_accommodation'=>$need_accommodation,
            ]
            
        ]);
    }
}