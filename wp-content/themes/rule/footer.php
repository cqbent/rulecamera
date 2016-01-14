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
						We accept Visa, PayPal, Mastercard, <br />Discover, American Express, Diner's Club
					</p>
				</li>
				<li class="col-3">
					<div class="tagline">
						Discounts, events, cool new products! <br />
						<a href="#">Join our mailing list >></a>
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
