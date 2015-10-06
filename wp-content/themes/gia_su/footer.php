	<div class="clear"></div>
</div><!-- .container /-->
<?php tie_banner('banner_bottom' , '<div class="e3lan e3lan-bottom">' , '</div>' ); ?>

<?php get_sidebar( 'footer' ); ?>				
<div class="clear"></div>
<div class="footer-bottom">
	<div class="container">
		<div class="alignright footer-right">
			<?php
				$footer_vars = array('%year%' , '%site%' , '%url%');
				$footer_val  = array( date('Y') , get_bloginfo('name') , home_url() );
				$footer_two  = str_replace( $footer_vars , $footer_val , tie_get_option( 'footer_two' ));
				echo htmlspecialchars_decode( $footer_two );?>
			
		</div>
		
		<div class="alignleft">
			<?php if( tie_get_option('footer_social') ) tie_get_social( true , false, 'ttip-none' ); ?>
			<div class="copyright">
			<?php
				$footer_one  = str_replace( $footer_vars , $footer_val , tie_get_option( 'footer_one' ));
				echo htmlspecialchars_decode( $footer_one );
			?>
			</div>
		</div>
		<div class="clear"></div>
	</div><!-- .Container -->
</div><!-- .Footer bottom -->

</div><!-- .inner-Wrapper -->
</div><!-- #Wrapper -->
</div><!-- .Wrapper-outer -->
<?php if( tie_get_option('footer_top') ): ?>
	<div id="topcontrol" class="fa fa-angle-up" title="<?php _eti( 'Scroll To Top' ); ?>"></div>
<?php endif; ?>
<div id="fb-root"></div>
<?php wp_footer();?>

<script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=68e5dbd05248df2548bc8b6b1fffc03e&data=eyJzc29faWQiOjQ0MDY2MiwiaGFzaCI6IjUzZjhlM2UzZTBmZTBhYmQ3YjRhZGI1NDhjMmJmZjBiIn0-&pname='+product_name;
var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script><noscript><a href="http://www.vatgia.com" title="vatgia.com" target="_blank">Tài trợ bởi vatgia.com</a></noscript><noscript><a href="http://vchat.vn" title="vchat.vn" target="_blank">Phát triển bởi vchat.vn</a></noscript>	





<!-- Google Code dành cho Thẻ tiếp thị lại -->
<!--------------------------------------------------
Không thể liên kết thẻ tiếp thị lại với thông tin nhận dạng cá nhân hay đặt thẻ tiếp thị lại trên các trang có liên quan đến danh mục nhạy cảm. Xem thêm thông tin và hướng dẫn về cách thiết lập thẻ trên: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 982233458;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/982233458/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>






</body>
</html>