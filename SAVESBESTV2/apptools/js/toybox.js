/** EMPLOY STRICT JS CODING**/
'use strict';

/** START OF GLOBAL VARIABLE DECLARATIONS **/

// Index number to be attached to the datatype declaration.
var index_var = 0;
var index_main = 0;
var index_fxn = 0;

var index_main_li = 0;
var index_fxn_li = 0;

// Arrays for storing values
var varDec = [];
var fxnVarDec = [];
var mainDec = [];
var fxnDec = [];

var inMain = [];
var inFxn = [];

var mainVars = [];
var fxnVars = [];

var gridster = [];

var main_grid = [];
var fxn_grid = [];

var mainCodeInput = [];
var fxnCodeInput = [];

var enumTokens = [];

// Constant declarations
var NOT_IN_LIST = -1;
var UNCLICKED = 0;
var CLICKED = 1;

var TOK_MAIN = 2;
var TOK_FXN = 3;

/** END OF VARIABLE DECLARATIONS **/

/** START OF FUNCTION DECLARATIONS **/
function checkVarInput(varID,varValue) {
	var saveValue;
	
	if(varID.indexOf("rducky") != NOT_IN_LIST) {
			var isFloat = isNaN(varValue);
			if(isFloat) {
				var errmsg = "Invalid value. Expecting floating point number.";
				alert(errmsg);
				console.log(errmsg);
				saveValue = 0;
			}
			else {
				saveValue = 1;
			}
		}
		else if(varID.indexOf("numblk") != NOT_IN_LIST) {
			var isInt = isNaN(varValue);
			if(isInt) {
				var errmsg = "Invalid value. Expecting an integer.";
				alert(errmsg);
				console.log(errmsg);
				saveValue = 0;
			}
			else {
				if((varValue).indexOf(".") != NOT_IN_LIST) {
					var errmsg = "Invalid value. Expecting an integer, not a floating point.";
					alert(errmsg);
					console.log(errmsg);
					saveValue = 0;
				}
				else {
					saveValue = 1;
				}	
			}
		}
		else if(varID.indexOf("letblk") != NOT_IN_LIST) {
			var isChar = isNaN(varValue);
			if(!isChar) {
				var errmsg = "Invalid value. Expecting a character.";
				alert(errmsg);
				console.log(errmsg);
				saveValue = 0;
			}
			else {
				if(varValue.length > 3) {
					var errmsg = "Invalid value. Expecting only a single character.";
					alert(errmsg);
					console.log(errmsg);
					saveValue = 0;
				}
				else {
					saveValue = 1;
				}	
			}
		}

	return saveValue;

}


function convertGrids() {
	
	var rowNum = main_grid.length;
	for(var i=0; i<rowNum; i++) {
		
		var colNum = main_grid[i].length;
		for(var j=0; j<colNum; j++) {
			if(Object.prototype.toString.call(main_grid[i][j]) != "[object Undefined]") {
				if(main_grid[i][j].indexOf("alnum") != NOT_IN_LIST) {
					var temp = main_grid[i][j].split("-");
					for(var k=0; k<mainDec.length; k++) {
						if(mainDec[k].indexOf(temp[1]) != NOT_IN_LIST) {
							//alert(mainDec[k]);
							main_grid[i][j] = temp[0]+"-"+mainDec[k];
							break;
						}
					}
				}
				var temp = main_grid[i][j].split("-");
				mainCodeInput.push(temp[1]);
			}
		}
	}

	var rowNum = fxn_grid.length;
	for(var i=0; i<rowNum; i++) {
		var colNum = fxn_grid[i].length;
		for(var j=0; j<colNum; j++) {
			if(Object.prototype.toString.call(fxn_grid[i][j]) != "[object Undefined]") {
				if(fxn_grid[i][j].indexOf("alnum") != NOT_IN_LIST) {
					var temp = fxn_grid[i][j].split("-");
					for(var k=0; k<fxnDec.length; k++) {
						if(fxnDec[k].indexOf(temp[1]) != NOT_IN_LIST) {
							fxn_grid[i][j] = temp[0]+"-"+fxnDec[k];
							break;
						}
					}
				}
				var temp = fxn_grid[i][j].split("-");		
				fxnCodeInput.push(temp[1]);
			}
		}
	}
	
}


