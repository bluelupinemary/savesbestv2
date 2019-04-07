var plantArr = [];
var keptPlantsArr = '';

function delThisPlant(rowNum,thisPlant){
    var keptPlants = keptPlantsArr;     //string of plants from db
    var keepPlantsList='';              //plants to be kept in DB;
    console.log("Row Num: "+rowNum);
    console.log("Button clicked. Plant: "+thisPlant+"from DB:"+keptPlants);
    var plantStrArr = keptPlants.split('/');
    var max = plantStrArr.length;
    var tempPlantsToKeep = [];
    if(max!=0){
        for(var i=0;i<max;i++){
            if(plantStrArr[i]==thisPlant || plantStrArr[i]=='list' || plantStrArr[i]==''){
                //do nothing if thisPlant to be deleted is in the array
            }else{
                //add the plants not to be deleted in another temp array
                /*if(max==1){
                    keepPlantsList = keepPlantsList.concat(plantStrArr[i]);    
                }else{*/
                    //keepPlantsList = keepPlantsList.concat(plantStrArr[i]+'/');    
                    tempPlantsToKeep.push(plantStrArr[i]);
                //}
                console.log("PLANTS TO BE KEPT AFTER DEL: "+tempPlantsToKeep);
            }
        }//end of for
    }//end of if
    var tempMax = tempPlantsToKeep.length;
    if(tempMax!=0){
        //create a string of plants to be kept
        for(var b=0;b<tempMax;b++){
            keepPlantsList = keepPlantsList.concat(tempPlantsToKeep[b]+'/');
        }
    }
    console.log("KEEPPLANTSLIST STRING: "+keepPlantsList);
    
    //alert("To save: "+keepPlantsList);
    if(keepPlantsList==''){
        keepPlantsList = 'list/';
    }
        swal({
                title: "Remove Plant?",   
                text: "Do you want to remove the plant from the list?",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, remove it!",   
                closeOnConfirm: false 
                },function(confirmed){
                    if(confirmed){
                        //$.post("http://localhost/IBS-PROJ/index.php/home/rainforestPage", 
                        $.post("rainforestPage", 
                                            {
                                                ts:keepPlantsList,
                                                vtype: "keep_plants2",
                                            }
                                            );
                        
                        //window.location.href = "http://localhost/IBS-PROJ/index.php/home/rainforestPage";//reload page to see the effect of deletes
                        window.location.href = "rainforestPage";//reload page to see the effect of deletes
                        //swal("Removed!", "The plant has been removed.", "success"); 
                    }
        });//end of swal
    

}

function allowDrop(ev) {
    ev.preventDefault();
}

function allowDropToBag(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    for(var i=0;i<plantArr.length;i++){
    	console.log("data: "+data+" plantArr[i]: "+plantArr[i]);
    	var index = plantArr.indexOf(data);
    	if (index > -1) {
		    plantArr.splice(index, 1);
		}
    }
    //plantArr.push(data);
    console.log(plantArr);
}

function dropToBag(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    var index = plantArr.indexOf(data);
    console.log("data: "+data+" plantArr[i]: "+plantArr+" index: "+index);
    if(index == -1){
    	plantArr.push(data);	
    }else{
    	console.log("nope");
    }
    /*for(var i=0;i<plantArr.length;i++){
    	
    	if (index > -1) {
		    
		}else{
			plantArr.push(data);
		}
    }*/
    console.log(plantArr);
}


