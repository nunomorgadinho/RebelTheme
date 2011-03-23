<?php

function form() {
	
?>

<div class="contact-form">
	<form action="<?php echo THEMESCRIPTS_URI . '/' . basename(__FILE__) . '?send=send'; ?>" method="post" class="contact">
		<fieldset>
			<p class="input"><input type="text" title="Name and Surname" class="text" name="from_name" id="from_name" /></p>
			<p class="input"><input type="text" title="E-Mail Address" class="text" name="from_email" id="from_email" /></p>
			<p class="input textarea">
				<textarea rows="" cols="" name="from_message" id="from_message"></textarea>
				<input type="submit" value="" class="submit" />
			</p>
		</fieldset>
	</form>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('form.contact .submit').click(function(){
			
			var error = false;
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			var from_name = $('form.contact #from_name').val();
			if (from_name == '') {
				$('form.contact #from_name').val('Please enter your name!');
				error = true;
			}
			
			var from_email = $('form.contact #from_email').val();
			if (from_email == '' || !emailReg.test(from_email)) {
				$('form.contact #from_email').val('Please enter a valid email!');
				error = true;
			}
			
			var from_message = $('form.contact #from_message').val();
			if (from_message == '') {
				$('form.contact #from_message').val('Please enter your message!');
				error = true;
			}
			
			if (!error) {
				$(this).hide();
				
				$.post('<?php echo THEMESCRIPTS_URI . '/' . basename(__FILE__) . '?send=send'; ?>',
					{
						title : '<?php bloginfo('name'); ?>',
						to_email : '<?php echo option('contact_email'); ?>',
						from_name : from_name,
						from_email: from_email,
						from_message: from_message
					},
					function(data) {
						$('form.contact fieldset').slideUp('normal', function() {
							$('form.contact fieldset').before('<p><b><?php echo option('contact_message'); ?></b></p>');
						});
					}
				);
			}
			
			return false;
		});
	});
	
</script>

<?php

}

if (isset($_GET['send'])) {
	mail(
		$_POST['to_email'],
		'Message from ' . $_POST['title'],
		$_POST['from_message'],
		'From: ' . $_POST['from_name'] . ' <' . $_POST['from_email'] . '>'
	);

} else {
	form();
}

?>