@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      @include('notifier')
      @include('layouts.sidebar')

        <div class="col-md-10">
            
           @if(isset($weather))
           <div class="row">
            <div class="card col-md-3  bg-light text-dark" >
           
              <div class="card-body">
                <h1 class="card-title">{{ $weather['weather'][0]['main'] }} <img style="float:right;" src="https://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon'] }}@2x.png"></h1>
                <p class="card-text">Sky Status </p>
                
              </div>
            </div>
            @if(isset($weather['sunrise']))
            <div class="card col-md-3 offset-1 bg-warning" >
           
              <div class="card-body">
                <h1 class="card-title">{{  date('H:i:s', $weather['sunrise']+18000) }} <img style="float:right" src="https://img.icons8.com/office/64/000000/sun--v2.png"/></h1>
                <p class="card-text">Today's Sun-Rise Time</p>
                
              </div>
          </div>
            @endif
            @if(isset($weather['sunset']))
            <div class="card col-md-3 offset-1 bg-dark text-light" >
           
              <div class="card-body">
                <h1 class="card-title">{{ date('H:i:s', $weather['sunset']+18000) }} <img style="float: right;" src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-moon-weather-justicon-flat-justicon.png"/></h1>
                <p class="card-text">Today's Sun-Set Time</p>
                
              </div>
            </div>
            @endif
            
        </div>
      <br>
      <div class="row" >
        
        <div class="card col-md-3 bg-secondary text-light" >
   
            <div class="card-body">
              <h1 class="card-title">{{ $weather['temp'] - 273.15 }} <sub>°C</sub> <img style="float:right;" src="https://img.icons8.com/office/64/000000/temperature--v1.png"/></h1>
              <p class="card-text">Out Door Temperature</p>
              
            </div>
        </div>
        <div class="card col-md-3 offset-1 bg-success text-light" >
   
          <div class="card-body">
            <h1 class="card-title">{{ $weather['feels_like'] - 273.15 }} <sub>°C</sub> <img style="float:right;" src="https://img.icons8.com/office/64/000000/temperature--v1.png"/></h1>
            <p class="card-text">Outdoor Feels Like</p>
            
          </div>
      </div>
         
            
            <div class="card col-md-3 offset-1 bg-info" >
           
                <div class="card-body">
                  <h1 class="card-title">{{ $weather['humidity']  }} <sub>g.kg-1</sub> <img style="float:right;" src="https://img.icons8.com/officel/64/000000/humidity.png"/></h1>
                  <p class="card-text">Outdoor Humidity</p>
                  
                </div>
            </div>
        </div>
        <br>
        @endif
        
        <div class="row">
          <div class="card col-md-3  bg-primary" >
           
            <div class="card-body">
              <h1 class="card-title">{{ $temp_avg  }} <sub>°C</sub> <img style="float:right;" src="https://img.icons8.com/office/64/000000/temperature--v1.png"/></h1>
              <p class="card-text">Required Averaged Temperature</p>
              
            </div>
        </div>
        <div class="card col-md-3 offset-1 bg-primary" >
           
          <div class="card-body">
            <h1 class="card-title">{{ $temp_avg  }} <sub>°C</sub> <img style="float:right;" src="https://img.icons8.com/color/48/000000/infrared-beam-sending.png"/></h1>
            <p class="card-text">Sensor Temperature</p>
            
          </div>
      </div>
      <div class="card col-md-3 offset-1 bg-danger" >
           
        <div class="card-body">
          <h1 class="card-title">{{ DB::table('my_plants')->where('user_id',Auth()->user()->id)->count()  }} <sub>plants</sub> <img style="float:right;" src="https://img.icons8.com/office/50/000000/plant-under-sun.png"/></h1>
          <p class="card-text">Total Number Of Plants In Garden</p>
          
        </div>
    </div>
        </div>
        </div>
       
    </div>
</div>
@endsection
