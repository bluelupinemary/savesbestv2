var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false);

function question1(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ1").val();  
      var userAns1 = $("#answer1").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns1v"+i;

            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns1v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
              if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question1 fxn

function question2(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ2").val();  
      var userAns1 = $("#answer2").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns2v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns2v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces    
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question2 fxn

function question3(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ3").val();  
      var userAns1 = $("#answer3").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns3v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns3v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question3 fxn

function question4(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ4").val();  
      var userAns1 = $("#answer4").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns4v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns4v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question4 fxn

function question5(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ5").val();  
      var userAns1 = $("#answer5").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns5v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns5v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question5 fxn

function question6(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ6").val();  
      var userAns1 = $("#answer6").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns6v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns6v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question6 fxn

function question7(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ7").val();  
      var userAns1 = $("#answer7").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns7v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns7v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question7 fxn

function question8(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ8").val();  
      var userAns1 = $("#answer8").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns8v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns8v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question8 fxn

function question9(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ9").val();  
      var userAns1 = $("#answer9").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns9v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns9v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question9 fxn

function question10(totalScore){
    /*For question 1*/
      var numAnsQ1 = $("#numAnsQ10").val();  
      var userAns1 = $("#answer10").val().toLowerCase();    // user's answer to question1, to lower case
      var correctAns1 = [];                                // array for the correct answers for question 1
      if(numAnsQ1>1){                                      //get question's correct ans if there are more than 1 correct ans
        for(i=1;i<=numAnsQ1;i++){
            var tempAnsName = "#rightAns10v"+i;
            console.log(tempAnsName);
            var tempAnsVal = $(tempAnsName).val().toLowerCase();
            tempAnsVal = tempAnsVal.replace(/\s/g,'');
            correctAns1.push(tempAnsVal);
        }//end of for loop
      }else{
        var temp = $("#rightAns10v1").val().toLowerCase();
        temp = temp.replace(/\s/g,'');
        correctAns1.push(temp);                            //push answers to correctAns array
      } //end of if
      
      //check if user's answer is correct
      userAns1 = userAns1.replace(/\s/g,'');              //remove white spaces
      var correctFlag = 0;
      for(a=0;a<numAnsQ1;a++){
          if(userAns1 === correctAns1[a]){
               if(correctFlag==0){
                  totalScore = totalScore+1;
                  correctFlag = 1;  
              }
              console.log("Your ans is correct: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }else{
              console.log("Answer is wrong: "+userAns1+" Right: "+correctAns1[a]+" TotalScore: "+totalScore);
          }
      }//end of checking answer for question1
      return totalScore;
}//end of question10 fxn

function checkAnswers(){
      var totalScore = 0;
      totalScore = question1(totalScore);
      totalScore = question2(totalScore);
      totalScore = question3(totalScore);
      totalScore = question4(totalScore);
      totalScore = question5(totalScore);
      totalScore = question6(totalScore);
      totalScore = question7(totalScore);
      totalScore = question8(totalScore);
      totalScore = question9(totalScore);
      totalScore = question10(totalScore);
      console.log("FINAL SCORE: "+totalScore);
      return totalScore;

}

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m==0&&s==0){
    swal({
                    title: "Time's Up!",
                    text: "Your answers will be automatically submitted. Thanks!",
                    type: "warning",
                    //showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Okay. Submit answers.',
                    //cancelButtonText: "No, cancel.",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                                    totalScore = checkAnswers();
                                    document.getElementById("totalScore").value = totalScore;
    
                                  var score = totalScore;
                                  console.log("Total Score to pass: "+score);
                                  swal({title:"Your Score: "+totalScore, text:"Submitted!"+"\n Click Okay button to exit.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                          
                                          //$.post("http://localhost/IBS-PROJ/index.php/home/herbLabPage2_Leaves", 
                                            $.post("herbLabPage2_Leaves", 
                                            {
                                              ts:score,
                                              vtype: "save_user_score",
                                            }
                                            );
                                            //window.location.href = "http://localhost/IBS-PROJ/index.php/home/herbLabPage";//reload page to see the effect of delete
                                            window.location.href = "herbLabPage";//reload page to see the effect of delete
                                   
                                        }    //end of if        
                                      });
                                  
                    }
                });//end of swal
  }//end of if
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}



$(document).ready(function() {
  $checkAns = $('#checkAnswersbtn');
  document.getElementById('timer').innerHTML = 02 + ":" + 00;
  startTimer();

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
                                  console.log("Total Score to pass: "+score);
                                  swal({title:"Your Score: "+totalScore, text:"Submitted!"+"\n Click Okay button to exit.", type:"success",confirmButtonText:'Okay'},
                                      function(confirmed){
                                        if(confirmed){
                                          
                                          //$.post("http://localhost/IBS-PROJ/index.php/home/herbLabPage2_Leaves", 
                                            $.post("herbLabPage2_Leaves", 
                                            {
                                              ts:score,
                                              vtype: "save_user_score",
                                            }
                                            );
                                        //window.location.href = "http://localhost/IBS-PROJ/index.php/home/herbLabPage";//reload page to see the effect of delete
                                        window.location.href = "herbLabPage";//reload page to see the effect of delete
                                   
                                        }            
                                      });
                                  
                    }
                });
     // console.log("Ans1: "+userAns1+" CorrectAns1: "+correctAns1+" numAnsQ1: "+numAnsQ1);




    });//end of radicle swal

});
