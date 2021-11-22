<div class="col-md-2">
    <div class="card border-info " style="background: #411b1b93">
        <div class="card-header  text-white"><img height="100vh" src="css/assets/images/logo-inverse.png"></div>
        <hr style="background: rgb(61, 61, 143)">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <a type="button" class="btn btn-outline-success col-md-12" href="home">Home</a>
            <hr>
            <a type="button" class="btn btn-outline-primary col-md-12" href="selectplants">Select Plants</a>
           <hr>
           <a type="button" class="btn btn-outline-secondary col-md-12" href="myplants">My Plants</a> 
           <hr>
           <a type="button" class="btn btn-outline-warning col-md-12" data-toggle="modal" data-target="#myModal">Configure Location</a>
           <hr>
           <a type="button" class="btn btn-outline-info col-md-12" data-toggle="modal" data-target="#myModal2">Sensor Keys</a>
           <hr>
           <a type="button" class="btn btn-outline-light col-md-12" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Logout</a> 

            
        </div>
    </div>
   
</div>