function clearMainGrid() {
	var rowNum = main_grid.length;
	for(var i=0; i<rowNum; i++) {
		var colNum = main_grid[i].length;
		main_grid[i].splice(0,colNum);
	}
	main_grid.splice(0,rowNum);

	var rowNum = mainCodeInput.length;
	mainCodeInput.splice(0,rowNum);
}

function clearFxnGrid() {
	var rowNum = fxn_grid.length;
	for(var i=0; i<rowNum; i++) {
		var colNum = fxn_grid[i].length;
		fxn_grid[i].splice(0,colNum);
	}
	fxn_grid.splice(0,rowNum);

	var rowNum = fxnCodeInput.length;
	fxnCodeInput.splice(0,rowNum);
}

function processGrids(){
clearMainGrid();
clearFxnGrid();

var mainIds = $("#dndMainPane li")
.map(function () {
return this.id;
}).get();

$.each(
    mainIds,
    function(){
		var liC = document.getElementById(this).children;
		var imageID = liC[0].id;
        var col = $("#"+this).attr("data-col");
        var row = $("#"+this).attr("data-row");
		var arrCol = col - 1;
		var arrRow = row - 1;
		if (Object.prototype.toString.call(main_grid[arrRow]) == "[object Undefined]") {
			main_grid[arrRow] = [];
		}
		main_grid[arrRow][arrCol] = imageID;
    }
);

var fxnIds = $("#dndFxnPane li")
.map(function () {
return this.id;
}).get();

$.each(
    fxnIds,
    function(){
		var liC = document.getElementById(this).children;
		var imageID = liC[0].id;
        var col = $("#"+this).attr("data-col");
        var row = $("#"+this).attr("data-row");
		var arrCol = col - 1;
		var arrRow = row - 1;
		if (Object.prototype.toString.call(fxn_grid[arrRow]) == "[object Undefined]") {
			fxn_grid[arrRow] = [];
		}
		fxn_grid[arrRow][arrCol] = imageID;
    }
);

convertGrids();
}
	
function deleteElement(ev) {
	var searchKey = ev.target.id.replace("span","li");
	var info = searchKey.split("-");
	var targetElement = document.getElementById(searchKey);

	if(info[1].indexOf("var") != NOT_IN_LIST) {
		var temp = info[1]+"-"+info[2];
		if(info[1].indexOf("main_") != NOT_IN_LIST) {
			var pos = findVariable(temp,mainDec);
			mainDec.splice(pos,1);
			gridster[0].remove_widget(targetElement);
		}
		else if (info[1].indexOf("fxn_") != NOT_IN_LIST) {
			var pos = findVariable(temp,fxnDec);
			fxnDec.splice(pos,1);
			gridster[1].remove_widget(targetElement);
		}
	}
	else {
		if(info[1].indexOf("main_") != NOT_IN_LIST) {
			var pos = findVariable(info[1],mainDec);
			mainDec.splice(pos,1);
			gridster[0].remove_widget(targetElement);
		}
		else if (info[1].indexOf("fxn_") != NOT_IN_LIST) {
			var pos = findVariable(info[1],fxnDec);
			fxnDec.splice(pos,1);
			gridster[1].remove_widget(targetElement);
		}
	}
}

function deleteVarWidget(searchKey,state) {
	if(state==1) {
		var container = document.getElementById("dndMainPane").childNodes;
		for(var i=0; i<container.length; i++) {
			if(container[i].nodeName == "LI") {
				if(container[i].id.indexOf(searchKey) != NOT_IN_LIST) {
					var targetElement = document.getElementById(container[i].id);
					gridster[0].remove_widget(targetElement);
				}
			}
		}
	}
	else if(state==2) {
		var container = document.getElementById("dndFxnPane").childNodes;
		for(var i=0; i<container.length; i++) {
			if(container[i].nodeName == "LI") {
				if(container[i].id.indexOf(searchKey) != NOT_IN_LIST) {
					var targetElement = document.getElementById(container[i].id);
					gridster[1].remove_widget(targetElement);
				}
			}
		}
	}
}


