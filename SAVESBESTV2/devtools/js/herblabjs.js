function openDiv(evt, plantContent) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
  
    console.log("evt: "+evt+" content: "+plantContent)
    if(plantContent==="plantStruct"){
      openSlides(evt,"rootSlides");
    }else if(plantContent==="plantRepro"){
      openSlides(evt,"reproSlides");
    }else if(plantContent==="plantDiversity"){
      openSlides(evt,"diverSlides");
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(plantContent).style.display = "block";
    evt.currentTarget.className += " active";

}
/*start of slides content*/
var slideIndex = 1;
var defSlide="rootSlides1";
var defDemo="rootdemo";

//alert(defSlide + defDemo);
showDivs(slideIndex,defSlide,defDemo);

function plusDivs(n,thisSlide,thisDemo) {
  console.log("PLUS: n: "+n+" slide: "+thisSlide+" demo: "+thisDemo);
  showDivs(slideIndex += n,thisSlide,thisDemo);
}

function currentDiv(n,thisSlide,thisDemo) {
  console.log("CURR: n: "+n+" slide: "+thisSlide+" demo: "+thisDemo);
  showDivs(slideIndex = n,thisSlide,thisDemo);
}

function showDivs(n,defSlide,defDemo) {
 // console.log(" n: "+n+" slide: "+defSlide+" demo: "+defDemo);
  var i;
  var x = document.getElementsByClassName(defSlide);
  var dots = document.getElementsByClassName(defDemo);
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
/*end of def div*/

function openSlides(evt, thisSlideSet) {
    // Declare all variables
    var i, slideSet, sideButton,tablinks;
    var slideIndex = 1;

    // Get all elements with class="tabcontent" and hide them
    slideSet = document.getElementsByClassName("slideSet");
    for (i = 0; i < slideSet.length; i++) {
        slideSet[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    sideButton = document.getElementsByClassName("button");
    for (i = 0; i < sideButton.length; i++) {
        sideButton[i].className = sideButton[i].className.replace(" active", "");
    }

    document.getElementById(thisSlideSet).style.display = "block";
    evt.currentTarget.className += " active";


    if(thisSlideSet==="rootSlides"){
      showSlidesDivs(slideIndex,"rootSlides1","rootdemo");
    }else if(thisSlideSet==="stemSlides"){
      showSlidesDivs(slideIndex,"stemSlides2","stemdemo");
    }else if(thisSlideSet==="leafSlides"){
      showSlidesDivs(slideIndex,"leafSlides3","leafdemo");
    }else if(thisSlideSet==="reproSlides"){
      showSlidesDivs(slideIndex,"reproSlides1","reprodemo");
    }else if(thisSlideSet==="diverSlides"){
      showSlidesDivs(slideIndex,"diverSlides1","diverdemo");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
    


}

function showSlidesDivs(n,whichSlide,whichdemo) {
  console.log("slide: "+whichSlide+" demo: "+whichdemo+" n: "+n);
  var i;
  var x = document.getElementsByClassName(whichSlide);
  var dots = document.getElementsByClassName(whichdemo);
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}//end of fxn


function showDiversityDiv(thisLink){
  //console.log("This was called."+" thisLink: "+thisLink);
  document.getElementById('bryophytesDiv').style.display='none';
  document.getElementById('fernalliesDiv').style.display='none';
  document.getElementById('fernsDiv').style.display='none';
  document.getElementById('gymnospermsDiv').style.display='none';
  document.getElementById('angiospermsDiv').style.display='none';
  if(thisLink==="bryophytesLink"){
    var x = document.getElementById('bryophytesDiv');
      if (x.style.display === 'none') {
          x.style.display = 'block';
      }else{
          x.style.display = 'none';
      }
  }else if(thisLink==="fernalliesLink"){
    var x = document.getElementById('fernalliesDiv');
      if (x.style.display === 'none') {
          x.style.display = 'block';
      }else{
          x.style.display = 'none';
      }
  }else if(thisLink==="fernsLink"){
    var x = document.getElementById('fernsDiv');
      if (x.style.display === 'none') {
          x.style.display = 'block';
      }else{
          x.style.display = 'none';
      }
  }else if(thisLink==="gymnospermsLink"){
    var x = document.getElementById('gymnospermsDiv');
      if (x.style.display === 'none') {
          x.style.display = 'block';
      }else{
          x.style.display = 'none';
      }
  }else if(thisLink==="angiospermsLink"){
    var x = document.getElementById('angiospermsDiv');
      if (x.style.display === 'none') {
          x.style.display = 'block';
      }else{
          x.style.display = 'none';
      }
  }
}//end of fxn



var image_path = '/IBS-PROJ/devtools/images/plantStructure/';
var image_path2 = '/IBS-PROJ/devtools/images/plantRepro/';

/*START OF SWAL */
$(document).ready(function() {
  /*SWAL FOR ROOTS SLIDES*/
  var aradicle = new Image();
  aradicle.src = image_path+'radicle.jpg';
    $('#aradicle').click(function() {
        swal({
            title: 'Radicle',
            text: "<img src='"+ aradicle.src +"'/>",
            html: true
        });
    });//end of radicle swal

  var afibrous = new Image();
  afibrous.src = image_path+'fibrous.png';
    $('#afibrous').click(function() {
        swal({
            title: 'Fibrous Root',
            text: "<img src='"+ afibrous.src +"'/>",
            html: true
        });
  });//end of fibrous swal

  var ataproot = new Image();
  ataproot.src = image_path+'taproot.png';
    $('#ataproot').click(function() {
        swal({
            title: 'Tap Root',
            text: "<img src='"+ ataproot.src +"'/>",
            html: true
        });
  });//end of taproot swal

  var astorage = new Image();
  astorage.src = image_path+'wstorage.jpg';
    $('#astorage').click(function() {
        swal({
            title: 'Func: Additional Storage',
            text: "<img style=\"width:300px;height:300px;\" src='"+ astorage.src +"'/>",
            html: true
        });
    });//end of add storage swal

  var asupport = new Image();
  asupport.src = image_path+'fibrous.png';
    $('#asupport').click(function() {
        swal({
            title: 'Func: Support',
            text: "<img style=\"width:300px;height:300px;\" src='"+ asupport.src +"'/>",
            html: true
        });
  });//end of support

  var aphoto = new Image();
  aphoto.src = image_path+'addphotosyn.jpg';
    $('#aphoto').click(function() {
        swal({
            title: 'Func:Addl Photosynthesis',
            text: "<img style=\"width:300px;height:300px;\" src='"+ aphoto.src +"'/>",
            html: true
        });
  });//end of add photosynthesis

  var arespi = new Image();
  arespi.src = image_path+'addrespi.jpg';
    $('#arespi').click(function() {
        swal({
            title: 'Func: Addl Respiration',
            text: "<img style=\"width:300px;height:300px;\" src='"+ arespi.src +"'/>",
            html: true
        });
  });//end of Addl respiration

  var ram = new Image();
  ram.src = image_path+'ram.jpg';
    $('#ram').click(function() {
        swal({
            title: 'Rootapical meristem (RAM)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ ram.src +"'/>",
            html: true
        });
  });//end of RAM

  var secondary = new Image();
  secondary.src = image_path+'secondary.gif';
    $('#secondary').click(function() {
        swal({
            title: 'Secondary Growth',
            text: "<img src='"+ secondary.src +"'/>",
            html: true
        });
  });//end of secondary growth

  var monocot = new Image();
  monocot.src = image_path+'monocot.jpg';
    $('#monocot').click(function() {
        swal({
            title: 'Monocot',
            text: "<img style=\"width:400px;height:400px;\" src='"+ monocot.src +"'/>",
            html: true
        });
  });//end of monocot

  var dicot = new Image();
  dicot.src = image_path+'dicot.jpg';
    $('#dicot').click(function() {
        swal({
            title: 'Dicot',
            text: "<img style=\"width:400px;height:400px;\" src='"+ dicot.src +"'/>",
            html: true
        });
  });//end of dicot

  /*SWAL FOR STEM SLIDES*/
  var plumule = new Image();
  plumule.src = image_path+'plumule.jpg';
    $('#plumule').click(function() {
        swal({
            title: 'Plumule',
            text: "<img src='"+ plumule.src +"'/>",
            html: true
        });
    });//end of pumule swal

  var singleapical = new Image();
  singleapical.src = image_path+'singleapical.png';
    $('#singleapical').click(function() {
        swal({
            title: 'Single Apical Cell Initial',
            text: "<img src='"+ singleapical.src +"'/>",
            html: true
        });
    });//end of single apical swal

  var tunica = new Image();
  tunica.src = image_path+'tunicacorpus.png';
    $('#tunica').click(function() {
        swal({
            title: 'Tunica-corpus',
            text: "<img src='"+ tunica.src +"'/>",
            html: true
        });
    });//end of tunical swal

  var dicotstem = new Image();
  dicotstem.src = image_path+'dicotstem.png';
    $('#dicotstem').click(function() {
        swal({
            title: 'Dicot',
            text: "<img style=\"width:400px;height:400px;\" src='"+ dicotstem.src +"'/>",
            html: true
        });
    });//end of dicotstem swal

  var secgrowth = new Image();
  secgrowth.src = image_path+'secgrowth.jpg';
    $('#secgrowth').click(function() {
        swal({
            title: 'Secondary Growth',
            text: "<img style=\"width:400px;height:400px;\" src='"+ secgrowth.src +"'/>",
            html: true
        });
    });//end of secgrowth swal

  var monocotstem = new Image();
  monocotstem.src = image_path+'monocotstem.jpg';
    $('#monocotstem').click(function() {
        swal({
            title: 'Monocot',
            text: "<img style=\"width:400px;height:400px;\" src='"+ monocotstem.src +"'/>",
            html: true
        });
    });//end of monocotstem swal

  var sclimbing = new Image();
  sclimbing.src = image_path+'sclimbing.jpg';
    $('#sclimbing').click(function() {
        swal({
            title: 'Climbing and support (stem trendils)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ sclimbing.src +"'/>",
            html: true
        });
    });//end of sclimbing swal

  var sprotect = new Image();
  sprotect.src = image_path+'sprotect.jpg';
    $('#sprotect').click(function() {
        swal({
            title: 'Protection (thorns)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ sprotect.src +"'/>",
            html: true
        });
    });//end of sprotect swal

  var srunner = new Image();
  srunner.src = image_path+'srunner.jpeg';
    $('#srunner').click(function() {
        swal({
            title: 'Stolon/Runner',
            text: "<img style=\"width:400px;height:400px;\" src='"+ srunner.src +"'/>",
            html: true
        });
    });//end of srunner swal

  var soffset = new Image();
  soffset.src = image_path+'soffset.gif';
    $('#soffset').click(function() {
        swal({
            title: 'Offset',
            text: "<img style=\"width:400px;height:400px;\" src='"+ soffset.src +"'/>",
            html: true
        });
    });//end of soffset swal

  var sphoto = new Image();
  sphoto.src = image_path+'sphoto.jpg';
    $('#sphoto').click(function() {
        swal({
            title: 'Additional photosynthesis (cladophyll)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ sphoto.src +"'/>",
            html: true
        });
    });//end of sphoto swal

  var stuber = new Image();
  stuber.src = image_path+'stuber.jpg';
    $('#stuber').click(function() {
        swal({
            title: 'Tuber',
            text: "<img style=\"width:400px;height:400px;\" src='"+ stuber.src +"'/>",
            html: true
        });
    });//end of stuber swal

  var scorm = new Image();
  scorm.src = image_path+'scorm.jpg';
    $('#scorm').click(function() {
        swal({
            title: 'Corm',
            text: "<img style=\"width:400px;height:400px;\" src='"+ scorm.src +"'/>",
            html: true
        });
    });//end of scorm swal

  var srhizome = new Image();
  srhizome.src = image_path+'srhizome.png';
    $('#srhizome').click(function() {
        swal({
            title: 'Rhizome',
            text: "<img style=\"width:400px;height:400px;\" src='"+ srhizome.src +"'/>",
            html: true
        });
    });//end of srhizome swal

  var snodes = new Image();
  snodes.src = image_path+'snodes.gif';
    $('#snodes').click(function() {
        swal({
            title: 'Nodes',
            text: "<img style=\"width:400px;height:400px;\" src='"+ snodes.src +"'/>",
            html: true
        });
    });//end of snodes swal

  var sinternodes = new Image();
  sinternodes.src = image_path+'snodes.gif';
    $('#sinternodes').click(function() {
        swal({
            title: 'Internal Nodes',
            text: "<img style=\"width:400px;height:400px;\" src='"+ sinternodes.src +"'/>",
            html: true
        });
    });//end of sinternodes swal

  var saxillary = new Image();
  saxillary.src = image_path+'snodes.gif';
    $('#saxillary').click(function() {
        swal({
            title: 'Axillary Buds',
            text: "<img style=\"width:400px;height:400px;\" src='"+ saxillary.src +"'/>",
            html: true
        });
    });//end of saxillary swal

  var slenticels = new Image();
  slenticels.src = image_path+'snodes.gif';
    $('#slenticels').click(function() {
        swal({
            title: 'Lenticels',
            text: "<img style=\"width:400px;height:400px;\" src='"+ slenticels.src +"'/>",
            html: true
        });
    });//end of slenticels swal

  /*SWAL FOR LEAVES SLIDES*/
  var leaf = new Image();
  leaf.src = image_path+'leaf.jpg';
    $('#leaf').click(function() {
        swal({
            title: 'Leaf',
            text: "<img style=\"width:400px;height:400px;\" src='"+ leaf.src +"'/>",
            html: true
        });
    });//end of pumule swal

  var lsimple = new Image();
  lsimple.src = image_path+'lsimple.jpg';
    $('#lsimple').click(function() {
        swal({
            title: 'Simple',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lsimple.src +"'/>",
            html: true
        });
    });//end of lsimple swal

  var lcompound = new Image();
  lcompound.src = image_path+'lsimple.jpg';
    $('#lcompound').click(function() {
        swal({
            title: 'Compound',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lcompound.src +"'/>",
            html: true
        });
    });//end of lcompound swal

  var lstorage = new Image();
  lstorage.src = image_path+'lstorage.jpg';
    $('#lstorage').click(function() {
        swal({
            title: 'Storage of food',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lstorage.src +"'/>",
            html: true
        });
    });//end of lstorage swal

  var lattract = new Image();
  lattract.src = image_path+'lattract.jpg';
    $('#lattract').click(function() {
        swal({
            title: 'Attraction of pollinators (bracts)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lattract.src +"'/>",
            html: true
        });
    });//end of lattract swal

  var lfloatation = new Image();
  lfloatation.src = image_path+'lfloatation.JPG';
    $('#lfloatation').click(function() {
        swal({
            title: 'Floatation (enlarged petiole)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lfloatation.src +"'/>",
            html: true
        });
    });//end of lfloatation swal

  var lprotect = new Image();
  lprotect.src = image_path+'lprotect.jpg';
    $('#lprotect').click(function() {
        swal({
            title: 'Protection (spines)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lprotect.src +"'/>",
            html: true
        });
    });//end of lprotect swal

  var lsupport = new Image();
  lsupport.src = image_path+'lsupport.jpg';
    $('#lsupport').click(function() {
        swal({
            title: 'Support (leaf tendril)',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lsupport.src +"'/>",
            html: true
        });
    });//end of lsupport swal

  var lasexual = new Image();
  lasexual.src = image_path+'leaf.jpg';
    $('#lasexual').click(function() {
        swal({
            title: 'Asexual Reproduction',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lasexual.src +"'/>",
            html: true
        });
    });//end of lasexual swal

  var lcarnivory = new Image();
  lcarnivory.src = image_path+'lcarnivory.jpg';
    $('#lcarnivory').click(function() {
        swal({
            title: 'Carnivory',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lcarnivory.src +"'/>",
            html: true
        });
    });//end of lcarnivory swal

  var ltissues = new Image();
  ltissues.src = image_path+'ltissues.jpg';
    $('#ltissues').click(function() {
        swal({
            title: 'Leaf Tissues',
            text: "<img style=\"width:400px;height:400px;\" src='"+ ltissues.src +"'/>",
            html: true
        });
    });//end of ltissues swal

  var lstomata = new Image();
  lstomata.src = image_path+'lstomata.jpg';
    $('#lstomata').click(function() {
        swal({
            title: 'Stomata',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lstomata.src +"'/>",
            html: true
        });
    });//end of lstomata swal

  var ltrichomes = new Image();
  ltrichomes.src = image_path+'ltrichomes.jpg';
    $('#ltrichomes').click(function() {
        swal({
            title: 'Trichomes',
            text: "<img style=\"width:400px;height:400px;\" src='"+ ltrichomes.src +"'/>",
            html: true
        });
    });//end of ltrichomes swal

  var lmonocots = new Image();
  lmonocots.src = image_path+'lmonocots.jpg';
    $('#lmonocots').click(function() {
        swal({
            title: 'Monocots',
            text: "<img style=\"width:400px;height:400px;\" src='"+ lmonocots.src +"'/>",
            html: true
        });
    });//end of lmonocots swal

  /*SWAL FOR REPRO SLIDES*/
  var rpropagules = new Image();
  rpropagules.src = image_path2+'rpropagules.png';
    $('#rpropagules').click(function() {
        swal({
            title: 'Vegetative Propagules',
            text: "<img style=\"width:400px;height:400px;\" src='"+ rpropagules.src +"'/>",
            html: true
        });
    });//end of rpropagules swal

  var rartificial = new Image();
  rartificial.src = image_path2+'rartificial.png';
    $('#rartificial').click(function() {
        swal({
            title: 'Artificial Propagation',
            text: "<img style=\"width:400px;height:400px;\" src='"+ rartificial.src +"'/>",
            html: true
        });
    });//end of rartificial swal

  var rsporogenesis = new Image();
  rsporogenesis.src = image_path2+'rsporogenesis.png';
    $('#rsporogenesis').click(function() {
        swal({
            title: 'Sporogenesis',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rsporogenesis.src +"'/>",
            html: true
        });
    });//end of rsporogenesis swal

  var rgametogenesis = new Image();
  rgametogenesis.src = image_path2+'rsporogenesis.png';
    $('#rgametogenesis').click(function() {
        swal({
            title: 'Gametogenesis',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rgametogenesis.src +"'/>",
            html: true
        });
    });//end of rgametogenesis swal

  var rliverworts = new Image();
  rliverworts.src = image_path2+'rliverworts.png';
    $('#rliverworts').click(function() {
        swal({
            title: 'Liverworts',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rliverworts.src +"'/>",
            html: true
        });
    });//end of rliverworts swal

  var rmosses = new Image();
  rmosses.src = image_path2+'rmosses.png';
    $('#rmosses').click(function() {
        swal({
            title: 'Mosses',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rmosses.src +"'/>",
            html: true
        });
    });//end of rmosses swal

  var rferns = new Image();
  rferns.src = image_path2+'rferns.png';
    $('#rferns').click(function() {
        swal({
            title: 'Ferns',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rferns.src +"'/>",
            html: true
        });
    });//end of rferns swal

  var rlycophytes = new Image();
  rlycophytes.src = image_path2+'rlycophytes.png';
    $('#rlycophytes').click(function() {
        swal({
            title: 'Lycophytes',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rlycophytes.src +"'/>",
            html: true
        });
    });//end of rlycophytes swal

  var rgymnosperms = new Image();
  rgymnosperms.src = image_path2+'rgymnosperms.png';
    $('#rgymnosperms').click(function() {
        swal({
            title: 'Sporogenesis',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rgymnosperms.src +"'/>",
            html: true
        });
    });//end of rgymnosperms swal

  var rangiosperms = new Image();
  rangiosperms.src = image_path2+'rangiosperms.png';
    $('#rangiosperms').click(function() {
        swal({
            title: 'Angiosperms',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rangiosperms.src +"'/>",
            html: true
        });
    });//end of rangiosperms swal

  var rcycads = new Image();
  rcycads.src = image_path2+'rcycads.png';
    $('#rcycads').click(function() {
        swal({
            title: 'Cycads',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rcycads.src +"'/>",
            html: true
        });
    });//end of rcycads swal

  var rginkgoes = new Image();
  rginkgoes.src = image_path2+'rginkgoes.png';
    $('#rginkgoes').click(function() {
        swal({
            title: 'Ginkgoes',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rginkgoes.src +"'/>",
            html: true
        });
    });//end of rginkgoes swal

  var rflower = new Image();
  rflower.src = image_path2+'rflower.png';
    $('#rflower').click(function() {
        swal({
            title: 'Flower',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rflower.src +"'/>",
            html: true
        });
    });//end of rflower swal

  var ranther = new Image();
  ranther.src = image_path2+'ranther.png';
    $('#ranther').click(function() {
        swal({
            title: 'Anther',
            text: "<img style=\"width:450px;height:400px;\" src='"+ ranther.src +"'/>",
            html: true
        });
    });//end of ranther swal

  var rovary = new Image();
  rovary.src = image_path2+'rovary.png';
    $('#rovary').click(function() {
        swal({
            title: 'Ovary',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rovary.src +"'/>",
            html: true
        });
    });//end of rovary swal

  var rvariations = new Image();
  rvariations.src = image_path2+'rvariations.png';
    $('#rvariations').click(function() {
        swal({
            title: 'Variations',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rvariations.src +"'/>",
            html: true
        });
    });//end of rvariations swal

  var rcompositions = new Image();
  rcompositions.src = image_path2+'rcompositions.png';
    $('#rcompositions').click(function() {
        swal({
            title: 'Compositions',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rcompositions.src +"'/>",
            html: true
        });
    });//end of rcompositions swal

  var rdoublefert = new Image();
  rdoublefert.src = image_path2+'rdoublefert.png';
    $('#rdoublefert').click(function() {
        swal({
            title: 'Double Fertilization',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rdoublefert.src +"'/>",
            html: true
        });
    });//end of rdoublefert swal

  var rfruit = new Image();
  rfruit.src = image_path2+'rfruit.png';
    $('#rfruit').click(function() {
        swal({
            title: 'Fruit',
            text: "<img style=\"width:450px;height:400px;\" src='"+ rfruit.src +"'/>",
            html: true
        });
    });//end of rfruit swal

  var rfruittype = new Image();
  rfruittype.src = image_path2+'rfruittype.png';
    $('#rfruittype').click(function() {
        swal({
            title: 'Fruit Type',
            text: "<img style=\"width:450px;height:300px;\" src='"+ rfruittype.src +"'/>",
            html: true
        });
    });//end of rfruittype swal


$("#xbryophytesDiv").click(function(){
        $('#bryophytesDiv').hide();
});

$("#xfernalliesDiv").click(function(){
        $('#fernalliesDiv').hide();
});

$("#xfernsDiv").click(function(){
        $('#fernsDiv').hide();
});

$("#xgymnospermsDiv").click(function(){
        $('#gymnospermsDiv').hide();
});

$("#xangiospermsDiv").click(function(){
        $('#angiospermsDiv').hide();
});



}); //end of document ready

document.getElementById("defaultOpen").click();
document.getElementById("defaultOpenRoot").click();


