<footer>
	<div class="container">
    	<div class="col-md-3">
        	<h3>contact info</h3>
            <p><span>london</span> <i class="fa fa-phone"></i> +6-356-356955</p>
            <p><span>new york</span> <i class="fa fa-phone"></i> +6-356-356955</p>
            <p><span>tokyo</span> <i class="fa fa-phone"></i> +6-356-356955</p>
            <p><span> <i class="fa fa-envelope"></i></span> test@gmail.com</p>
        </div>
        <div class="col-md-3">
        	<h3>about us</h3>
            <ul>
            	<li><a href="#">our story</a></li>
                <li><a href="#">travel blog  & tips</a></li>
                <li><a href="#">working with us</a></li>
                <li><a href="#">be our  partner</a></li>
            </ul>
        </div>
        <div class="col-md-3">
        	<h3>suport</h3>
            <ul>
            	<li><a href="#">our story</a></li>
                <li><a href="#">travel blog  & tips</a></li>
                <li><a href="#">working with us</a></li>
                <li><a href="#">be our  partner</a></li>
            </ul>
        </div>
        <div class="col-md-3">
        	<h3>pay safly with us</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
    </div>
</footer>
<div class="bottom_footer">
	<div class="container">
    	<div class="col-md-6">Copyright 2020 company, All Right Reserved</div>
        <div class="col-md-6">
        	
            	<p class="pull-right"><a href="#"><i class="fa fa-twitter"></i> </a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i> </a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-google"></i></a></p>
                 
            
        </div>
    </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url ();?>assets/js/myjquery.js"></script>
    <script src="<?= base_url ();?>assets/js/bootstrapValidator.min.js"></script>
    <script src="<?= base_url ();?>assets/js/bootstrap_form_validation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/easy-responsive-tabs.js"></script>
    
    <?php if($page == 'hotel_list') {?>
     <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/star-rating.js"></script>
    <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.numberformatter-1.2.3.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tmpl.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slider.js"></script>
    <script type="text/javascript" charset="utf-8">
      jQuery(".Slider1").slider({ from: 20, to: 4000, step: 50, smooth: true, round: 0, dimension: "&nbsp;$", skin: "plastic" });
    </script>
    <script>
        
        $('#filter_form').on('click', function(){
           //alert('kk');
           <?php $uri = $this->uri->segment(2);?>
           console.log('<?=$uri?>');
           <?php if($this->uri->segment(2) == 'lists'){
            $url = site_url('hotel_list/lists');            
           }else {
            $url = site_url('hotel_list/index');
           }?>
            $.ajax({
                //url: '<?php echo site_url('hotel_list/index')?>',
                url: '<?php echo $url;?>',
                type: 'post',
                //dataType: 'json',
                data: $('form#filter_form').serialize(),
                beforeSend: function() {
                    $(".loader").show();
                },
                success: function(response) {
                          console.log(response);
                          document.getElementById('filter_room').innerHTML = response;
                          $.getScript("<?php echo base_url(); ?>assets/js/star-rating.js");
                          $(".loader").hide();
                         }
            });
        });
    </script>
     <script>
    $(document).on('ready', function () {
            $('.kv-gly-star').rating({
                containerClass: 'is-star'
            });
            
        });
    </script>
      <script>
            $(document).ready(function(){
                var $options = $('.sorting');
                $options.click(function(e){
                    var $current = $(this);
                    //alert($current);
                    //console.log($current);
                    e.preventDefault();
                    e.stopPropagation();
                    $options.removeClass('active');
                    $current.addClass('active');
                    $('input', $current).prop('checked', true);
                    $( "#filter_form" ).trigger( "click" );
                    });
                });
            
        $("#infoToggler").click(function() {
            $(this).find('img').toggle();
            var val = $('#sort_type').val();
            if(val  === 'desc'){ $('#sort_type').val('asc'); }
            if(val  === 'asc'){ $('#sort_type').val('desc'); }
            $( "#filter_form" ).trigger( "click" );
            return false;
        });                    
        </script>
    <?php } ?>
    <?php if($page == 'hotel_detail') {?>
    <script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/js/easy-responsive-tabs.js"></script>
    <script type="text/javascript">
   
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 150,
        itemMargin: 7,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
	  $('#slider1').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  <script>
    $(document).ready(function () {
    $('#romm_detail_tab').easyResponsiveTabs({
    type: 'default', //Types: default, vertical, accordion           
    width: 'auto', //auto or any width like 600px
    fit: true,   // 100% fit in a container
    closed: 'accordion', // Start closed if in accordion view
    activate: function(event) { // Callback function if tab is switched
    var $tab = $(this);
    var $info = $('#tabInfo');
    var $name = $('span', $info);
    $name.text($tab.text());
    $info.show();
    }
    });
    
    });
    </script>
    <?php } ?>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    
    $( "#destination" ).autocomplete({
      minLength: 3,
      source: '<?php echo site_url();?>home/search_destination',
      focus: function( event, ui ) {
        $( "#destination" ).val( ui.item.value );
        return false;
      },
      select: function( event, ui ) {
        //console,log(ui.item.value);
        $( "#destination" ).val(ui.item.value);
        $( "#destination_hidden" ).val( ui.item.key );
      
        return false;
      } 
	  });
 
  });
  
  $(function() {
    
    $( "#hotel_search" ).autocomplete({
      minLength: 3,
      source: '<?php echo site_url();?>hotel_list/search_hotel',
      focus: function( event, ui ) {
        $( "#hotel_search" ).val( ui.item.value );
        return false;
      },
      select: function( event, ui ) {
        //console,log(ui.item.value);
        $( "#hotel_search" ).val(ui.item.value);
        $( "#hotel_search_hidden" ).val( ui.item.key );
      
        return false;
      } 
	  });
 
  });
  </script>
  <script type="text/javascript">
      $('#pic').hide();
$('#upload').click(function(){
                    $("#pic" ).trigger( "click" ); 
                });
$('#pic').change(function(){
$('#btn1').trigger('click');
});
  </script>
  <script>
    function post_value(){
        //alert('');
        $("#formId").submit();
        //return false;
    }
</script>  
<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
  <!--<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>-->
  <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    $( "#datepicker1" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
  </body>
</html>
