<div style="padding-top: 10px;padding-left: 30px;">
  <div id="txt" style="display:none">{{ $areaAccount }}</div>
  <button class="excel">Excel Export</button>
</div>
<input type="hidden" id="csrftoken" name="csrftoken" value="{{ csrf_token() }}">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="{{ asset('resources/js/excelexportjs.js') }}"></script>
   <script>
    
//     $(".excel").click(function(){  
//   $.ajax({
//       url:"<?php echo route('excel_download');?>",
//       method: 'POST',
//       data:{"_token": $('#csrftoken').val()},
//       success:function(response)
//       {  
//          var data=JSON.parse(response);
         
//          $("#dvjson").excelexportjs({
//                     containerid: "dvjson"
//                        , datatype: 'json'
//                        , dataset: data
//                        , columns: getColumns(data)     
//                 });

//         }

//       });
// });

  $(document).ready(function(){
    $('.excel').click(function(){
        var data = $('#txt').text();
       
        
        JSONToCSVConvertor(data, "Wgs Report", true);
    });
});

function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    
    var CSV = '';    
    //Set Report title in first row or line
    
    CSV += ReportTitle + '\r\n\n';

    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";
        
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {
            
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }

        row = row.slice(0, -1);
        
        //append Label row with line break
        CSV += row + '\r\n';
    }
    
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";
        
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }

        row.slice(0, row.length - 1);
        
        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {        
        alert("Invalid data");
        return;
    }   
    
    //Generate a file name
    var fileName = "";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g,"_");   
    
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    
    
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");    
    link.href = uri;
    
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
   </script>