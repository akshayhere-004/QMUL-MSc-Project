@php $dater = DB::table('my_plants')->where('user_id',Auth()->user()->id)->where('water_status','yes')->count() @endphp
@if($dater > 0)
    <div class="col-md-12 " style="color:white; background: black; text-align:center;  font-type:bold; height:35px;margin-bottom:5px;">
        <p> {{ $dater }} plants need your attendtion.<a href="myplants"><img src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-color-vitaly-gorbachev/32/000000/external-right-arrow-arrows-vitaliy-gorbachev-lineal-color-vitaly-gorbachev.png"/></a></p>
    </div>
    
@endif