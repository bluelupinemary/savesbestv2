function main() {
        
// a cross reference of area names to text to be shown for each area
    var x = document.getElementById('castleElems');
    
    var defaultDipTooltip = 'default tool tip';
    
    var image = $('#map-areas');

    image.mapster(
    {
        fillOpacity: 0.3,
        fillColor: "555555",
        stroke: true,
        strokeColor: "FFCC00",
        strokeOpacity: 0.8,
        strokeWidth: 5,
        singleSelect: true,
        mapKey: 'name',
        listKey: 'name',
       
            onMouseover: function(e) {
                $(this).mapster('set',false).mapster('set',true);
            },
            onMouseout: function(e) { 
                 $(this).mapster('set',false);
            },
            //onClick: go,
            onClick: function(data){
                if (data.key === 'castle') {
                    //window.open('castlePage','_self');
                    if (x.style.display === 'none') {
                        x.style.display = 'block';
                    }else {
                        x.style.display = 'none';
                    }
                }
                if(data.key === 'grassland'){
                    window.open('grasslandPage','_self');
                    //window.location.href = "http://localhost/IBS-PROJ/index.php/home/grasslandPage/";
                }
                if (data.key === 'agriland') {
                    window.open('agrilandPage','_self');
                }
                if(data.key === 'rainforest'){
                    window.open('rainforestPage','_self');
                }
                if(data.key === 'cliff'){
                    window.open('cliffPage','_self');
                }
            },
        //showToolTip: true,
        toolTipClose: ["tooltip-click", "area-click"],
        areas: [
            {
                key: "grassland",
                strokeColor:"00ff00"
            },
            {
                key: "agriland",
                strokeColor: "990000"
            },
            {
                key: "castle",
                toolTip: defaultDipTooltip
            },
            {
                key: "rainforest",
                strokeColor: "00BFFF"
            },
            {
                key: "cliff",
                strokeColor: "0000AA"
            }
            ]
    });

}//end of main fxn

$(document).ready(main);

//$(document).ready(function() {
  
//}
