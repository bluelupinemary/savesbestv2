//former mytable2.js
$table = $('#myTable');
$clickrow = $('.clickable-row');
$linksubmit = $('#link');
$myform = $('#myform');
$tabletr = $('#myTable tr');
$sendclick = $('#send');
$senduserid = $('#useridform');
$createbutton = $('#createaccountbutton');
$delbutton = $('tr #delbutton');
$enlistbutton = $('tr #enlistbutton');
$enlisttosecbutton = $('tr #enlisttosecbutton');
$approveEnlistRequest = $('tr #approveEnlistRequest');
$disapproveEnlistRequest = $('tr #disapproveEnlistRequest');
$removeStudentFromSec = $('tr #removeStudentFromSection');
$sampbut = $('#sampbutton');
$delsecbutton = $('tr #delsecbutton');
$deluserbutton = $('tr #deluserbutton');
$sectionid = $('#sectionid');
$approveEnlistRequest = $('tr #approveEnlistRequest');
$disapproveEnlistRequest=$('tr #disapproveEnlistRequest');
$removeStudentFromSection = $('tr #removeStudentFromSection');
$(document).ready(function(){
  $table.dataTable( {
        "scrollX": true
    } );
    $table.dataTable();

   $deluserbutton.click(function(){
       //return confirm("Are you sure you want to delete?");
       var user_id = $(this).val(); // get value (id) in delete button
       //alert(user_id);
         swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover the deleted user!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes, delete it.',
                    cancelButtonText: "No, cancel.",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                        
                                    //$.post("http://localhost/IBS-PROJ/index.php/home/deleteUserProfileByAdmin", 
                                      $.post("deleteUserProfileByAdmin", 
                                      {
                                        userid: user_id,                                      
                                      }
                                      );
                                  swal({title:"Deleted!", text:"User has been deleted successfully.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                    //function(){
                                        //window.location.href = "http://localhost/IBS-PROJ/index.php/home/deleteUserProfileByAdmin";//reload page to see the effect of delete
                                        window.location.href = "deleteUserProfileByAdmin";//reload page to see the effect of delete
                                    // }
                                        }            
                                      }

                                    );
                                  
                        
                    } else {
                        swal("Cancelled", "Delete User Cancelled", "error");
                    }
                });
    }); 
     $delsecbutton.click(function(){
       //return confirm("Are you sure you want to delete?");
       var enlistarr = $(this).val(); // get value (id) in delete button
      // alert(section_id);
         swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover the deleted section!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes, delete it.',
                    cancelButtonText: "No, cancel.",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                        
                                    //$.post("http://localhost/IBS-PROJ/index.php/ManageSection/deleteSectionInfo", 
                                      $.post("ManageSection/deleteSectionInfo", 
                                      {
                                        sectionid: section_id,
                                       // vtype: "get_section",
                                      }
                                      );
                                  swal({title:"Deleted!", text:"Section has been deleted successfully.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                    //function(){
                                        window.location.href = "deleteSection";//reload page to see the effect of delete
                                    // }
                                        }            
                                      }

                                    );
                                  
                        
                    } else {
                        swal("Cancelled", "Delete Section Cancelled", "error");
                    }
                });
    });//end of click
	$enlisttosecbutton.click(function(){
       //return confirm("Are you sure you want to delete?");
       var sec_id = $(this).val(); // get value (id) in  button
	//var data_arr = arr.split(",");
	//var user_id = data_arr[0];
	//var sec_id = data_arr[1];
	
	//for(i=0;i<n;i++)
	//{
	 
	 //alert(sec_id);
	//}
       
       
         swal({
                    title: "Are you sure?",
                    text: "You will not be able to request enlistment to another section!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes, send it.',
                    cancelButtonText: "No, cancel.",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                        
                                    //$.post("http://localhost/IBS-PROJ/index.php/ManageSection/enlistToSection", 
                                      $.post("ManageSection/enlistToSection", 
                                      {
                                       sectionid:sec_id,

                                       // vtype: "get_section",
                                      }
                                      );
                                  swal({title:"Requested!", text:"Enlistment Request to section successful.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
		                                    
		                                        //window.location.href = "http://localhost/IBS-PROJ/index.php/home";//reload page to see the effect of delete
                                            window.location.href = "home";//reload page to see the effect of delete
		                                     
                                        }            
                                      }

                                    );
                                  
                        
                    } else {
                        swal("Cancelled", "Enlistment Request Cancelled", "error");
                    }
                });
    });    //end of fxn   

    $approveEnlistRequest.click(function(){
       //return confirm("Are you sure you want to delete?");
       var student_id = $(this).val(); // get value (id) in delete button
       //alert(student_id);
         swal({
                    title: "Are you sure?",
                    text: "The student will be added to your section.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes, enlist.',
                    cancelButtonText: "No, cancel.",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                        
                                    //$.post("http://localhost/IBS-PROJ/index.php/ManageStudent/approveEnlistRequest", 
                                      $.post("ManageStudent/approveEnlistRequest", 
                                      {
                                        studentid: student_id,
                                       // vtype: "get_section",
                                      }
                                      );
                                  swal({title:"Enlisted!", text:"Student has been enlisted successfully.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                    //function(){
                                        //window.location.href = "http://localhost/IBS-PROJ/index.php/home/listPendingEnlistmentRequests";//reload page to see the effect of delete
                                        window.location.href = "listPendingEnlistmentRequests";//reload page to see the effect of delete
                                    // }
                                        }            
                                      }

                                    );
                                  
                        
                    } else {
                        swal("Cancelled", "Enlistment Approval cancelled", "error");
                    }
                });
    });

    $disapproveEnlistRequest.click(function(){
       //return confirm("Are you sure you want to delete?");
       var student_id = $(this).val(); // get value (id) in delete button
       //alert(student_id);
         swal({
                    title: "Are you sure?",
                    text: "The student request will be removed.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Disapprove.',
                    cancelButtonText: "No, cancel.",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                        
                                    //$.post("http://localhost/IBS-PROJ/index.php/ManageStudent/disapproveEnlistRequest", 
                                      $.post("ManageStudent/disapproveEnlistRequest", 
                                      {
                                        studentid: student_id,
                                       // vtype: "get_section",
                                      }
                                      );
                                  swal({title:"Disapproved!", text:"Student request was deleted.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                    //function(){
                                        //window.location.href = "http://localhost/IBS-PROJ/index.php/home/listPendingEnlistmentRequests";//reload page to see the effect of delete
                                        window.location.href = "listPendingEnlistmentRequests";//reload page to see the effect of delete
                                    // }
                                        }            
                                      }

                                    );
                                  
                        
                    } else {
                        swal("Cancelled", "Enlistment Approval cancelled", "error");
                    }
                });
    });  //end of function

	$removeStudentFromSection.click(function(){
       //return confirm("Are you sure you want to delete?");
       var student_id = $(this).val(); // get value (id) in delete button
       //alert(student_id);
         swal({
                    title: "Are you sure?",
                    text: "The student will be removed from your section.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Remove Student',
                    cancelButtonText: "No, cancel.",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                        
                                    //$.post("http://localhost/IBS-PROJ/index.php/ManageStudent/removeStudentFromSection", 
                                      $.post("ManageStudent/removeStudentFromSection", 
                                      {
                                        studentid: student_id,                                       
                                      }
                                      );
                                  swal({title:"Deleted!", text:"Student was removed successfully.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                    //function(){
                                       //window.location.href = "http://localhost/IBS-PROJ/index.php/home/listAllStudentOfTeacher";//reload page to see the effect of delete
                                       window.location.href = "listAllStudentOfTeacher";//reload page to see the effect of delete
                                    // }
                                        }            
                                      }

                                    );
                                  
                        
                    } else {
                        swal("Cancelled", "Delete student cancelled", "error");
                    }
                });
    });  

    $enlistbutton.click(function(){
       return confirm("Are you sure you want to enlist in this section?");
    });
   /* $approveEnlistRequest.click(function(){
       return confirm("Are you sure you want to approve enlistment of student?");
    });*/
	  /*$disapproveEnlistRequest.click(function(){
       return confirm("Are you sure you want to disapprove enlistment of student?");
    });*/
     /*$removeStudentFromSec.click(function(){
       return confirm("Are you sure you want to disapprove enlistment of student?");
    });*/
     $sampbut.click(function(){
       return swal({   title: "Error!",   text: "Here's my error message!",   type: "error",   confirmButtonText: "Cool" });
    });
});


 
