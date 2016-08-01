<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;

	echo '<div class="footer-wrap">';

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>
	<?php woo_footer_before(); ?>

		<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">

			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

			<div class="block footer-widget-<?php echo $i; ?>">
	        	<?php woo_sidebar( 'footer-' . $i ); ?>
			</div>

		        <?php } ?>
			<?php } // End WHILE Loop ?>

		</section><!-- /#footer-widgets  -->
	<?php } // End IF Statement ?>
		<footer id="footer" class="col-full">

			<div id="copyright">
			<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {

					echo stripslashes( $woo_options['woo_footer_left_text'] );

			} else { ?>
				<p>
        <!--  Edit footer content below ----------------------------------------------------------------------------------->
        <center>
          <FooterContainer>
        <!--         left column         -->
              <FooterLeft>
               <ul>
                 <li><h4><a href="#">Link 1</a></h4></li>
                 <li><h4><a href="#">Link 2</a></h4></li>
                 <li><h4><a href="#">Link 3</a></h4></li>
               </ul>
              </FooterLeft>
        <!--         Right column          -->
              <FooterRight>
                <ul>
                  <li><h4><a href="#">Link 4</a></h4></li>
                  <li><h4><a href="#">Link 5</a></h4></li>
                  <li><h4><a href="#">Link 6</a></h4></li>
                </ul>
              </FooterRight>
          </FooterContainer>
        <!--         After the footer column          -->
          <FooterContainer>
            <?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
          </FooterContainer>
        </center>
        <!--  End of edited footer content ----------------------------------------------------------------------------------->
			<?php } ?>
			</div>

			<div id="credit" class="col-right">
	        <?php if( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' ) {

	        	echo stripslashes( $woo_options['woo_footer_right_text'] );

			} else { ?>
        <!--  Edit right collum of footer content below ----------------------------------------------------------------------------------->
				<p>
        <?php _e( '' ); ?></p>
			  <?php } ?>
        <!--  End of edited right collum of footer content ----------------------------------------------------------------------------------->
			</div>

		</footer><!-- /#footer  -->

	</div><!-- / footer-wrap -->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>
