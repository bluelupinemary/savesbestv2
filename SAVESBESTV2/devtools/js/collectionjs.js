//$table = $('#myTable');
$clickrow = $('.clickable-row');
$linksubmit = $('#link');
$myform = $('#myform');
$tabletr = $('#myTable tr');

$(document).ready(function(){
  //  $table.dataTable();
    //remove default filter and change to new search/filter box
    //$(".dataTables_filter").hide();
    
   // var table = $('#myTable').DataTable();
     $('#myTable').DataTable( {
        "scrollY":        "60vh",
        "scrollCollapse": true,
        "paging":         false
    } );
    //var table = $table.DataTable();
     // $('#new-search-box').keyup(function(){
     // table.search($(this).val()).draw() ;
     // })
   /* $clickrow.click(function() {
        window.document.location = $(this).data("href");
    });
  
    $linksubmit.click(function() {
    	$myform.submit();
	});*/
//$createbutton.click(function(){
//  swal({   title: "Thank You!",   text: "Account Creation Successful!",   type: "success",   confirmButtonText: "Login" });
//}

});


 
