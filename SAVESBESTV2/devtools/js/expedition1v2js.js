$(document).ready(function(){
    $('#lootBagContent').hide();

    var hidden=true;
	$('#lootBagImg').click(function(){
		console.log("Loot bag clicked.");
		if(hidden){
			$('#lootBagContent').show();			
			hidden = false;	
		}else{
			$('#lootBagContent').hide();			
			hidden = true;
		}
		
	});//end of lootbagimg

	var totalScore = 0;
	//submit plants button click
	$('#submitPlants').click(function(){
		
		var collectedPlants = $('#plantsFromDB').val();
		console.log("Submit plants now."+" collectedPlants: "+collectedPlants);

		//put collected plants into an array
		var tempArr = collectedPlants.split('/');
		var tempSize = tempArr.length;
		var plantsArr = [];

		//console.log("TempSize"+tempSize);
		if(tempSize>0){
			for(var i=0;i<tempSize;i++){
				if(tempArr[i]=='' || tempArr[i]=='list'){						//if not a plant
						//do nothing
				}else{															//add the plant to plantarray
					plantsArr.push(tempArr[i]);
				}
			}//end of for loop
		}//end of if
		console.log("PLANT ARRAY AFTER GETTING THE PLANTS: "+plantsArr);
		
		// put correct answers into an array
		var correctPlantsStr = $('#correctPlantsStr').val();
		var correctArr2 = correctPlantsStr.split('/');
		var tempSize2 = correctArr2.length;
		var correctAnswers = [];
		
		if(tempSize2>0){
			for(var i=0;i<tempSize2;i++){
				if(correctArr2[i]=='' || correctArr2[i]=='list'){						//if not a plant
						//do nothing
				}else{															//add the plant to plantarray
					correctAnswers.push(correctArr2[i]);
				}
			}//end of for loop
		}//end of if
		console.log("CORRECT ANSWERS ARRAY AFTER GETTING THE PLANTS: "+correctAnswers);

		//check if user's plants is in the correct answer array
		var tempSize = plantsArr.length;
		
		var numCorrect = 0;
		for(var j=0;j<tempSize;j++){
			var res = correctAnswers.includes(plantsArr[j]);
			if(res){		//if plant is correct
				console.log("PLANT "+plantsArr[j]+" is in the list.");
				totalScore = totalScore + 2;
				numCorrect = numCorrect + 1;
			}else{
				console.log("PLANT "+plantsArr[j]+" is NOT in the list.");
			}
			
		}
		console.log("TOTAL SCORE AFTER CHECKING: "+totalScore);
		document.getElementById('expTotalScore').value = totalScore;
		swal({
                title: "Handing the plants over to the king...are you sure?",   
                text: "You cannot undo this action and answers will be checked accordingly.",   
                type: "warning",   
                showCancelButton: true,
                cancelButtonText: "Wait, lemme think",   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, I'm sure!",   
                closeOnConfirm: false 
                },function(confirmed){
                    if(confirmed){
                        
                        			//tScore = totalScore;
                                    document.getElementById('expTotalScore').value = totalScore;
    
                                  var score = totalScore;
                                  console.log("Total Score to pass: "+score);
                                  swal({title:"Your Score: "+totalScore, text:"Submitted!"+"\n Click Okay button to exit.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                          
                                          //$.post("http://localhost/IBS-PROJ/index.php/home/expedition1Pagev3", 
                                          	$.post("expedition1Pagev3", 
                                            {
                                              ts:score,
                                              vtype: "save_score",
                                            }
                                            );
                                        
                                       		//window.location.href = "http://localhost/IBS-PROJ/index.php/home/expedition1Pagev2";//reload page to see the effect of delete
                                       		window.location.href = "expedition1Pagev2";//reload page to see the effect of delete
                                   
                                        }    //end of if        
                                      });
                    }
        });//end of swal

	});//end of lootbagimg

}); //end of document ready
