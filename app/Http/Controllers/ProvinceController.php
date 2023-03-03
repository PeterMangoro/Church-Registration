<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\ValueObject\Filters;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function show()
    {
        $Bulawayo=User::where('status','present')->where('province','Bulawayo')->count();
        $Harare=User::where('status','present')->where('province','Harare')->count();
        $Manicaland=User::where('status','present')->where('province','Manicaland')->count();
        $MashonalandCentral=User::where('status','present')->where('province','Mashonaland Central')->count();
        $MashonalandEast=User::where('status','present')->where('province','Mashonaland East')->count();
        $MashonalandWest=User::where('status','present')->where('province','Mashonaland West')->count();
        $Masvingo=User::where('status','present')->where('province','Masvingo')->count();
        $MatebelelandNorth=User::where('status','present')->where('province','Matebeleland North')->count();
        $MatebelelandSouth=User::where('status','present')->where('province','Matebeleland South')->count();
        

        
        
        return inertia('Provinces',[
           'data'=> [            
            'Bulawayo'=>$Bulawayo,           
            'Harare'=>$Harare,
            'Manicaland'=>$Manicaland,
            'MashonalandCentral'=>$MashonalandCentral,
            'MashonalandEast'=>$MashonalandEast,
            'MashonalandWest'=>$MashonalandWest,
            'Masvingo'=>$Masvingo,
            'MatebelelandNorth'=>$MatebelelandNorth,
            'MatebelelandSouth'=>$MatebelelandSouth,
            ]
            
        ]);
    }   

    public function bulawayo()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Bulawayo')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function harare()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Harare')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function manicaland()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Manicaland')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function mashonalandCentral()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Mashonaland Central')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function mashonalandEast()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Mashonaland East')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function mashonalandWest()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Mashonaland West')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function masvingo()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Masvingo')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function matebelelandNorth()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Matebeleland North')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }

    public function matebelelandSouth()
    {
        return inertia('Present',[
            'data'=>[
                'users'=> User::where('status','present')->where('province','Matebeleland South')->search(request('search'))->paginate(15),
                Filters::filters()
            ]
            ]);
    }
}
