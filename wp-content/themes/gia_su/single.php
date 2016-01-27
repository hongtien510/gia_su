<?php get_header(); ?>

	<?php if ( ! have_posts() ) : ?>
	<div class="content">
		<?php get_template_part( 'framework/parts/not-found' ); ?>
	</div>
	<?php endif; ?>
		
	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php tie_setPostViews() ?>

	<?php
		$get_meta = get_post_custom($post->ID);
		
		tie_update_reviews_info();
	
		if( !empty( $get_meta["tie_sidebar_pos"][0] ) && $get_meta["tie_sidebar_pos"][0] == 'full' ) $content_width = 955;
		
		$do_not_duplicate = array();

	?>

	<?php if( !empty( $get_meta["tie_post_head_cover"][0] ) ) : ?>
	<div class="post-cover-head">
		<?php get_template_part( 'framework/parts/post-head' ); ?>
	</div>
	<?php endif; ?>
	
	<div class="content<?php if( !empty( $get_meta["tie_post_head_cover"][0] ) ) echo ' post-cover';?>">
	
		<?php if(  empty( $get_meta["tie_post_head_cover"][0] ) ||
				( !empty( $get_meta["tie_post_head_cover"][0] ) && ( !empty( $get_meta['tie_post_head'][0] ) && $get_meta['tie_post_head'][0] != 'thumb' ) ) ) : ?>
		
		<?php 
			if(!get_query_var('lop-moi')){
				tie_breadcrumbs();
			}
			else{
				tie_breadcrumbs('lop-hoc-moi/');
			}
		?>

		<?php endif; ?>
			
				
		<?php //Above Post Banner
		if(  empty( $get_meta["tie_hide_above"][0] ) ){
			if( !empty( $get_meta["tie_banner_above"][0] ) ) echo '<div class="e3lan e3lan-post">' .htmlspecialchars_decode($get_meta["tie_banner_above"][0]) .'</div>';
			else tie_banner('banner_above' , '<div class="e3lan e3lan-post">' , '</div>' );
		}
		?>
				
		<article <?php post_class('post-listing'); ?> id="the-post">
			<?php if( empty( $get_meta["tie_post_head_cover"][0] ) ) get_template_part( 'framework/parts/post-head' ); ?>

			<div class="post-inner">
			
			<?php if(  empty( $get_meta["tie_post_head_cover"][0] ) || ( empty( $get_meta["tie_post_head"][0] ) &&  !tie_get_option( 'post_featured' ) ) ||
					( !empty( $get_meta["tie_post_head_cover"][0] ) && ( !empty( $get_meta['tie_post_head'][0] ) && $get_meta['tie_post_head'][0] != 'thumb' ) ) ) : ?>
				<h1 class="name post-title entry-title" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php the_title(); ?></span></h1>

				<?php get_template_part( 'framework/parts/meta-post' ); ?>
			<?php endif; ?>

				<div class="entry">
					<?php if( ( tie_get_option( 'share_post_top' ) &&  empty( $get_meta["tie_hide_share"][0] ) ) || ( !empty( $get_meta["tie_hide_share"][0] ) && $get_meta["tie_hide_share"][0] == 'no' ) ) get_template_part( 'framework/parts/share'  ); // Get Share Button template ?>

					<?php if( tie_get_option( 'related_position' ) == 'in' ) get_template_part( 'framework/parts/related-posts' ); ?>

					<?php 
						if(!get_query_var('lop-moi')){
							the_content();
						}
						else{
					?>
							<table>
								<tr>
									<td><strong>Mã lớp:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'code-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Môn dạy:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'subject-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Khu vực:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'address-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Học phí:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'money-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Lịch học:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'time-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Số buổi/Tuần:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'lesson-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Học sinh:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'student-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Yêu cầu:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'require-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Tình trạng:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'status-class',true); ?></td>
								</tr>
								<tr>
									<td><strong>Ngày đăng:</strong></td>
									<td><?php echo get_the_date('d/m/Y H:i'); ?></td>
								</tr>
								<tr>
									<td><strong>Liên hệ nhận lớp:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'contact-class',true); ?></td>
								</tr>
								<?php if(get_post_meta(get_the_id(),'note-class',true) != ''){ ?>
								<tr>
									<td><strong>Ghi chú:</strong></td>
									<td><?php echo get_post_meta(get_the_id(),'note-class',true); ?></td>
								</tr>
								<?php } ?>
							</table>
					<?php
						}
					?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __ti( 'Pages:' ), 'after' => '</div>' ) ); ?>
					
					<?php edit_post_link( __ti( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry /-->
				<?php the_tags( '<span style="display:none">',' ', '</span>'); ?>
				<span style="display:none" class="updated"><?php the_time( 'Y-m-d' ); ?></span>
				<?php if ( get_the_author_meta( 'google' ) ){ ?>
				<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><a href="<?php the_author_meta( 'google' ); ?>?rel=author">+<?php echo get_the_author(); ?></a></strong></div>
				<?php }else{ ?>
				<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><?php the_author_posts_link(); ?></strong></div>
				<?php } ?>
				
				<?php if( ( tie_get_option( 'share_post' ) && empty( $get_meta["tie_hide_share"][0] ) ) || ( !empty( $get_meta["tie_hide_share"][0] ) && $get_meta["tie_hide_share"][0] == 'no' ) ) get_template_part( 'framework/parts/share' ); // Get Share Button template ?>
				<div class="clear"></div>
			</div><!-- .post-inner -->
		</article><!-- .post-listing -->
		<?php if( tie_get_option( 'post_tags' ) ) the_tags( '<p class="post-tag">'.__ti( 'Tags ' )  ,' ', '</p>'); ?>

		
		<?php //Below Post Banner
		if( empty( $get_meta["tie_hide_below"][0] ) ){
			if( !empty( $get_meta["tie_banner_below"][0] ) ) echo '<div class="e3lan e3lan-post">' .htmlspecialchars_decode($get_meta["tie_banner_below"][0]) .'</div>';
			else tie_banner('banner_below' , '<div class="e3lan e3lan-post">' , '</div>' );
		}
		?>
		
		<?php if( ( tie_get_option( 'post_authorbio' ) && empty( $get_meta["tie_hide_author"][0] ) ) || ( isset( $get_meta["tie_hide_related"][0] ) && $get_meta["tie_hide_author"][0] == 'no' ) ): ?>		
		<section id="author-box">
			<div class="block-head">
				<h3><?php _eti( 'About' ) ?> <?php the_author() ?> </h3><div class="stripe-line"></div>
			</div>
			<div class="post-listing">
				<?php tie_author_box() ?>
			</div>
		</section><!-- #author-box -->
		<?php endif; ?>
		
		
		<?php if( tie_get_option( 'post_nav' ) ): ?>				
		<div class="post-navigation">
			<div class="post-previous"><?php previous_post_link( '%link', '<span>'. __ti( 'Previous' ).'</span> %title' ); ?></div>
			<div class="post-next"><?php next_post_link( '%link', '<span>'. __ti( 'Next' ).'</span> %title' ); ?></div>
		</div><!-- .post-navigation -->
		<?php endif; ?>
	
		<?php if( tie_get_option( 'related_position' ) != 'in' ) get_template_part( 'framework/parts/related-posts' ); ?>
		
		<?php get_template_part( 'framework/parts/check-also' ); ?>
			
		<?php endwhile;?>

		<?php comments_template( '', true ); ?>
		
	</div><!-- .content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>