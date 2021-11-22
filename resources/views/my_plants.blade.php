@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('notifier')
      @include('layouts.sidebar')
        <div class="col-md-10">
            <div class="card border-info " style="background: #411b1ba9">
                <div class="card-header bg-dark text-white">{{ Auth()->user()->name }} Virtual Garden Monitoring</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row text-center justify-content-center">
                        @foreach ($plants as $plant)
                      <div class="card col-sm-2" style="margin:4%; border:15px rgba(85, 51, 67, 0.541) solid; border-radius:15px;">
                        <div class="card-body" >
                            <h5 class="card-title">{{$plant->name}}</h5>
                            @if ($plant->daylight == "Yes")
                            <h6>Keep in Sunlight<img src="https://img.icons8.com/cute-clipart/32/000000/sun.png"/></h6>
                            @else
                            <h6>Keep in Shadow<img src="https://img.icons8.com/cute-clipart/32/000000/do-not-expose-to-sunlight.png"/></h6> 
                            @endif
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            <form action="unselectplant" method="post">
                                @csrf
                                <input name="id" value="{{$plant->id}}" hidden>
                                <button type="submit" class="btn btn-secondary col"><img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/32/000000/external-delete-miscellaneous-kiranshastry-lineal-color-kiranshastry.png"/></button>
                                
                                
                                
                            </form>
                            @if($plant->water_status == 'yes')
                                <form action="markwatered" method="POST">
                                    @csrf
                                    <input name="id" value="{{$plant->id}}" hidden>
                                    <button class="btn btn-danger col"   type="submit">
                                        <img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/32/000000/external-plant-free-time-wanicon-lineal-color-wanicon.png"/>
                                   </button>
                                </form>

                                @else
                                <button  class="btn btn-secondary col" title="Plant is satisfied with water needs." type="button" disabled><img src="https://img.icons8.com/office/32/000000/plant-under-sun.png"/></button>
                                @endif
                          </div>
                        <img class="card-img-top" src="images/{{ $plant->image }}"  alt="Card image cap">
                        
                      </div>
                      @endforeach
                    </div>
                      
                 


                </div>
            </div>
         
        </div>
    </div>
</div>
@endsection
