/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

$(function () {
    var fileupload = $("#FileUpload1");
    var filePath = $("#spnFilePath");
    var image = $("#imgFileUpload");
    image.click(function () {
        fileupload.click();
    });
    fileupload.change(function () {
        var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
        filePath.html("<b>Selected File: </b>" + fileName);
        var output = document.getElementById('imgFileUpload');
        output.src = URL.createObjectURL(event.target.files[0]);
    });
});

function dataTableFooter(){
    var table = $("#example").DataTable({
      "initComplete": function (settings, json) {
        var api = this.api();
        CalculateTableSummary(this);
      },

      "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;	 
        CalculateTableSummary(this);
        return ;		
      }
    });
  }

  // datatable sum functions
  function CalculateTableSummary(table) {
    try {
      var intVal = function (i) {
      return typeof i === 'string' ?
        i.replace(/[\$,]/g, '') * 1 :
        typeof i === 'number' ?
        i : 0;
      };

      var api = table.api();
      api.columns(".sum").eq(0).each(function (index) {
        var column = api.column(index,{page:'current'});
        var sum = column
        .data()
        .reduce(function (a, b) {
          if(isNaN(a)){
            return '';
          }
          if(isNaN(b)){
            return '';
          }
        //return parseInt(a, 10) + parseInt(b, 10);
        return intVal(a) + intVal(b);
      }, 0);
            
      // if(sum==0){
      //   $('.table tfoot').hide();
      // }
      // else{
      //   $('.table tfoot').show();
      // }
      if ($(column.footer()).hasClass("Int")) {
        $(column.footer()).html('' + sum);
      } else {
        $(column.footer()).html('' + sum);
      }
      
    });
    } catch (e) {
      console.log('Error in CalculateTableSummary');
      console.log(e)
    }
}


    
