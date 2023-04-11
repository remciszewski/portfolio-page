<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package remmie_theme
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<!-- <a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'remmie_theme' ) ); 
						?>"> -->
		<?php
		/* translators: %s: CMS name, i.e. WordPress. */
		//printf( esc_html__( 'Proudly powered by %s', 'remmie_theme' ), 'WordPress' );
		?>
		</a>
		<!-- <span class="sep"> | </span> -->
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		//printf( esc_html__( 'Theme: %1$s by %2$s.', 'remmie_theme' ), 'remmie_theme', '<a href="http://underscores.me/">Underscores.me</a>' );
		?>
	</div><!-- .site-info -->
	<div class="footer-contact">
		<small>Email: remciszewski@icloud.com</small>
		<small>Phone: 795 171 626</small>

	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<!-- <?php //wp_footer(); 
		?> -->

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
	const typer = document.getElementById("typer");
	const text = "Hello, my name is Remigiusz.";
	const newText = "Cześć, nazywam się Remigiusz.";

	function typeEffect(element, speed) {
		const textArray = text.split("");
		const interval = setInterval(function() {
			if (textArray.length === 0) {
				clearInterval(interval);
				element.classList.add("cursor");
				setTimeout(function() {
					deleteEffect(element, speed);
				}, 1000);
			} else {
				element.innerHTML += textArray.shift();
			}
		}, speed);
	}

	function typeEffect_EN(element, speed) {
		const textArray = newText.split("");
		const interval = setInterval(function() {
			if (textArray.length === 0) {
				clearInterval(interval);
				element.classList.add("cursor");
				setTimeout(function() {
					deleteEffect_EN(element, speed);
				}, 1000);
			} else {
				element.innerHTML += textArray.shift();
			}
		}, speed);
	}

	function deleteEffect(element, speed) {
		const textArray = text.split("");
		const interval = setInterval(function() {
			if (textArray.length === 0) {
				clearInterval(interval);
				element.classList.add("cursor");
				setTimeout(function() {
					typeEffect_EN(element, speed);
				}, 1000);
			} else {
				textArray.pop();
				element.innerHTML = textArray.join("");
			}
		}, speed);
	}

	function deleteEffect_EN(element, speed) {
		const textArray = newText.split("");
		const interval = setInterval(function() {
			if (textArray.length === 0) {
				clearInterval(interval);
				element.classList.add("cursor");
				setTimeout(function() {
					typeEffect(element, speed);
				}, 1000);
			} else {
				textArray.pop();
				element.innerHTML = textArray.join("");
			}
		}, speed);
	}



	typeEffect(typer, 100);
</script>