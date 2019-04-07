
    var tooltipTimeout;

    $("#castleArea").hover(function()
                        {tooltipTimeout = setTimeout(showTooltip, 1000);}, 
                        hideTooltip);

    function showTooltip()
        {
        var tooltip = $("<div id='tooltip' class='tooltip'>I'm the tooltip!</div>");
        tooltip.appendTo($("#castleArea"));
        }

    function hideTooltip()
        {
        clearTimeout(tooltipTimeout);
        $("#tooltip").fadeOut().remove();
        }