function deleteVarDec(ev) {
	var targetID = ev.target.id;
	
	var info = targetID.split("_");
	var container = targetID.replace("span", "div");
	var varName = info[3];
	if(info[1] == "main") {
		
		var searchKey = targetID.replace("span_main","var");
		
		var pos = findVariable(searchKey,varDec);
		
		varDec.splice(pos,1);
	
		var parentDiv = document.getElementById("mainVarPane");
		var childDiv = document.getElementById(container);

		parentDiv.removeChild(childDiv);

		if(inMain.indexOf(varName) != NOT_IN_LIST) {
			deleteVarWidget(varName,1);
		}
	}
	else if(info[1] == "fxn") {
		var searchKey = targetID.replace("span_fxn","var");
	
		var pos = findVariable(searchKey,fxnVarDec);
		
		
		fxnVarDec.splice(pos,1);
		
	
		var parentDiv = document.getElementById("fxnVarPane");
		var childDiv = document.getElementById(container);

		parentDiv.removeChild(childDiv);

		if(inFxn.indexOf(varName) != NOT_IN_LIST) {
			deleteVarWidget(varName,2);
		}
	}
}

// Find position of element in target array
function findVariable(searchKey,listTarget) {
	var pos,i, listEl,key;
	for (i = 0; i < listTarget.length; ++i) {
	    listEl = listTarget[i].split("_");
	    key = listEl[0]+"_"+listEl[1]+"_"+listEl[2];
		if(searchKey == key) {
			pos = i;
		}
	}
	return pos;
}

// This will get the value placed in the textarea of a cloned image
function getVarData(ev) {
	var varText = ev.target;
	var variableID = ev.target.id;
	var info = variableID.split(".");
	var info2 = info[0].split("-");
	var searchKey, tokPos;
	var replacement;
	var saveValue;
	
	// If the textarea is related to an alphanumeric variable
	if(variableID.indexOf("alnum") != NOT_IN_LIST) {
		var alNumInfo = variableID.split(".");
		if(alNumInfo[0].indexOf("main") != NOT_IN_LIST) {
			tokPos = mainDec.indexOf(alNumInfo[0]);
		
			// Update the content of the alnum variable
			if(tokPos != NOT_IN_LIST) {
				mainDec[tokPos] = mainDec[tokPos] + "_" + varText.value;
			}
			else {
				tokPos = findVariable(alNumInfo[0],mainDec);
			
				mainDec[tokPos] = alNumInfo[0]+"_"+varText.value;
			}
		}
		else if(alNumInfo[0].indexOf("fxn") != NOT_IN_LIST) {
			tokPos = fxnDec.indexOf(alNumInfo[0]);
		
			// Update the content of the alnum variable
			if(tokPos != NOT_IN_LIST) {
				fxnDec[tokPos] = fxnDec[tokPos] + "_" + varText.value;
			}
			else {
				tokPos = findVariable(alNumInfo[0],fxnDec);
			
				fxnDec[tokPos] = alNumInfo[0]+"_"+varText.value;
			}
		}	
	}
	else {
		saveValue = checkVarInput(variableID,varText.value);

		if(saveValue == 1) {
			searchKey = info2[0]+"_var"+info2[1];
			tokPos = findVariable(searchKey,varDec);
		
			// If the searchKey is found in the varDec list, update the element at the position where searchKey was found.
			if(tokPos != NOT_IN_LIST) {
				replacement = info2[0]+"_var"+info2[1]+"_"+varText.value;
				varDec[tokPos] = replacement;
			
				var keyID =  info2[0]+"_var"+info2[1];
				var tokPos2 = findVariable(searchKey,fxnVarDec);
			
				if(tokPos2 != NOT_IN_LIST) {
					fxnVarDec[tokPos2] = varDec[tokPos];
				}
			}
		}
		else {
			var textArea = document.getElementById(variableID);
			textArea.value = "";
		}
	}
}

