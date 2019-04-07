function questions(totalScore){
    /*For expedition1 1*/
      var i;
      var n=0;        //total number of questions for the for loop
      if($expeditionId == 1){
          n=6;
      }else if($expeditionId == 2){
          n=5;
      }else if($expeditionId == 3){
          n=3;
      }else if($expeditionId == 4){
          n=7;
      }else if($expeditionId == 5){
          n=3;
      }
      for(i=1;i<=n;i++){
          var temp1 = "#answerNum"+i;
          var temp2 = "#rightAnsNum"+i;
          
          
          var userAns = $(temp1).val().toLowerCase();   //convert to lowercase
          var rightAns = $(temp2).val().toLowerCase();

          userAns = userAns.replace(/\s+/g, '');
          rightAns = rightAns.replace(/\s+/g, '');
          
          console.log("User answer "+i+" : "+userAns+" Correct Ans: "+rightAns);
          if(userAns === rightAns){
              totalScore += 2;
              console.log("EQUAL! "+totalScore);
          }
          

      }
      return totalScore;
}//end of questions fxn


function checkAnswers(){
      var totalScore = 0;
      totalScore = questions(totalScore);
      console.log("FINAL SCORE: "+totalScore);
      return totalScore;

}



$(document).ready(function() {
  $checkAns = $('#checkAnswersbtn');
  $expeditionId = $('#expeditionNo').val();
  console.log("ExpiNo: "+$expeditionId);
  /*SWA*/
    $('#checkAnswersbtn').click(function() {
        swal({
                    title: "Submit Answers",
                    text: "Do you wish to submit your answers? \n Answers cannot be modified once submitted.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Okay. Submit answers.',
                    cancelButtonText: "No, re-check answers.",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                                    totalScore = checkAnswers();
                                    document.getElementById("totalScore").value = totalScore;
                                    var score = totalScore;
                                    if(score==0){
                                      score = -1;
                                    }
                                  console.log("Total Score to pass: "+score);
                                  swal({title:"Your Score: "+totalScore, text:"Submitted!"+"\n Click Okay button to exit.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                          
                                          //$.post("http://localhost/IBS-PROJ/index.php/home/expedition"+$expeditionId+"Page", 
                                            $.post("expedition"+$expeditionId+"Page", 
                                            {
                                              ts:score,
                                              vtype: "save_user_score",
                                            }
                                            );
                                          
                                          //window.location.href = "http://localhost/IBS-PROJ/index.php/home/expedition"+$expeditionId+"Page?totalScore="+score;//reload page to see the effect of delete
                                          window.location.href = "expedition"+$expeditionId+"Page?totalScore="+score;//reload page to see the effect of delete
                                      
                                        //alert("confirmed!");
                                        }            
                                      });
                                  
                    }
                });
     // console.log("Ans1: "+userAns1+" CorrectAns1: "+correctAns1+" numAnsQ1: "+numAnsQ1);




    });//end of radicle swal

});

