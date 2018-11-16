$(document).ready(function(){
	$('#check_details').hide();
	$('.book_menu'). click(function (){
		$('#check_details').toggle();
	
	$('.1stchildren_age').hide();
	$('.2stchildren_age').hide();
	$('.3stchildren_age').hide();
	$('.4stchildren_age').hide();
	$('.5stchildren_age').hide();
	
	var no= $('.chil_no').val();

	if (no !=0)
	{
		if (no==1){

			$('.1stchildren_age').show();
			$('.2stchildren_age').hide();
			$('.3stchildren_age').hide();
			$('.4stchildren_age').hide();
			$('.5stchildren_age').hide();
		}
		if (no==2){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').hide();
			$('.4stchildren_age').hide();
			$('.5stchildren_age').hide();
		}
		if (no==3){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').show();
			$('.4stchildren_age').hide();
			$('.5stchildren_age').hide();
		}
		if (no==4){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').show();
			$('.4stchildren_age').show();
			$('.5stchildren_age').hide();
		}
		if (no==5){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').show();
			$('.4stchildren_age').show();
			$('.5stchildren_age').show();
		}
	}
	$('.chil_no'). change(function (){

		var no= $('.chil_no').val();
		
		if (no==0){
			$('.1stchildren_age').hide();
			$('.2stchildren_age').hide();
			$('.3stchildren_age').hide();
			$('.4stchildren_age').hide();
			$('.5stchildren_age').hide();
			
		}
		if (no==1){

			$('.1stchildren_age').show();
			$('.2stchildren_age').hide();
			$('.3stchildren_age').hide();
			$('.4stchildren_age').hide();
			$('.5stchildren_age').hide();
		}
		if (no==2){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').hide();
			$('.4stchildren_age').hide();
			$('.5stchildren_age').hide();
		}
		if (no==3){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').show();
			$('.4stchildren_age').hide();
			$('.5stchildren_age').hide();
		}
		if (no==4){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').show();
			$('.4stchildren_age').show();
			$('.5stchildren_age').hide();
		}
		if (no==5){
			$('.1stchildren_age').show();
			$('.2stchildren_age').show();
			$('.3stchildren_age').show();
			$('.4stchildren_age').show();
			$('.5stchildren_age').show();
		}



	});

	$('#close'). click(function (){
		$('#check_details').hide();
	});
	$('#check_details').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    });
	$("body").mouseup(function(){ 
		if(! mouse_is_inside) $('#check_details').hide();
	});
	
	});
	var adults= parseInt($('#adults').val());
	var chil_no= parseInt($('.chil_no').val());
	var Guest= adults+chil_no;
	
	var rooms= $('#rooms').val();

	$('.book_menu').val(rooms+'/'+ Guest+ 'Guest');
	$('#rooms'). change(function (){
		var adults= parseInt($('#adults').val());
		var chil_no= parseInt($('.chil_no').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms').val();
		$('.book_menu').val(rooms+'/'+ Guest+ 'Guest');
	});
	$('#adults'). change(function (){
		var adults= parseInt($('#adults').val());
		var chil_no= parseInt($('.chil_no').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms').val();
		$('.book_menu').val(rooms+'/'+ Guest+' '+ 'Guest');
	});
	$('.chil_no'). change(function (){
		var adults= parseInt($('#adults').val());
		var chil_no= parseInt($('.chil_no').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms').val();
		$('.book_menu').val(rooms+'/'+ Guest+ ' Guest');
	});
});


$(document).ready(function(){
	$('#check_details1').hide();
	$('.book_menu1'). click(function (){
		$('#check_details1').toggle();
	
	$('.1stchildren_age1').hide();
	$('.2stchildren_age1').hide();
	$('.3stchildren_age1').hide();
	$('.4stchildren_age1').hide();
	$('.5stchildren_age1').hide();
	
	var no= $('.chil_no1').val();

	if (no !=0)
	{
		if (no==1){

			$('.1stchildren_age1').show();
			$('.2stchildren_age1').hide();
			$('.3stchildren_age1').hide();
			$('.4stchildren_age1').hide();
			$('.5stchildren_age1').hide();
		}
		if (no==2){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').hide();
			$('.4stchildren_age1').hide();
			$('.5stchildren_age1').hide();
		}
		if (no==3){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').show();
			$('.4stchildren_age1').hide();
			$('.5stchildren_age1').hide();
		}
		if (no==4){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').show();
			$('.4stchildren_age1').show();
			$('.5stchildren_age1').hide();
		}
		if (no==5){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').show();
			$('.4stchildren_age1').show();
			$('.5stchildren_age1').show();
		}
	}
	$('.chil_no1'). change(function (){

		var no= $('.chil_no1').val();
		
		if (no==0){
			$('.1stchildren_age1').hide();
			$('.2stchildren_age1').hide();
			$('.3stchildren_age1').hide();
			$('.4stchildren_age1').hide();
			$('.5stchildren_age1').hide();
			
		}
		if (no==1){

			$('.1stchildren_age1').show();
			$('.2stchildren_age1').hide();
			$('.3stchildren_age1').hide();
			$('.4stchildren_age1').hide();
			$('.5stchildren_age1').hide();
		}
		if (no==2){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').hide();
			$('.4stchildren_age1').hide();
			$('.5stchildren_age1').hide();
		}
		if (no==3){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').show();
			$('.4stchildren_age1').hide();
			$('.5stchildren_age1').hide();
		}
		if (no==4){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').show();
			$('.4stchildren_age1').show();
			$('.5stchildren_age1').hide();
		}
		if (no==5){
			$('.1stchildren_age1').show();
			$('.2stchildren_age1').show();
			$('.3stchildren_age1').show();
			$('.4stchildren_age1').show();
			$('.5stchildren_age1').show();
		}



	});

	$('#close1'). click(function (){
		$('#check_details1').hide();
	});
	$('#check_details1').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    });
	$("body").mouseup(function(){ 
		if(! mouse_is_inside) $('#check_details1').hide();
	});
	
	});
	var adults= parseInt($('#adults1').val());
	var chil_no= parseInt($('.chil_no1').val());
	var Guest= adults+chil_no;
	
	var rooms= $('#rooms1').val();

	$('.book_menu1').val(rooms+'/'+ Guest+ 'Guest');
	$('#rooms1'). change(function (){
		var adults= parseInt($('#adults1').val());
		var chil_no= parseInt($('.chil_no1').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms1').val();
		$('.book_menu1').val(rooms+'/'+ Guest+ 'Guest');
	});
	$('#adults1'). change(function (){
		var adults= parseInt($('#adults1').val());
		var chil_no= parseInt($('.chil_no1').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms1').val();
		$('.book_menu1').val(rooms+'/'+ Guest+' '+ 'Guest');
	});
	$('.chil_no1'). change(function (){
		var adults= parseInt($('#adults1').val());
		var chil_no= parseInt($('.chil_no1').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms1').val();
		$('.book_menu1').val(rooms+'/'+ Guest+ ' Guest');
	});
});

// for three room
$(document).ready(function(){
	$('#check_details2').hide();
	$('.book_menu2'). click(function (){
		$('#check_details2').toggle();
	
	$('.1stchildren_age2').hide();
	$('.2stchildren_age2').hide();
	$('.3stchildren_age2').hide();
	$('.4stchildren_age2').hide();
	$('.5stchildren_age2').hide();
	
	var no= $('.chil_no2').val();

	if (no !=0)
	{
		if (no==1){

			$('.1stchildren_age2').show();
			$('.2stchildren_age2').hide();
			$('.3stchildren_age2').hide();
			$('.4stchildren_age2').hide();
			$('.5stchildren_age2').hide();
		}
		if (no==2){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').hide();
			$('.4stchildren_age2').hide();
			$('.5stchildren_age2').hide();
		}
		if (no==3){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').show();
			$('.4stchildren_age2').hide();
			$('.5stchildren_age2').hide();
		}
		if (no==4){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').show();
			$('.4stchildren_age2').show();
			$('.5stchildren_age2').hide();
		}
		if (no==5){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').show();
			$('.4stchildren_age2').show();
			$('.5stchildren_age2').show();
		}
	}
	$('.chil_no2'). change(function (){

		var no= $('.chil_no2').val();
		
		if (no==0){
			$('.1stchildren_age2').hide();
			$('.2stchildren_age2').hide();
			$('.3stchildren_age2').hide();
			$('.4stchildren_age2').hide();
			$('.5stchildren_age2').hide();
			
		}
		if (no==1){

			$('.1stchildren_age2').show();
			$('.2stchildren_age2').hide();
			$('.3stchildren_age2').hide();
			$('.4stchildren_age2').hide();
			$('.5stchildren_age2').hide();
		}
		if (no==2){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').hide();
			$('.4stchildren_age2').hide();
			$('.5stchildren_age2').hide();
		}
		if (no==3){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').show();
			$('.4stchildren_age2').hide();
			$('.5stchildren_age2').hide();
		}
		if (no==4){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').show();
			$('.4stchildren_age2').show();
			$('.5stchildren_age2').hide();
		}
		if (no==5){
			$('.1stchildren_age2').show();
			$('.2stchildren_age2').show();
			$('.3stchildren_age2').show();
			$('.4stchildren_age2').show();
			$('.5stchildren_age2').show();
		}



	});

	$('#close2'). click(function (){
		$('#check_details2').hide();
	});
	$('#check_details2').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    });
	$("body").mouseup(function(){ 
		if(! mouse_is_inside) $('#check_details2').hide();
	});
	
	});
	var adults= parseInt($('#adults2').val());
	var chil_no= parseInt($('.chil_no2').val());
	var Guest= adults+chil_no;
	
	var rooms= $('#rooms2').val();

	$('.book_menu2').val(rooms+'/'+ Guest+ 'Guest');
	$('#rooms2'). change(function (){
		var adults= parseInt($('#adults2').val());
		var chil_no= parseInt($('.chil_no2').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms2').val();
		$('.book_menu2').val(rooms+'/'+ Guest+ 'Guest');
	});
	$('#adults2'). change(function (){
		var adults= parseInt($('#adults2').val());
		var chil_no= parseInt($('.chil_no2').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms2').val();
		$('.book_menu2').val(rooms+'/'+ Guest+' '+ 'Guest');
	});
	$('.chil_no2'). change(function (){
		var adults= parseInt($('#adults2').val());
		var chil_no= parseInt($('.chil_no2').val());
		var Guest= adults+chil_no;
		var rooms= $('#rooms2').val();
		$('.book_menu2').val(rooms+'/'+ Guest+ ' Guest');
	});
});