// Prevent native drag&drop methods from firing while dragging [cloned] images.
function allowDrop(ev)	{
	ev.preventDefault();
}

// Initiate dragging of [cloned] images.
function drag(ev)	{
	ev.dataTransfer.setData("Text",ev.target.id);
}

// Main handler for dropped [cloned] images.
function drop(ev)	{
	ev.preventDefault();
	createClone(ev);
}

// Create clone of dragged image.
function createClone(ev) {
	var varInfo, varInfo2,tokPos, mainID, fxnID;

	// Get the id of the source image.
	var data=ev.dataTransfer.getData("Text");
	
	// Get the id of the target container.
	var destination = ev.target.id;
	
	// Create a new element 'img'. This would be the 'clone' of the dragged object.
	var clone = document.createElement("img");
	var original = document.getElementById(data);
	clone.src = original.src;

	/**
	 *	The dndVarPane container only accepts datatypes, as it is only meant for variable declaration. Attempts to drop a non-variable element inside this container will produce no results, and could be seen as an error in the log.
		Variables meant for the main code and the function declaration could be done here, as it is not allowed to repeat variable names.
	 * 
	**/
	if(destination == "mainVarPane") {
		// Check if the obejct going to be dropped is a variable by looking at its id's prefix. If it is:
		if(data.indexOf("var_") != NOT_IN_LIST) {
			// Check if the variable being dragged is already inside the dndVarPane. If it is, do not allow it to be dropped.
			if(data.indexOf("-") != NOT_IN_LIST) {
				ev.preventDefault();
				var elemName = data.split("-");
				var elemName2 = elemName[0].split("_");
				var errmsg = "Cannot drop "+elemName2[0]+elemName[1]+" here again";
				alert(errmsg);
				console.log(errmsg);
			}
			// Otherwise, allow cloning.
			else {
				/**
				 * Increment the appropriate index for the dragged object. The id will have the following format:
				 * var_<datatype>-<index>
				 * Example:
				 * var_rducky-1
				 * 
				 * varInfo will contain the information about the variable, and the info will have the following format:
				 * var_<datatype>_var<index>_<space>
				 * Example:
				 * var_rducky_var1_
				 * **/
				clone.id = data+"-"+(++index_var);
				varInfo = data+"_var"+index_var+"_ ";

				// Create a div that would hold the following:
				// Variable name
				// Cloned image
				// Textarea for input
				var cloneDiv = document.createElement("div");
				cloneDiv.id = (data.replace("var","div_main")) + "_var" + index_var;
				
				// Create text for variable name
				var cloneText = document.createElement("p");
				cloneText.textContent = "var"+index_var;

				mainVars.push(cloneText.textContent);
			
				var cloneSpan = document.createElement("span");
				cloneSpan.id = (cloneDiv.id).replace("div","span");
				cloneSpan.innerHTML = "X";
				cloneSpan.addEventListener("click",deleteVarDec,ev);
		
				cloneText.appendChild(cloneSpan);
				cloneDiv.appendChild(cloneText);

				// Add class and event to cloned image, and then add it to the div
				clone.classList.add("img-responsive");
				clone.addEventListener("dragstart",drag);
				cloneDiv.appendChild(clone);

				// Create textarea that will hold the value of the variable
				var cloneValue = document.createElement("textarea");
				cloneValue.className = "vartext";
		
				cloneValue.id = clone.id+".value";
		
				// Add event 'onblur' and function getVarData to the textarea
				cloneValue.addEventListener('blur',getVarData,ev);

				cloneDiv.appendChild(cloneValue);
				
				varDec.push(varInfo);
				
				ev.target.appendChild(cloneDiv);
			}
		}
		// Otherwise, flag the drag event as an error. The error can be seen in the log terminal and via alert.
		else {
				var elemName = data.split("_");
				var errmsg = enumTokens[elemName[1]] + " is not a variable.";
				alert(errmsg);
				console.log(errmsg);
		}
	}

	if(destination == "fxnVarPane") {
		// Check if the obejct going to be dropped is a variable by looking at its id's prefix. If it is:
		if(data.indexOf("var_") != NOT_IN_LIST) {
			// Check if the variable being dragged is already inside the dndVarPane. If it is, do not allow it to be dropped.
			if(data.indexOf("-") != NOT_IN_LIST) {
				ev.preventDefault();
				var elemName = data.split("-");
				var elemName2 = elemName[0].split("_");
				var errmsg = "Cannot drop "+elemName2[0]+elemName[1]+" here again";
				alert(errmsg);
				console.log(errmsg);
			}
			// Otherwise, allow cloning.
			else {
				/**
				 * Increment the appropriate index for the dragged object. The id will have the following format:
				 * var_<datatype>-<index>
				 * Example:
				 * var_rducky-1
				 * 
				 * varInfo will contain the information about the variable, and the info will have the following format:
				 * var_<datatype>_var<index>_<space>
				 * Example:
				 * var_rducky_var1_
				 * **/
				clone.id = data+"-"+(++index_var);
				varInfo = data+"_var"+index_var+"_ ";

				// Create a div that would hold the following:
				// Variable name
				// Cloned image
				// Textarea for input
				var cloneDiv = document.createElement("div");
				cloneDiv.id = (data.replace("var","div_fxn")) + "_var" + index_var;

				// Create text for variable name
				var cloneText = document.createElement("p");
				cloneText.textContent = "var"+index_var;
	
				fxnVars.push(cloneText.textContent);
			
				var cloneSpan = document.createElement("span");
				cloneSpan.id = (cloneDiv.id).replace("div","span");
				cloneSpan.innerHTML = "X";
				cloneSpan.addEventListener("click",deleteVarDec,ev);
		
				cloneText.appendChild(cloneSpan);
				cloneDiv.appendChild(cloneText);

				// Add class and event to cloned image, and then add it to the div
				clone.classList.add("img-responsive");
				clone.addEventListener("dragstart",drag);
				cloneDiv.appendChild(clone);

				// Create textarea that will hold the value of the variable
				var cloneValue = document.createElement("textarea");
				cloneValue.className = "vartext";
		
				cloneValue.id = clone.id+".value";
		
				// Add event 'onblur' and function getVarData to the textarea
				cloneValue.addEventListener('blur',getVarData,ev);

				cloneDiv.appendChild(cloneValue);
				
				fxnVarDec.push(varInfo);
				
				ev.target.appendChild(cloneDiv);
			}
		}
		// Otherwise, flag the drag event as an error. The error can be seen in the log terminal and via alert.
		else {
				var elemName = data.split("_");
				var errmsg = enumTokens[elemName[1]] + " is not a variable.";
				alert(errmsg);
				console.log(errmsg);
		}
	}

	/**
		This handles the images dragged to the main code body.
	**/
	else if(destination == "dndMainCodeArea" || destination == "dndMainPane") {
		var newLi = document.createElement("li");
		
		// Check if the dragged image is a variable. If it is,
		if(data.indexOf('var_') != NOT_IN_LIST) {
			// Check if it has been declared or not first. If not, do not allow it to be cloned.
			if(data.indexOf('-') == NOT_IN_LIST) {
				var errmsg = "You cannot drag an undeclared variable here.";
				alert(errmsg);
				console.log(errmsg);
			}
			else {
				varInfo = data.split("-");
				varInfo2 = varInfo[0].split("_");
				var tester = "var"+varInfo[1];
				if(fxnVars.indexOf(tester) != NOT_IN_LIST) {
					var errmsg = "Cannot drag a function variable to main code area.";
					alert(errmsg);
					console.log(errmsg);
				}
				else {
			
					// Clone id would have the format:
					// main_<datatype>_var<index>-<index_main>
					// Example:
					// main_rducky_var1-1
				
					mainID = "main_"+varInfo2[1]+"_var"+varInfo[1]+"-"+(++index_main);

					clone.id = mainID;
			
					var cloneText = document.createElement("p");
					cloneText.textContent = "var"+varInfo[1];

					inMain.push(cloneText.textContent);

					clone.classList.add("img-responsive","draggable","main");

					console.log(mainID);
					mainDec.push(mainID);

					newLi.id = "li-"+mainID+"-"+(++index_main_li);
				
					var cloneSpan = document.createElement("span");
					cloneSpan.id = "span-"+mainID+"-"+(index_main_li);
					cloneSpan.innerHTML = "X";
					cloneSpan.addEventListener("click",deleteElement,ev);

					newLi.appendChild(cloneSpan);
					newLi.appendChild(clone);
					newLi.appendChild(cloneText);
					
					addToGrid([newLi,1,1], TOK_MAIN);
				}			
			}
		}
		else {
			varInfo = data.split("_");
			mainID = "main_"+varInfo[1]+"_"+(++index_main);

			clone.id = mainID;

			newLi.id = "li-"+mainID;
			
			console.log(mainID);
			
			clone.classList.add("img-responsive","draggable","main");
			
			mainDec.push(mainID);

			var cloneSpan = document.createElement("span");
			cloneSpan.id = "span-"+mainID;
			cloneSpan.innerHTML = "X";
			cloneSpan.addEventListener("click",deleteElement,ev);

			newLi.appendChild(cloneSpan);
			newLi.appendChild(clone);
			if(data.indexOf("alnum") != NOT_IN_LIST) {
				var cloneValue = document.createElement("textarea");
				cloneValue.className = "vartext";
		
				cloneValue.id = clone.id+".value";
		
				// Add event 'onblur' and function getVarData to the textarea
				cloneValue.addEventListener('blur',getVarData,ev);
				newLi.appendChild(cloneValue);
			}
			addToGrid([newLi,1,1], TOK_MAIN);
		}
	}
	else if(destination == "dndFxnCodeArea" || destination == "dndFxnPane") {
		var newLi = document.createElement("li");

		// Check if the dragged image is a variable. If it is,
		if(data.indexOf('var_') != NOT_IN_LIST) {

			if(data.indexOf('-') == NOT_IN_LIST) {
				var errmsg = "You cannot drag an undeclared variable here.";
				alert(errmsg);
				console.log(errmsg);
			}
			else {
				varInfo = data.split("-");
				varInfo2 = varInfo[0].split("_");

				var tester = "var"+varInfo[1];
				if(mainVars.indexOf(tester) != NOT_IN_LIST) {
					var errmsg = "Cannot drag a main code variable to function code area.";
					alert(errmsg);
					console.log(errmsg);
				}
				else {
			
					// Clone id would have the format:
					// fxn_<datatype>_var<index>
					// Example:
					// fxn_rducky_var1
					fxnID = "fxn_"+varInfo2[1]+"_var"+varInfo[1]+"-"+(++index_fxn);

					clone.id = fxnID;
					var cloneText = document.createElement("p");
					cloneText.textContent = "var"+varInfo[1];

					inFxn.push(cloneText.textContent);

					clone.classList.add("img-responsive","draggable","fxn");
					console.log(fxnID);
					fxnDec.push(fxnID);
				

					newLi.id = "li-"+fxnID+"-"+(++index_fxn_li);
				

					var cloneSpan = document.createElement("span");
					cloneSpan.id = "span-"+fxnID+"-"+(index_fxn_li);
					cloneSpan.innerHTML = "X";
					cloneSpan.addEventListener("click",deleteElement,ev);

					newLi.appendChild(cloneSpan);
					newLi.appendChild(clone);
					newLi.appendChild(cloneText);
					addToGrid([newLi,1,1], TOK_FXN);
				}
			}
		}
		else {
			varInfo = data.split("_");
			fxnID = "fxn_"+varInfo[1]+"_"+(++index_fxn);
			clone.id = fxnID;
			
			console.log(fxnID);
			
			clone.classList.add("img-responsive","draggable","fxn");
			
			fxnDec.push(fxnID);

			var cloneSpan = document.createElement("span");
			cloneSpan.id = "span-"+fxnID;
			cloneSpan.innerHTML = "X";
			cloneSpan.addEventListener("click",deleteElement,ev);

			newLi.id = "li-"+fxnID;

			newLi.appendChild(cloneSpan);
			newLi.appendChild(clone);
			if(data.indexOf("alnum") != NOT_IN_LIST) {
				var cloneValue = document.createElement("textarea");
				cloneValue.className = "vartext";
		
				cloneValue.id = clone.id+".value";
		
				// Add event 'onblur' and function getVarData to the textarea
				cloneValue.addEventListener('blur',getVarData,ev);
				newLi.appendChild(cloneValue);
			}
			addToGrid([newLi,1,1], TOK_FXN);
		}
	}
	
}

