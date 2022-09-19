					 
$(function() {
 
	$('.uchart').easyPieChart({
		size: 100,
        trackColor: '#e2e2e2',
        scaleColor:false,
        lineWidth: 8,
		barColor:"#D23435"
		});
		$('.gigchart').easyPieChart({
			size: 100,
        trackColor: '#e2e2e2',
        scaleColor:false,
        lineWidth: 8,
		barColor:"#9ABB30"
		});
		$('.orderchart').easyPieChart({
			size: 100,
        trackColor: '#e2e2e2',
        scaleColor:false,
        lineWidth: 8,
		barColor:"#3C84BF"
		});
		$('.reqchart').easyPieChart({
			size: 100,
        trackColor: '#e2e2e2',
        scaleColor:false,
        lineWidth: 8,
		barColor:"#CE59DE"
		});
	
});

    
$(function() {
    /** This code runs when everything has been loaded on the page */
    /* Inline sparklines take their values from the contents of the tag */
    $('.inlinesparkline').sparkline(); 

    /* Sparklines can also take their values from the first argument 
    passed to the sparkline() function */
    var myvalues = [10,8,5,7,4,4,1];
    $('.dynamicsparkline').sparkline(myvalues);

    /* The second argument gives options such as chart type */
    $('.dynamicbar').sparkline(myvalues, {type: 'bar', barColor: 'green'} );

    /* Use 'html' instead of an array of values to pass options 
    to a sparkline with data in the tag */
    $('.inlinebar').sparkline('html', {type: 'bar', barColor: '#00a64b'} );
});
 