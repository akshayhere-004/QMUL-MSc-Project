<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->statusAssigner();
        $data = DB::table('coordinates')->where('user_id',Auth()->user()->id)->select('lat','lng')->get();
        if(count($data)>0){
            $response = Http::get('https://api.openweathermap.org/data/2.5/onecall/timemachine?lat='.$data[0]->lat.'&lon='.$data[0]->lng.'&dt='.now()->timestamp.'&appid=4f49745cbb3b9a381c9471cf059f8c53');
            $ids = DB::table('my_plants')->where('user_id',Auth()->user()->id)->pluck('plant_id');
            $dts = DB::table('plant_data')->whereIn('id',$ids)->pluck('temperature');
            $summer = 0;
            foreach($dts as $dt){
                $summer = $summer+ $dt[1]+(10*$dt[0]);
            }
            //return $summer/count($dts);
            return view('home')->with(['weather'=>$response['current'],'temp_avg'=>$summer/count($dts)]);
        }else{
            $ids = DB::table('my_plants')->where('user_id',Auth()->user()->id)->pluck('plant_id');
            $dts = DB::table('plant_data')->whereIn('id',$ids)->pluck('temperature');
            $summer = 0;
            foreach($dts as $dt){
                $summer = $summer+ $dt[1]+(10*$dt[0]);
            }
            //return $summer/count($dts);
            return view('home')->with(['temp_avg'=>$summer/count($dts)]);
  
        }
        
    }

     /**
     * Gets all the plants from plants data base
     *
     * @return plants which are not selected by the user
     */

     public function tester(){
       
         return ;
     }
    public function selectplants()
    {
        $ids = DB::table('my_plants')->where('user_id',Auth()->user()->id)->pluck('plant_id');
        $plants = DB::table('plant_data')->whereNotIn('id',$ids)->get(); 
        return view('select_plants')->with('plants',$plants);
    }

     /**
     * To add the selected plant to the users plant collection
     *
     * @param  mixed $request contains currently logged in userId
     * @return redirects back to the select plant view
     */
    public function selectplant(Request $request)
    {
        $id = $request->input('id');
        DB::table('my_plants')->updateOrInsert([
            'user_id'=>Auth()->user()->id,
            'plant_id'=>$id
        ],[
            'created_at'=>now(),
            'water_status'=>'yes'
        ]);
        return redirect()->back();
    }

     /**
     * To find all the plants data which user has
     *
     * @return plants of a user
     */
    public function myplants()
    {
        $this->statusAssigner();
        $ids = DB::table('my_plants')->where('user_id',Auth()->user()->id)->pluck('plant_id');
       // $plants = DB::table('plant_data')->whereIn('id',$ids)->get(); 
   
        $plants = DB::table('plant_data')->join('my_plants','plant_data.id','=','my_plants.plant_id')
        ->whereIn('plant_data.id',$ids)->where('my_plants.user_id',Auth()->user()->id)
        ->select('plant_data.id','plant_data.name','plant_data.temperature','plant_data.image','plant_data.daylight','my_plants.water_status',)
        ->get();
        return view('my_plants')->with('plants',$plants);
    }

    public function statusAssigner(){
        $ids = DB::table('my_plants')->where('user_id',Auth()->user()->id)->pluck('plant_id');
        foreach ($ids as $key => $id) {
            $period = DB::table('plant_data')->where('id',$id)->pluck('water_duration')[0];
            $times = DB::table('plant_data')->where('id',$id)->pluck('water_times')[0];
            $idtemp = DB::table('my_plants')->where('plant_id',$id)->where('user_id',Auth()->user()->id)->pluck('id')[0];
            $status = DB::table('plant_status')->where('plant_id',$idtemp)
            ->where('created_at','>=',now()->addDays(-1*($period)))
            ->get();
            $status2 = DB::table('plant_status')->where('plant_id',$idtemp)->where('created_at','>=',now()->addHours(-24))->pluck('id');
            if(count($status) >= $times || count($status2) > 0){
                DB::table('my_plants')->where('id',$idtemp)->update([
                    'water_status'=>'no'
                ]);
            }else{
                DB::table('my_plants')->where('id',$idtemp)->update([
                    'water_status'=>'yes'
                ]);
            }
        }
        
    }

     /**
     * To remove the plant from the user plants collection
     *
     * @param  mixed $request contains selected plantId to be removed
     * @return redirects back to the myPlants view
     */
    public function unselectplant(Request $request)
    {
        $id = $request->input('id');
        DB::table('my_plants')->where('user_id',Auth()->user()->id)->where('plant_id',$id)->delete();
        return redirect()->back();
    }

     /**
     * To get the data of a user selected plant
     * Also the information such as when was the last time water was given
     * How many times in a week it needs water
     * If it needs water then a button appears to remind user to give water
     * @param  mixed $request containts plantId
     * @return view containing plat information i.e., myPlant
     */
    public function myplant(Request $request)
    {
        $period = DB::table('plant_data')->where('id',$request->input('id'))->pluck('water_duration')[0];
        $times = DB::table('plant_data')->where('id',$request->input('id'))->pluck('water_times')[0];
        $idtemp = DB::table('my_plants')->where('plant_id',$request->input('id'))->where('user_id',Auth()->user()->id)->pluck('id')[0];
        $status = DB::table('plant_status')->where('plant_id',$idtemp)
        ->where('created_at','>=',now()->addDays(-1*($period)))
       ->get();
       $status2 = DB::table('plant_status')->where('plant_id',$idtemp)->where('created_at','>=',now()->addHours(-24))->pluck('id');
       if(count($status) >= $times || count($status2) > 0){
        DB::table('my_plants')->where('id',$idtemp)->update([
            'water_status'=>'no'
        ]);
       }else{
        DB::table('my_plants')->where('id',$idtemp)->update([
            'water_status'=>'yes'
        ]);
       }
        
        $id = $request->input('id');
        $data = DB::table('plant_data')->join('my_plants','plant_data.id','=','my_plants.plant_id')
        ->where('plant_data.id',$id)->where('my_plants.user_id',Auth()->user()->id)
        ->select('plant_data.id','plant_data.name','plant_data.temperature','plant_data.image','plant_data.daylight','my_plants.water_status',)
        ->get();
        

        return view('plant_status')->with('plant',$data);
    }

     /**
     * To update the information of water has been given to the plants when a user marks the task complete
     *
     * @param  mixed $request contains plant ID
     * @return redirect backs to the view containing plant information i.e., myPlant
     */
    public function markwatered(Request $request)
    {
        $id = DB::table('my_plants')->where('plant_id',$request->input('id'))->where('user_id',Auth()->user()->id)->pluck('id')[0];
         DB::table('plant_status')->insert([
             'watered_by'=>Auth()->user()->id,
             'plant_id'=>$id,
             'created_at'=>now()
         ]);
        
         return redirect()->back();
      
    } 
     
     /**
     * To send email to the user to give water to a plant
     *
     * @return void
     */
    public function sendmail(){
        $user = ['user'=>'haiderjutt95@gmail.com'];
        Mail::send('emails', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');
            $m->to('haiderjutt95@gmail.com','haider')->subject('Your Reminder!');
        });
    }

    public function addGragenLocation(Request $request){
        $id = DB::table('coordinates')->insertGetId([
            'created_at'=>now(),
            'lat'=>$request->input('lat'),
            'lng'=>$request->input('lng'),
            'user_id'=>Auth()->user()->id,
        ]);
        DB::table('coordinates')->where('id','!=',$id)->where('user_id',Auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function sensorData(Request $request){
        return 'hello';
    }
}