function viewCode() {
	processGrids();
	var xmlhttpRequest;
	if (window.XMLHttpRequest)
	  {
	  xmlhttpRequest=new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
	  }
	else
	  {
	  xmlhttpRequest=new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
	  }
	xmlhttpRequest.onreadystatechange=function()
	  {
	  if (xmlhttpRequest.readyState==4 && xmlhttpRequest.status==200)
		{
		var serverResponse = xmlhttpRequest.responseText;
		document.getElementById("query_input").value=serverResponse;
		}
	  }
	
	
	var vardeclaration = encodeURIComponent(varDec);
	var fxndeclaration = encodeURIComponent(fxnVarDec);
	var maincode = encodeURIComponent(mainCodeInput);
	var fxncode = encodeURIComponent(fxnCodeInput);
	var params = "vardec="+vardeclaration+"&maincode="+maincode+"&fxncode="+fxncode+"&fxndec="+fxndeclaration;
	
	xmlhttpRequest.open("POST","http://10.0.3.110/it210/codeigniter/apptools/dev/processForm.php",true);
	xmlhttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttpRequest.send(params);
}

function processCode() {
	
	var xmlhttpRequest;
	if (window.XMLHttpRequest)
	  {
	  	xmlhttpRequest=new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
	  }
	else
	  {
	 	 xmlhttpRequest=new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
	  }
	xmlhttpRequest.onreadystatechange=function()
	  {
	  
	  if (xmlhttpRequest.readyState==4 && xmlhttpRequest.status==200)
	    {
		    var serverResponse = xmlhttpRequest.responseText;
		    document.getElementById("result").innerHTML=serverResponse;
	    }
		else {
		}
	  }
	 

	// get the whole code from the text area
	var code = document.getElementById('query_input').value
	code = readCollect(code);
	//alert(code);
	code = encodeURIComponent(code);
	var params = "query_input="+code;

	xmlhttpRequest.open("POST","http://10.0.3.110/it210/codeigniter/apptools/dev/processCode.php",true);
	xmlhttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttpRequest.send(params);

}

