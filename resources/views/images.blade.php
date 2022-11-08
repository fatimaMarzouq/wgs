<!DOCTYPE html>
<html>
<head>
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
     <td style="text-align: center;"><a href="{{ url('public/images_details/').'/'.$images->id}}" target="_blank">{{  $images->AccountNumbeAuto }}</a></td>
     
    </tr>
  @endforeach
</table>

</body>
</html>

