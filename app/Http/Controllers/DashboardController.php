<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use App\ValueObject\Filters;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $twelve_years = Carbon::now()->subYears(12);
        $thirty_years = Carbon::now()->subYears(30);

        $all=User::count();
        $attended=User::where('status','present')->count();
        $turnup =  number_format(($attended/$all)*100, 2).'%';
        $new_believers = User::where('status','present')->whereNull('pastor')->count();
        $believers = User::where('status','present')->whereNotNull('pastor')->count();
        $sunday_school = User::where('status','present')->where('dob', '>' ,$twelve_years )->count();
        $youth = User::where('status','present')->where('dob', '<' ,$twelve_years )->where('dob','>',$thirty_years)->count();
        $over_comers = User::where('status','present')->where('dob','<',$thirty_years )->count();
        $male = User::where('status','present')->where('gender','male')->count();
        $female = User::where('status','present')->where('gender','female')->count();
        $need_accommodation = User::where('need_accommodation','yes')->count();
        
        
        return inertia('Dashboard',[
           'data'=> [
            'all'=>$all,
            'attended'=>$attended,
            'turnup'=>$turnup,
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

    public function attend(User $user)
    {
        $user->status = 'present';
 
        $user->save();

       return back()->with('flash.banner', 'Successfully Marked as Present');
    }

    public function all()
    {
        return inertia('All',[
            'data'=>[
                'users'=> User::search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function present()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function new()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->whereNull('pastor')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function members()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->whereNotNull('pastor')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function sundaySchool()
    {
        $twelve_years = Carbon::now()->subYears(12);
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('dob', '>' ,$twelve_years )->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function youth()
    {
        $twelve_years = Carbon::now()->subYears(12);
        $thirty_years = Carbon::now()->subYears(30);

        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('dob', '<' ,$twelve_years )->where('dob','>',$thirty_years)->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function overComers()
    {
        $thirty_years = Carbon::now()->subYears(30);
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('dob','<',$thirty_years )->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function male()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('gender','male')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function female()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('gender','female')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function needAccommodation()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('need_accommodation','yes')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }
}