/*
	Remove leading and trailing whitespaces from each lexeme.
*/
function removeWhiteSpaces(line) {
	var i;
	var ctr = 0;
	var lexemes = [];

	// remove white spaces from each sides of each lexeme
	for(i=0; i<line.length; i++){
		var lexeme = line[i].trim();

		if(lexeme!="") lexemes[ctr++] = lexeme;
	}

	return lexemes;
}

// Rewrite line of the code
function writeLexemes(lexemes){
	var line = "";
	var i;

	for(i=0;i<lexemes.length;i++)
		line += lexemes[i]+" ";

	return line;
}

/*
	Get variable value from user input
*/
function getVariableValue(variableName){
	var value; // declare value variable

	//don't allow user input to be null
	do{
		// get value of the variable from user input
		value = prompt("Enter value of "+variableName+":");
	}while(value==null);

	// add double quotes if value is not a number
	if(isNaN(value)) value = '"'+value+'"';

	return value; // return value entered by user
}

/*
	Rewrite the code because the value of some variables
	must be from user input.
	Look for the "COLLECT" command.
*/
function readCollect(code){
	var rewritten = ""; // initialize re-written code
	var i;
	var lexemes;
	var lines = code.split("\n"); // split the code per line

	// traverse each line of the code
	for (i=0; i<lines.length; i++){
		// this line of code contains only a newline character
		if(lines[i]==""){
			rewritten += "\n";
			continue;
		}

		var line = lines[i].split(" "); // remove whitespaces
		lexemes = removeWhiteSpaces(line); // remove excess whitespaces

		// if line has lexemes
		if(lexemes.length>0){
			// if collect, rewrite as varname as #
			if(lexemes[0] == "COLLECT"){
				var varname = lexemes[1].replace('#',''); //get variable name
				var value = getVariableValue(lexemes[1]); // get value for the variable name

				rewritten += varname+" AS "+value+"#";
			}
			else rewritten += writeLexemes(lexemes); // append each lexeme to the rewritten code
			rewritten += "\n"; // add newline to the rewritten code
		}
	}

	return rewritten;
}

