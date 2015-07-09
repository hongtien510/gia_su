<?php 
get_header(); ?>

<?php if ( ! have_posts() ) : ?>
<div class="content">
	<?php get_template_part( 'framework/parts/not-found' ); ?>
</div>
<?php endif; ?>
	
<?php
//Page Builder
$get_meta = get_post_custom( $post->ID );
if( !empty( $get_meta[ 'tie_builder_active' ][0] ) ):
		
		if( !empty( $get_meta[ 'featured_posts' ][0] ) )
			get_template_part('framework/parts/featured');
		
		if( !empty( $get_meta[ 'slider' ][0] ) && ( !empty( $get_meta[ 'slider_pos' ][0] ) && $get_meta[ 'slider_pos' ][0] == 'big' ) )
			get_template_part('framework/parts/slider-home');// Get Slider template ?>
	<div class="content">
		<?php 
			if( !empty( $get_meta[ 'slider' ][0] ) && ( !empty( $get_meta[ 'slider_pos' ][0] ) && $get_meta[ 'slider_pos' ][0] != 'big' ) )
				get_template_part('framework/parts/slider-home'); // Get Slider template

			get_template_part( 'framework/blocks' );	
		?>
	</div><!-- .content /-->
	
	
<?php
// Normal Page
else:?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php
		if( function_exists('bp_current_component') && bp_current_component() ) $current_id = get_queried_object_id();
		else $current_id = $post->ID;
		$get_meta = get_post_custom( $current_id );

		tie_update_reviews_info();
			
		if( !empty( $get_meta["tie_sidebar_pos"][0] ) && $get_meta["tie_sidebar_pos"][0] == 'full' ) $content_width = 955;
	?>
		
	<?php if( !empty( $get_meta["tie_post_head_cover"][0] ) ) : ?>
	<div class="post-cover-head">
		<?php get_template_part( 'framework/parts/post-head' ); ?>
	</div>
	<?php endif; ?>
	
	<div class="content<?php if( !empty( $get_meta["tie_post_head_cover"][0] ) ) echo ' post-cover';?>">

		<?php if(  empty( $get_meta["tie_post_head_cover"][0] ) ||
				( !empty( $get_meta["tie_post_head_cover"][0] ) && ( !empty( $get_meta['tie_post_head'][0] ) && $get_meta['tie_post_head'][0] != 'thumb' ) && $get_meta['tie_post_head'][0] != 'lightbox' ) ) : ?>
		
		<?php tie_breadcrumbs() ?>

		<?php endif; ?>	

		
		<?php //Above Post Banner
		if( empty( $get_meta["tie_hide_above"][0] ) ){
			if( !empty( $get_meta["tie_banner_above"][0] ) ) echo '<div class="e3lan e3lan-post">' .htmlspecialchars_decode($get_meta["tie_banner_above"][0]) .'</div>';
			else tie_banner('banner_above' , '<div class="e3lan e3lan-post">' , '</div>' );
		}
		?>
		
		<article <?php post_class('post-listing post'); ?>  id="the-post">
		
			<?php if( empty( $get_meta["tie_post_head_cover"][0] ) ) get_template_part( 'framework/parts/post-head' ); ?>
			
			<div class="post-inner">
			
			<?php if(  empty( $get_meta["tie_post_head_cover"][0] ) ||
					( !empty( $get_meta["tie_post_head_cover"][0] ) && ( !empty( $get_meta['tie_post_head'][0] ) && $get_meta['tie_post_head'][0] != 'thumb' ) && $get_meta['tie_post_head'][0] != 'lightbox' ) ) : ?>
				<h1 class="name post-title entry-title" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php the_title(); ?></span></h1>
				<p class="post-meta"></p>
				<div class="clear"></div>
			<?php endif; ?>
			
				<div class="entry">
					<ul class="list-custom list-gia-su">
                            <?php
                                global $paged;
                                if(isset($_GET['trang'])){
                                    $paged = $_GET['trang'];
                                }
                                $args = array('post_type' => 'gia-su', 'posts_per_page' => 1, 'order' => desc, 'paged' => $paged);
                                $wp_query = new WP_Query($args);
                                
                                if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                            ?>
                            <li>
                                <table>
                                    <tr>
                                        <td width="30%">
                                            <?php
                                                $image = get_post_meta(get_the_id(),'image-gia-su',true);
                                                if(!file_exists($image))
                                                    $image = 'wp-content/themes/gia_su/images/no-image.jpg';
                                            ?>
                                            <img src="<?php echo get_bloginfo('url').'/'.$image; ?>" />
                                        </td>
                                        <td valign="top">
                                            <div style="margin-left: 10px;">
                                                <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <strong>Trình độ: </strong><?php echo get_post_meta(get_the_id(),'trinhdo-gia-su',true); ?><br />
                                                <strong>Học trường: </strong><?php echo get_post_meta(get_the_id(),'school-gia-su',true); ?><br />
                                                <strong>Chuyên ngành: </strong><?php echo get_post_meta(get_the_id(),'chuyennganh-gia-su',true); ?><br />
                                                <strong>Năm tốt nghiệp: </strong><?php echo get_post_meta(get_the_id(),'namtotnghiep-gia-su',true); ?><br />
                                                <strong>Hiện tại là: </strong><?php echo get_post_meta(get_the_id(),'hientaila-gia-su',true); ?><br />
                                                
                                                <strong>Lớp dạy: </strong><?php echo get_post_meta(get_the_id(),'lopday-gia-su',true); ?><br />
                                                <strong>Môn dạy: </strong><?php echo get_post_meta(get_the_id(),'monday-gia-su',true); ?><br />
                                                <strong>Khu vực dạy: </strong><?php echo get_post_meta(get_the_id(),'khuvucday-gia-su',true); ?><br />
                                                <strong>Thời gian dạy: </strong><?php echo get_post_meta(get_the_id(),'thoigianday-gia-su',true); ?><br />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            <?php endwhile; ?>
                        	<?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                    </ul>                                                                                                    
				</div><!-- .entry /-->	
				<span style="display:none" class="updated"><?php the_time( 'Y-m-d' ); ?></span>
				<?php if ( get_the_author_meta( 'google' ) ){ ?>
				<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><a href="<?php the_author_meta( 'google' ); ?>?rel=author">+<?php echo get_the_author(); ?></a></strong></div>
				<?php }else{ ?>
				<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><?php the_author_posts_link(); ?></strong></div>
				<?php } ?>
				
				<?php //if( tie_get_option( 'share_buttons_pages' ) && tie_get_option( 'share_post' ) && ( !function_exists( 'is_buddypress' ) || ( function_exists( 'is_buddypress' ) && !is_buddypress() ) ) ) get_template_part( 'framework/parts/share' ); // Get Share Button template ?>
				<div class="clear"></div>
			</div><!-- .post-inner -->
		</article><!-- .post-listing -->
        <?php 
            if ($wp_query->max_num_pages > 1) tie_pagenavi(false, false, "trang"); 
            wp_reset_query();
        ?>
		<?php endwhile; ?>
		
		<?php //Below Post Banner
		if( empty( $get_meta["tie_hide_below"][0] ) ){
			if( !empty( $get_meta["tie_banner_below"][0] ) ) echo '<div class="e3lan e3lan-post">' .htmlspecialchars_decode($get_meta["tie_banner_below"][0]) .'</div>';
			else tie_banner('banner_below' , '<div class="e3lan e3lan-post">' , '</div>' );
		}
		?>
		
		<?php if( !function_exists('bp_current_component') || (function_exists('bp_current_component') && !bp_current_component() ) )  comments_template( '', true );  ?>
	</div><!-- .content -->
	
	

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>