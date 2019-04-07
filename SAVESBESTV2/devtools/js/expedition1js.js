$(document).ready(function(){
	$('#startExpeditionBtn').click(function() {
		console.log("button clicked");
		/*swal({
                    title: "Submit Answers",
                    text: "Do you wish to submit your answers? \n Answers cannot be modified once submitted.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Okay. Submit answers.',
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                                    //totalScore = checkAnswers();
                                  var expiNo = document.getElementById("expiNoBox").value;
								  console.log("expiNo: "+expiNo);

                                  swal({title:"Okay", text:"Submitted!"+"\n Click Okay button to exit.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                          
                                          $.post("http://localhost/IBS-PROJ/index.php/home/playGame/", 
                                            {
                                              ts:expiNo,
                                              vtype:'pass_expiNo'
                                            }
                                            );
                                          //window.open("http://localhost/IBS-PROJ/index.php/home/castleHallPage2",'_self');
                                        window.location.href = "http://localhost/IBS-PROJ/index.php/home/playGame/";//reload page to see the effect of delete
                                   		
                                   		console.log("Confirmed");
                                        }            
                                      });
                                  
                    }
                });	*/
	});
	
}); //end of document ready
