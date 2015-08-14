<?php
    if(isset($_POST['username'])){

        $location = isset($_POST['location']) ? $_POST['location'].' - ' : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $class = isset($_POST['class']) ? $_POST['class'] : '';
        $school = isset($_POST['school']) ? $_POST['school'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $capacity = isset($_POST['capacity']) ? $_POST['capacity'] : '';
        $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
        $number = isset($_POST['number']) ? $_POST['number'] : '';
        $purpose = isset($_POST['purpose']) ? $_POST['purpose'] : '';
        $requirement = isset($_POST['requirement']) ? $_POST['requirement'] : '';
        
        $my_post = array(
          'post_title'    => $location . $username,
          'post_content'  => '',
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_type'     => 'tim-gia-su',
          'post_status'   => 'pending'
        );
        
        $post_id = wp_insert_post( $my_post );
        add_post_meta( $post_id, 'username-tim-gia-su', $username );
        add_post_meta( $post_id, 'address-tim-gia-su',  $address);
        add_post_meta( $post_id, 'phone-tim-gia-su',  $phone);
        add_post_meta( $post_id, 'email-tim-gia-su',  $email);
        add_post_meta( $post_id, 'class-tim-gia-su',  $class);
        add_post_meta( $post_id, 'school-tim-gia-su',  $school);
        add_post_meta( $post_id, 'gender-tim-gia-su',  $gender);
        add_post_meta( $post_id, 'capacity-tim-gia-su',  $capacity);
        add_post_meta( $post_id, 'subject-tim-gia-su',  $subject);
        add_post_meta( $post_id, 'number-tim-gia-su', $number );
        add_post_meta( $post_id, 'purpose-tim-gia-su', $purpose );
        add_post_meta( $post_id, 'requirement-tim-gia-su', $requirement );
    }
?>

<?php get_header(); ?>

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
                    <?php
                        if(isset($post_id) && $post_id > 0){
                    ?>
    					<div role="alert" class="alert alert-success">
                          <strong>Thành công!</strong> Chúng tôi đã tiếp nhận yêu cầu của bạn, cảm ơn bạn đã gửi yêu cầu, chúng tôi sẽ cố gắng liên hệ sớm nhất.
                        </div>
                    <?php } ?>
                    <?php echo the_content(); ?>
                    
                    <form id="formFindGiaSu" class="form-horizontal" method="post" action="">
                        <h4>Thông tin cá nhân</h4>
                        <table>
                            <?php
                                $array_location = array(
                                                'ho-chi-minh' => 'TP.Hồ Chí Minh', 
                                                'binh-duong' => 'Bình Dương',
                                                'bien-hoa' => 'Biên Hòa',
                                                'dong-nai' => 'Đồng Nai'
                                                );
								$url = $_SERVER['REQUEST_URI'];
								$location = '';
								foreach($array_location as $key => $value){
									if(strpos($url, $key) != ''){
										$location = $key;
									}
								}
								/*
                                if(isset($_GET['location'])){
                                    $location = $_GET['location'];
                                }
								*/
                            ?>
                                <tr>
                                    <td>Vị trí:</td>
                                    <td>
                                        <select name="location">
                                            <option value="">Chọn</option>
                                            <?php
                                                foreach($array_location as $key => $value){
                                                    $selected = $location == $key ? 'selected="selected"' : '';
                                                    echo '<option '.$selected.' value="'.$value.'">'.$value.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php
                                    
                                
                            ?>
                            
                            <tr>
                                <td>Họ Tên <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="username" /></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ nhà riêng <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="address" /></td>
                            </tr>
                            <tr>
                                <td>Điện thoại <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="phone" /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input class="full-width" type="text" name="email" /></td>
                            </tr>
                        </table>
                        <h4>Thông tin học sinh</h4>
                        <table>
                            <tr>
                                <td>Lớp <span class="required">*</span>:</td>
                                <td>
                                    <select name="class" required="required">
                                        <option value="">Chọn</option>
                                        <option value="Mẫu giáo">Mẫu giáo</option>
                                        <option value="Lớp 1">Lớp 1</option>
                                        <option value="Lớp 2">Lớp 2</option>
                                        <option value="Lớp 3">Lớp 3</option>
                                        <option value="Lớp 4">Lớp 4</option>
                                        <option value="Lớp 5">Lớp 5</option>
                                        <option value="Lớp 6">Lớp 6</option>
                                        <option value="Lớp 7">Lớp 7</option>
                                        <option value="Lớp 8">Lớp 8</option>
                                        <option value="Lớp 9">Lớp 9</option>
                                        <option value="Lớp 10">Lớp 10</option>
                                        <option value="Lớp 11">Lớp 11</option>
                                        <option value="Lớp 12">Lớp 12</option>
                                        <option value="Học viên">Học viên</option>
                                        <option value="Cán bộ viên chức">Cán bộ viên chức</option>
                                        <option value="Trình độ khác">Trình độ khác</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Trường:</td>
                                <td><input class="full-width" type="text" name="school" /></td>
                            </tr>
                            <tr>
                                <td>Giới tính <span class="required">*</span>:</td>
                                <td>
                                    <select name="gender" required="required">
                                        <option value="">Chọn</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Học lực hiện tại:</td>
                                <td>
                                    <select name="capacity">
                                        <option value="">Chọn</option>
                                        <option value="Yếu">Yếu</option>
                                        <option value="Trung bình">Trung bình</option>
                                        <option value="Khá">Khá</option>
                                        <option value="Giỏi">Giỏi</option>
                                        <option value="Xuất sắc">Xuất sắc</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <h4>Thông tin yêu cầu</h4>
                        <table>
                            <tr>
                                <td>Môn dạy <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="subject" /></td>
                            </tr>
                            <tr>
                                <td>Số người học:</td>
                                <td><input class="full-width" type="text" name="number" /></td>
                            </tr>
                            <tr>
                                <td>Mục đích học:</td>
                                <td>
                                    <select name="purpose">
                                        <option value="">Chọn</option>
                                        <option value="Lấy lại kiến thức gốc">Lấy lại kiến thức gốc</option>
                                        <option value="Bồi dưỡng và nâng cao">Bồi dưỡng và nâng cao</option>
                                        <option value="Thi chứng chỉ">Thi chứng chỉ</option>
                                        <option value="Đi du học">Đi du học</option>
                                        <option value="Mục đích khác">Mục đích khác</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Yêu cầu khác:</td>
                                <td><textarea class="full-width" name="requirement"></textarea>
                            </tr>
                        </table>
                        <input type="submit" name="submit" value="Gửi" />
                    </form>
                                                                                                                
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
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#formFindGiaSu").validate({
		rules: {
			'username': {
				required: true
			},
			'address': {
				required: true
			},
            'phone': {
				required: true
			},
            'class': {
				required: true
			},
            'gender': {
				required: true
			},
            'subject': {
				required: true
			}
		},
        errorPlacement: function(error, element) {},
		highlight: function(el, error, valid){
			jQuery(el).removeClass(valid).addClass(error);
		},
		unhighlight: function(el, error, valid){
			jQuery(el).removeClass(error).addClass(valid);
		},
		focusInvalid: true
	});
});
</script>