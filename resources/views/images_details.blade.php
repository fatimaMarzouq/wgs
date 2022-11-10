<!DOCTYPE html>
<html lang="en">
<head>
  <title>Niche</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
   @if(count($images)>0)
<p>&emsp;<span style="font-size: 25px;font-weight: bold">Outlet Name: {{ $images[0]->outlet }}</span></p>
@endif
 &emsp;<span style="font-size: 25px;font-weight: bold">Drik menus Section</span><br>
 <div class="row">
  @if($images)
@foreach($images as $images)
  
   <div class="col-md-6" >
      &emsp;<br><a href="{{ asset('images/').'/'.$images->drinkmenus_img}}" download><img src="{{ asset('images/').'/'.$images->drinkmenus_img}}" /></a>
      </div>
   
  @endforeach
  @endif
  </div>
   &emsp;<span style="font-size: 25px;font-weight: bold">Entrance Section</span><br>
    @if($images2)
  @foreach($images2 as $images)
  
   
   <div class="col-md-6" >
      &emsp;<br><a href="{{ asset('images/').'/'.$images->entrance_img}}" download><img src="{{ asset('images/').'/'.$images->entrance_img}}" /></a>
      </div>
    
   
  @endforeach
  @endif
   &emsp;<span style="font-size: 25px;font-weight: bold">Backbar Section</span><br>
    @if($images3)
  @foreach($images3 as $images)
  
    
     <div class="col-md-6" >
      &emsp;<br><a href="{{ asset('images/').'/'.$images->backbar_img}}" download><img src="{{ asset('images/').'/'.$images->backbar_img}}" /></a>
      </div>
   
  @endforeach
  @endif
</body>
</html>
