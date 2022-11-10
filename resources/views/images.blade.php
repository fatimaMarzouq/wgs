<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Niche </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>


<table>
  <tr>
    <th>Si.No</th>
    <th style="text-align: center;">Outlet</th>
    
  </tr>
  <?php $i=1; ?>
@foreach($images as $images)
  <tr>
     <td>{{  $i++ }}</td>
     <td style="text-align: center;"><a href="{{ route('images_details',['id' => $images->id]) }}" target="_blank">{{  $images->AccountNumbeAuto }}</a></td>
     
    </tr>
  @endforeach
</table>

</body>
</html>

