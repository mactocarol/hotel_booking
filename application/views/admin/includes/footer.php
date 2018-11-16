<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 - 2018 <a href="#">Hotel Booking</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/bootstrapValidator.min.js"> </script>
<script src="<?= base_url ('assets/js/bootstrap_form_validation.js');?>"></script>
  <?php if($field == 'Datepicker'){ ?>			
			<!-- InputMask -->
			<script src="<?php echo base_url();?>/assets/plugins/input-mask/jquery.inputmask.js"></script>
			<script src="<?php echo base_url();?>/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
			<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
			<!-- date-range-picker -->
			<script src="<?php echo base_url();?>/assets/bower_components/moment/min/moment.min.js"></script>
			<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
			<!-- bootstrap datepicker -->
			<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
			<!-- bootstrap time picker -->
			<script src="<?php echo base_url();?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
			<!-- SlimScroll -->
			<script src="<?php echo base_url();?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
			<!-- iCheck 1.0.1 -->
			<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>
			<!-- Page script -->
			<script>
			  $(function () {
				//Datemask dd/mm/yyyy
				$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
				//Datemask2 mm/dd/yyyy
				$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
				//Money Euro
				$('[data-mask]').inputmask();
			
				//Date range picker
				$('#reservation').daterangepicker();
				//Date range picker with time picker
				$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
				//Date range as a button
				$('#daterange-btn').daterangepicker(
				  {
					ranges   : {
					  'Today'       : [moment(), moment()],
					  'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					  'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
					  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					  'This Month'  : [moment().startOf('month'), moment().endOf('month')],
					  'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate  : moment()
				  },
				  function (start, end) {
					$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				  }
				);
			
				//Date picker
				$('#datepicker').datepicker({
				  autoclose: true
				});
			
				//iCheck for checkbox and radio inputs
				$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				  checkboxClass: 'icheckbox_minimal-blue',
				  radioClass   : 'iradio_minimal-blue'
				});
				//Red color scheme for iCheck
				$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				  checkboxClass: 'icheckbox_minimal-red',
				  radioClass   : 'iradio_minimal-red'
				});
				//Flat red color scheme for iCheck
				$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				  checkboxClass: 'icheckbox_flat-green',
				  radioClass   : 'iradio_flat-green'
				});
			
			
			
				//Timepicker
				$('.timepicker').timepicker({
				  showInputs: false
				});
			  });
			</script>
  <?php } ?>
  <?php if($field == 'Datatable'){ ?>			
			<!-- DataTables -->
			<script src="<?php echo base_url();?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
			<!-- page script -->
			<script>
			  $(function () {
				$('#example1').DataTable();
				$('#example2').DataTable({
				  'paging'      : true,
				  'lengthChange': false,
				  'searching'   : false,
				  'ordering'    : true,
				  'info'        : true,
				  'autoWidth'   : false
				});
			  });
			</script>
  <?php } ?>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/adminlte.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>
<script>
		$(document).ready(function() {
			$('#add_hotel_form').bootstrapValidator({
				//container: '#messages',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'The Hotel name is required and cannot be empty'
							}
						}
					}, 					
					description: {
						validators: {
							notEmpty: {
								message: 'The Description is required and cannot be empty'
							}
						}
					},
					address: {
						validators: {
							notEmpty: {
								message: 'The Address is required and cannot be empty'
							}
						}
					},
					country: {
						validators: {
							notEmpty: {
								message: 'The country name is required and cannot be empty'
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'The Phone is required and cannot be empty'
							}
						}
					},
					city: {
						validators: {
							notEmpty: {
								message: 'The city name is required and cannot be empty'
							}
						}
					},
					logo: {
						validators: {
							notEmpty: {
								message: 'please select Logo.'
							}
						}
					},
					image: {
						validators: {
							notEmpty: {
								message: 'please select atleast one image.'
							}
						}
					}
				}
			});
		});
		</script>

		<script>
		$(document).ready(function() {
			$('#add_room_form').bootstrapValidator({
				//container: '#messages',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					hotel: {
						validators: {
							notEmpty: {
								message: 'Please select Hotel name'
							}
						}
					}, 					
					description: {
						validators: {
							notEmpty: {
								message: 'The Description is required and cannot be empty'
							}
						}
					},
					room_type: {
						validators: {
							notEmpty: {
								message: 'Please select room type'
							}
						}
					},
					price: {
						validators: {
							notEmpty: {
								message: 'The Price is required and cannot be empty'
							}
						}
					},
					
					image: {
						validators: {
							notEmpty: {
								message: 'please select atleast one image.'
							}
						}
					}
				}
			});
		});
		</script>

</body>
</html>