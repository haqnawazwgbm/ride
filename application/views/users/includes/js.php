<script src="<?php echo base_url(); ?>assets/js/moment-with-locales.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>	

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/wColorPicker-master/wColorPicker.min.js"></script>	

<script type="text/javascript">
	$(document).ready(function(){
		// $(".drop-login-form").hide();
		$('.already-have-account').click(function(){
			$('.drop-login-form').fadeToggle();
		})
		jQuery.fn.extend({
				    size: function() {
				        return $(this).length;
				    }
		});
		 $('.date').datetimepicker({format: 'YYYY-MM-DD',minDate: new Date()});
		 $('.birth-date').datetimepicker({format: 'YYYY-MM-DD'});

		 $('.only-date').datetimepicker({format: 'YYYY-MM-DD',minDate: new Date()});
		 $('.only-time').datetimepicker({format: 'HH:mm:ss'});


		   $("#wColorPicker").wColorPicker({
		   	format: 'colorname',
    onSelect: function(color){
        $("#wColorPicker_input").css('background', color).val(color);
    },
    onMouseover: function(color){
        $("#wColorPicker_input").css('background', color).val(color);
    },
    onMouseout: function(color){
        $("#wColorPicker_input").css('background', color).val(color);
    }
});
		   $('#term-conditions').click(function() {
				 if($(".btn-book").is(':disabled'))
				 {
				    $('.btn-book').prop( "disabled", false );

				} else {
					$('.btn-book').prop( "disabled", true );
				}
		   })

		   $('.owner-contact').click(function() {
		   		var contact = $(this).attr('contact');
		   		$(this).html('<i class="fa fa-phone" aria-hidden="true"></i> ' + contact);
		   		return false;
		   })

	})


</script>