$(document).ready(function(){
    keptPlantsArr = $('#plantsFromDB').val();
    expeditionId = $('#expeditionId').val();

    if(expeditionId==0){
        $('#div2').hide();    
        $('#div1').hide();   
        $('#showKeptPlantsBtn').attr("disabled", true);
    }
    
	$('.openLootbag').hide();
    $('#listOfPlantsKept').hide();
    
	var hidden = true;
	$('#lootbag').click(function(){
        console.log("clicked the bag");
        if(hidden){
            $('.openLootbag').show();
            $('#keepPlantsBtn').attr("disabled", false);
            hidden = false;
        }else{
            $('.openLootbag').hide();
            $('#keepPlantsBtn').attr("disabled", true);
            hidden = true;
        }
        

        //$('.herbologyMeetDiv').show();

    });
    var plantString='';
	$('#keepPlantsBtn').click(function(){
        var keptPlantsFromDB = keptPlantsArr;
        var plants = plantArr;
        var totalPlantsArr = [];     
        
        console.log("PLANTS FROM BAG: "+plants+" PLANTS FROM DB: "+keptPlantsArr);

        
        //put individual plants from db into an array
        var plantsFromDB = keptPlantsFromDB.split('/');
        var max = plantsFromDB.length;                      //get the max num of plants from db
        
        plantString = keptPlantsFromDB;
        totalPlantsArr = plantsFromDB;

        console.log("INIT CONTENT OF PLANT STRING: "+plantString);
        var ksize = plantsFromDB.length;
        var jsize = plants.length;
        
        console.log("PLANTS ARR SIZE: "+jsize+" \nPLANTS FROM DB SIZE: "+ksize);
        if(jsize!=0){
             for(var j=0;j<jsize;j++){                      //plants from DB string array
                //for(var k=0;k<ksize;k++){                   //current plants in lootbag string array
                    var duplicatePlant = plantsFromDB.includes(plants[j]);
                    if(!duplicatePlant){                     //if false, meaning not yet in the plants from DB
                        console.log("PLANT FROM PLANT ARR NOT A DUPLICATE.ADD TO STRING.");
                        plantString = plantString.concat(plants[j]+"/");
                        totalPlantsArr.push(plants[j]);
                    }
                    console.log('CURRENT PLANT STRING AFTER checking for duplicatePlant: '+plantString);
            }//end of j loop
        }//end of if
        else{
            console.log("CURRENT PLANTS ARRAY IS EMPTY");
        }
        
        
        /*PART OF CODE TO CHECK whether the user has exceeded the max number of plants allowed for each expedition selected*/
        var totalNumPlants=0;
        for(var c=0;c<totalPlantsArr.length;c++){
            console.log(totalPlantsArr[c].length);
            if(totalPlantsArr[c]!="" && totalPlantsArr[c]!= null && totalPlantsArr[c].length >= 1 ){
                totalNumPlants += 1;
            }
        }

        var maxNumPlantsForExpi;
        if(expeditionId==1){
            maxNumPlantsForExpi = 10;
        }else if(expeditionId==2){
            maxNumPlantsForExpi = 5;
        }
        else if(expeditionId==3){
            maxNumPlantsForExpi = 3;
        }
        else if(expeditionId==4){
            maxNumPlantsForExpi = 18;
        }
        else if(expeditionId==5){
            maxNumPlantsForExpi = 3;
        }

        

        if(totalNumPlants > maxNumPlantsForExpi){
            swal("Maximum allowable number of plants exceeded!\n You can only pick up to "+maxNumPlantsForExpi+" plants for this expedition.")
        }else{
            document.getElementById("keepPlantsList").value = plantString;
		      console.log("FOLLOWING PLANTS WILL BE KEPT: "+plantString);
            swal({title:"Success", text:"Plants were kept safely."+"\n Click 'Back to Main Map' button to go explore the Map.", type:"success",confirmButtonText:'Alright!'},
                                      function(confirmed){
                                        if(confirmed){
                                          
                                          //$.post("http://localhost/IBS-PROJ/index.php/home/rainforestPage", 
                                            $.post("rainforestPage", 
                                            {
                                                ts:plantString,
                                                vtype: "keep_plants",
                                            }
                                            );
                                        //window.location.href = "http://localhost/IBS-PROJ/index.php/home/playGame";//reload page to see the effect of deletes
                                        window.location.href = "rainforestPage";//reload page to see the effect of deletes
                                   
                                        }            
                                      });

        }//END OF ELSE
    });//end of keepPlantsBtn click
    var hidden=true;
    $('#showKeptPlantsBtn').click(function(){
            if(hidden){
                $('#listOfPlantsKept').show();
                hidden = false;
            }else{
                $('#listOfPlantsKept').hide();
                hidden = true;
            }
            
            //$('.herbologyMeetDiv').show();
    });//end of click

    //del a plant from the 'kept list'
    
    /*$('.delPlantFromList').click(function(){
            var thisRow = '';
            var thisPlant = ''
            thisPlant = $('#thisPlant').html();
            thisRow = $('#thisRow').html();
            console.log("Button clicked. Plant: "+thisPlant+" row: "+thisRow+" from DB: "+keptPlantsArr);
            swal({
                title: "Are you sure?",   
                text: "Do you want to remove the plant from the list?",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, remove it!",   
                closeOnConfirm: false 
                },function(confirmed){
                    if(confirmed){
                        swal("Removed!", "The plant has been removed.", "success"); 
                    }
            });//end of swal    
        });//end of click*/
    

});