function resetCode() {
 	location.reload();
}

function addToGrid(widget, target) {
	if (target==TOK_MAIN) {
		gridster[0].add_widget.apply(gridster[0], widget);
	}
	else if (target==TOK_FXN) {
		gridster[1].add_widget.apply(gridster[1],widget);
	}
}

function loadGrid() {
	gridster[0] = $("#dndMainPane").gridster({
		namespace: '#dndMainPane',
		widget_base_dimensions: [80, 80],
		widget_margins: [5, 5],
		max_cols: 50,
		min_cols: 10,
		min_rows: 20,
		shift_widgets_up: false,
        shift_larger_widgets_down: false,
        collision: {
            wait_for_mouseup: true
        },
		autogrow_cols: true
 		
	}).data('gridster');

	gridster[1] = $("#dndFxnPane").gridster({
		namespace: '#dndFxnPane',
		widget_base_dimensions: [80, 80],
		widget_margins: [5, 5],
		max_cols: 50,
		min_cols: 10,
		min_rows: 20,
		shift_widgets_up: false,
        shift_larger_widgets_down: false,
        collision: {
            wait_for_mouseup: true
        },
		autogrow_cols: true
		
	}).data('gridster');
}

function lineTextArea() {
	$(".lined").linedtextarea(
		{}
	);
}

