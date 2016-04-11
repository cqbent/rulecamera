<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>

		</div><!-- .col-full -->
	</div><!-- #content -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">
			<ul class="footer-columns">
				<li class="col col-1">
					<p>
						<a href="http://www.rule.com">Rule Boston Camera</a><br/>
						<strong>Mailing Address</strong><br />
						1284 Soldiers Field Road<br />
						Boston, MA 02135
					</p>
					<p>
						<strong>Drop-offs and Pick-ups</strong><br />
						395 Western Avenue<br />
						Boston, MA 02135
					</p>

				</li>
				<li class="col col-2">
					<p>
						<strong>Toll Free:</strong>	800.785.3266<br/>
						<strong>Phone:</strong>	617.277.2200<br />
						<strong>24 Hour Pager:</strong>	617.277.2200<br />
						<strong>Fax:</strong>	617.277.6800
					</p>
					<p>
						<strong>Email:</strong>	<a href="mailto:answers@rule.com">answers@rule.com</a><br />
						<strong>Staff Extensions:</strong>	See our staff directory<br />
						<strong>Hours:</strong>	Monday-Friday<br />
						8:00am-5:30pm
					</p>
					<p>
						We accept Visa, PayPal, Mastercard, <br />Discover, American Express
					</p>
				</li>
				<li class="col-3">
					<div class="tagline">
						Discounts, events, cool new products! <br />
						<a href="#" class="signup">Join our mailing list >></a>
						<!--Begin CTCT Sign-Up Form-->
						<!-- EFD 1.0.0 [Mon Apr 11 12:33:25 EDT 2016] -->
						<link rel='stylesheet' type='text/css' href='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/css/signup-form.css'>
						<div id="cc-signup" class="ctct-embed-signup">
							<div class="container">
							   <span id="success_message" style="display:none;">
								   <div style="text-align:center;">Thanks for signing up!</div>
							   </span>
								<form data-id="embedded_signup:form" class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
									<h2 style="margin:0;">Registration</h2>
									<p>Thanks for your interest in joining our mailing list. Please complete the information below and click Sign Up.</p>
									<!-- The following code must be included to ensure your sign-up form works properly. -->
									<input data-id="ca:input" type="hidden" name="ca" value="0bb4c33e-777c-48ab-8839-1bf5265aef83">
									<input data-id="source:input" type="hidden" name="source" value="EFD">
									<input data-id="required:input" type="hidden" name="required" value="list,email">
									<input data-id="url:input" type="hidden" name="url" value="">
									<p data-id="Email Address:p" ><label data-id="Email Address:label" data-name="email" class="ctct-form-required">Email Address</label> <input data-id="Email Address:input" type="text" name="email" value="" maxlength="80"></p>
									<p data-id="First Name:p" ><label data-id="First Name:label" data-name="first_name">First Name</label> <input data-id="First Name:input" type="text" name="first_name" value="" maxlength="50"></p>
									<p data-id="Last Name:p" ><label data-id="Last Name:label" data-name="last_name">Last Name</label> <input data-id="Last Name:input" type="text" name="last_name" value="" maxlength="50"></p>
									<p data-id="Lists:p" ><label data-id="Lists:label" data-name="list" class="ctct-form-required">Email Lists</label><div><input data-id="Lists:input" type="checkbox" name="list_0" value="88"><span data-id="Lists:span">*EVENTS</span></div><div><input data-id="Lists:input" type="checkbox" name="list_1" value="102"><span data-id="Lists:span">Events</span></div><div><input data-id="Lists:input" type="checkbox" name="list_2" value="1169314895"><span data-id="Lists:span">MoVI Events</span></div><div><input data-id="Lists:input" type="checkbox" name="list_3" value="103"><span data-id="Lists:span">New Products</span></div><div><input data-id="Lists:input" type="checkbox" name="list_4" value="110"><span data-id="Lists:span">Sony F5 + F55</span></div></p>
									<button type="submit" class="Button ctct-button Button--block Button-secondary" data-enabled="enabled">Sign Up</button>
									<div><p class="ctct-form-footer">By submitting this form, you are granting: Rule Boston Camera, 1284 Soldiers Field Rd, Boston, Massachusetts, 02135, United States, http://www.rule.com permission to email you. You may unsubscribe via the link found at the bottom of every email.  (See our <a href="http://www.constantcontact.com/legal/privacy-statement" target="_blank">Email Privacy Policy</a> for details.) Emails are serviced by Constant Contact.</p></div>
								</form>
							</div>
						</div>
						<script type='text/javascript'>
							var localizedErrMap = {};
							localizedErrMap['required'] = 		'This field is required.';
							localizedErrMap['ca'] = 			'An unexpected error occurred while attempting to send email.';
							localizedErrMap['email'] = 			'Please enter your email address in name@email.com format.';
							localizedErrMap['birthday'] = 		'Please enter birthday in MM/DD format.';
							localizedErrMap['anniversary'] = 	'Please enter anniversary in MM/DD/YYYY format.';
							localizedErrMap['custom_date'] = 	'Please enter this date in MM/DD/YYYY format.';
							localizedErrMap['list'] = 			'Please select at least one email list.';
							localizedErrMap['generic'] = 		'This field is invalid.';
							localizedErrMap['shared'] = 		'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
							localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
							localizedErrMap['state_province'] = 'Select a state/province';
							localizedErrMap['selectcountry'] = 	'Select a country';
							var postURL = 'https://visitor2.constantcontact.com/api/signup';
						</script>
						<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>
						<!--End CTCT Sign-Up Form-->



					</div>
				</li>
				<li class="col col-4">
					<?php do_shortcode('[footer_menu]'); ?>
				</li>

			</ul>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
