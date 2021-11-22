@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center">
        @include('notifier')
        @include('layouts.sidebar')
        <div class="col-md-10 ">
            <div class="card border-info " style="background: #411b1b93">
                <div class="card-header bg-dark text-white">Your Personal Horticulturist Monitoring Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="carouselExampleIndicators" class="carousel  row" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($plants as $key=>$plant)
                            @if($key == 0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active bg-light"></li>
                            @else
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="bg-light"></li>
                            @endif
                          
                            @endforeach
                          
                          
                        </ol>
                        <div class="carousel-inner" style="padding-bottom: 50px;">
                          
                          @foreach ($plants as $key=>$plant)
                             
                              @if($key == 0)
                              <div class="carousel-item active row" style="text-align: center"> 
                                <img  src="images/{{$plant->image}}" style="max-height: 300px; max-width:300px;" alt="{{ $key }}th slide" class="col-12">
                                <br>
                                <hr>
                                <div class=" text-left text-white" style="margin-left:35%">
                                    <p >Name : <b>{{$plant->name}}</b>  </p>
                                    <p >Temerature Requirements : <b>{{$plant->temperature}}</b>  </p>
                                    <p >Daylight Required : <b>{{$plant->daylight}}</b>  </p>
                                    <p >Water Requirements : <b>{{$plant->water_times}} time(s) per {{ $plant->water_duration }} Day(s)</b>  </p>
                                </div>
                                <form action="selectplant" method="post">
                                    @csrf
                                    <input name="id" value="{{$plant->id}}" hidden>
                                    <button type="submit" class="btn btn-outline-light">Add To Garden</button>
                                </form>
                              
                               
                                
                              </div>
                            @else
                            <div class="carousel-item " style="text-align: center"> 
                                <img  src="images/{{$plant->image}}" style="max-height: 300px; max-width:300px;" alt="{{ $key }}th slide">
                                <br>
                                <hr>
                                <div class=" text-left text-white" style="margin-left:35%">
                                    <p >Name : <b>{{$plant->name}}</b>  </p>
                                    <p >Temerature Requirements : <b>{{$plant->temperature}}</b>  </p>
                                    <p >Daylight Required : <b>{{$plant->daylight}}</b>  </p>
                                    <p >Water Requirements : <b>{{$plant->water_times}} time(s) per {{ $plant->water_duration }} Day(s)</b>  </p>
                                </div>
                                <form action="selectplant" method="post">
                                    @csrf
                                    <input name="id" value="{{$plant->id}}" hidden>
                                    <button type="submit" class="btn btn-outline-light">Add To Garden</button>
                                </form>
                              </div>
                            @endif
                       
                            @endforeach
                        </div>
                        <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon " aria-hidden="true" style="border-radius: 15px;padding:15px; color:white;"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" >
                          <span class="carousel-control-next-icon " aria-hidden="true" style="border-radius: 15px;padding:15px; color:white;"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    

                    {{-- <table class="table-bordered table-hover table-striped table col">
                        <thead style="background-color:grey;color:greenyellow">
                            <tr >
                                <th>Plant #</th>
                                <th>Plant Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plants as $plant)
                                <tr>
                                    <td>{{$plant->id}}</td>
                                    <td>{{$plant->name}}</td>
                                    <td>
                                        <form action="selectplant" method="post">
                                            @csrf
                                            <input name="id" value="{{$plant->id}}" hidden>
                                            <button type="submit" class="btn btn-secondary">Select</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