function loadTokens() {
	enumTokens["add"] = "Addition operator";
	enumTokens["sub"] = "Subtraction operator";
	enumTokens["mul"] = "Multiplication operator";
	enumTokens["div"] = "Division operator";
	
	enumTokens["as"] = "Assignment operator";
	
	enumTokens["and"] = "Logical operator AND";
	enumTokens["or"] = "Logical operator OR";
	enumTokens["not"] = "Logical operator NOT";

	enumTokens["eq"] = "Equivalence operator";
	enumTokens["neq"] = "Inequality operator";
	enumTokens["gt"] = "Greater than operator";
	enumTokens["gte"] = "Greater than or equal to operator";
	enumTokens["lt"] = "Less than operator";
	enumTokens["lte"] = "Less than or equal to";

	enumTokens["show"] = "SHOW keyword";
	enumTokens["give"] = "GIVE keyword";
	enumTokens["colelct"] = "COLLECT keyword";

	enumTokens["mbo"] = "MATCHBOAD start identifier";
	enumTokens["holec"] = "HOLE keyword";
	enumTokens["holes"] = "HOLE keyword";
	enumTokens["holest"] = "HOLE keyword";
	enumTokens["mbc"] = "MATCHBOARD end identifier";

	enumTokens["hoola"] = "HOOLA keyword";
	enumTokens["hoop"] = "HOOP keyword";

	enumTokens["ppo"] = "PLAYPEN start identifier";
	enumTokens["ppc"] = "PLAYPEN end identifier";

	enumTokens["find"] = "FIND_PLAYMATE keyword";
	enumTokens["return"] = "RETURN_TO_PLAYMATE keyword";

	enumTokens["com"] = "Delimiter comma";
	enumTokens["hash"] = "Delimiter hash";
	enumTokens["parec"] = "Delimiter close parenthesis";
	enumTokens["pareo"] = "Delimiter open parenthesis";
	enumTokens["semic"] = "Delimiter semicolon";
	enumTokens["expt"] = "Delimiter exclamation point";

	enumTokens["alnum"] = "Input for alphanumeric value";
	
}

$(function(){
	loadGrid();
	loadTokens();
	lineTextArea();
});
