$(document).ready(function(){
	$('.herbologyMeetDiv').hide();
	$('.expeditionDiv').hide();

	$("#hmeetdoor1").hover(function(){
		console.log("mouse over here");
	    $('#hmeetdoor1').hide();
	    $('#hmeetdoor2').show();
	    $('.herbologyMeetDiv').show();

	});

	$("#hmeetdoor2").mouseleave(function(){
		console.log("door 2 mouseout here");
	    $('#hmeetdoor2').hide();
	    $('#hmeetdoor1').show();
	    $('.herbologyMeetDiv').hide();
	});

	//expedition door
	$("#expeditiondoor1").hover(function(){
		console.log("mouse over here");
	    $('#expeditiondoor1').hide();
	    $('#expeditiondoor2').show();
	    $('.expeditionDiv').show();
	});

	$("#expeditiondoor2").mouseleave(function(){
		console.log("door 2 mouseout here");
	    $('#expeditiondoor2').hide();
	    $('#expeditiondoor1').show();
	    $('.expeditionDiv').hide();
	});

});
