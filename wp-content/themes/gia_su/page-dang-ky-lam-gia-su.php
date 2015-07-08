<?php
    $city = $wpdb->get_results("SELECT * FROM tinhthanh WHERE `XuatBan` = 1 ORDER BY `ThuTu`");
    $list_city = array();
    foreach($city as $value){
        $list_city[$value->ID] = $value->TenTinhThanh;
    }                                  
    if(isset($_POST['username'])){
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $mobiphone = isset($_POST['mobiphone']) ? $_POST['mobiphone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $city = isset($list_city[$city]) ? $list_city[$city] : '';
        $district = isset($_POST['district']) ? $_POST['district'] : '';
        $trinhdo = isset($_POST['trinhdo']) ? $_POST['trinhdo'] : '';
        $school = isset($_POST['school']) ? $_POST['school'] : '';
        $chuyennganh = isset($_POST['chuyennganh']) ? $_POST['chuyennganh'] : '';
        $namtotnghiep = isset($_POST['namtotnghiep']) ? $_POST['namtotnghiep'] : '';
        $hientaila = isset($_POST['hientaila']) ? $_POST['hientaila'] : '';
        $lopday = isset($_POST['lopday']) ? $_POST['lopday'] : '';
        $monday = isset($_POST['monday']) ? $_POST['monday'] : '';
        $khuvucday = isset($_POST['khuvucday']) ? $_POST['khuvucday'] : '';
        $thoigianday = isset($_POST['thoigianday']) ? $_POST['thoigianday'] : '';
        $luongyeucau = isset($_POST['luongyeucau']) ? $_POST['luongyeucau'] : '';
        $sobuoi = isset($_POST['sobuoi']) ? $_POST['sobuoi'] : '';
        $motathem = isset($_POST['motathem']) ? $_POST['motathem'] : '';

        $my_post = array(
          'post_title'    => $username,
          'post_content'  => '',
          'post_author'   => 1,
          'post_type'     => 'gia-su',
          'post_status'   => 'pending'
        );
        $post_id = wp_insert_post( $my_post );

        $image = '';
        $file=$_FILES['image'];
    	if($file['name']!="")
    	{
    		$name=date('Ymd-His').'-'.$file['name'];
            $my_post = array(
              'post_title'    => $name,
              'post_content'  => '',
              'post_author'   => 1,
              'post_type'     => 'attachment',
              'post_status'   => 'inherit',
              'post_parent'   => $post_id,
              'post_mime_type' => $file['type'],
              'guid' => get_bloginfo('url').'/wp-content/uploads/'.date('Y').'/'.date('m').'/'.$name,
            );
            $image = wp_insert_post( $my_post );
            if($image > 0)
                move_uploaded_file($file['tmp_name'],'wp-content/uploads/'.date('Y').'/'.date('m').'/'.$name);
    	}
        
        add_post_meta( $post_id, 'username-gia-su', $username);
        add_post_meta( $post_id, 'birthday-gia-su',  $birthday);
        add_post_meta( $post_id, 'phone-gia-su',  $phone);
        add_post_meta( $post_id, 'mobiphone-gia-su',  $mobiphone);
        add_post_meta( $post_id, 'email-gia-su',  $email);
        add_post_meta( $post_id, 'address-gia-su',  $address);
        add_post_meta( $post_id, 'image-gia-su',  $image);
        add_post_meta( $post_id, 'gender-gia-su',  $gender);
        add_post_meta( $post_id, 'city-gia-su',  $city);
        add_post_meta( $post_id, 'district-gia-su', $district);
        add_post_meta( $post_id, 'trinhdo-gia-su', $trinhdo);
        add_post_meta( $post_id, 'school-gia-su', $school);
        add_post_meta( $post_id, 'chuyennganh-gia-su', $chuyennganh);
        add_post_meta( $post_id, 'namtotnghiep-gia-su', $namtotnghiep);
        add_post_meta( $post_id, 'hientaila-gia-su', $hientaila);
        add_post_meta( $post_id, 'lopday-gia-su', $lopday);
        add_post_meta( $post_id, 'monday-gia-su', $monday);
        add_post_meta( $post_id, 'khuvucday-gia-su', $khuvucday);
        add_post_meta( $post_id, 'thoigianday-gia-su', $thoigianday);
        add_post_meta( $post_id, 'luongyeucau-gia-su', $luongyeucau);
        add_post_meta( $post_id, 'sobuoi-gia-su', $sobuoi);
        add_post_meta( $post_id, 'motathem-gia-su', $motathem);
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
                    
                    <form id="formFindGiaSu" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <h4>Thông tin cá nhân</h4>
                        <table>
                            <tr>
                                <td>Họ Tên <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="username" /></td>
                            </tr>
                            <tr>
                                <td>Ngày sinh <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="birthday" placeholder="dd/mm/yyyy" /></td>
                            </tr>
                            <tr>
                                <td>Điện thoại bàn:</td>
                                <td><input class="full-width" type="text" name="phone" /></td>
                            </tr>
                            <tr>
                                <td>Di động <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="mobiphone" /></td>
                            </tr>
                            <tr>
                                <td>Email <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="email" /></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="address" /></td>
                            </tr>
                            <tr>
                                <td>Hình ảnh <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="file" name="image" /><span style="width: 375px;" class="ghi_chu">GV-SV nếu đưa hình ảnh của mình nên chọn ảnh có tác phong lịch sự, tốt nhất là ảnh thẻ 4x6. Những ảnh không mang tích chất sư phạm văn phòng sẽ loại khỏi danh sách đăng ký </span></td>
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
                                <td>Tỉnh thành <span class="required">*</span>:</td>
                                <td>
                                    <select name="city" required="required">
                                        <option value="">Chọn</option>
                                        <?php
                                            foreach($city as $value){
                                                echo "<option value='".$value->ID."'>".$value->TenTinhThanh."</option>";
                                            }
                                        ?>
                                        
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Quận/Huyện <span class="required">*</span>:</td>
                                <td>
                                    <select name="district" required="required">
                                        <option value="">Chọn</option>
                                        
                                    </select>
                                    <img style="height:20px; display:none" class="district_loading" src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/gia_su/images/loading.gif" />
                                </td>
                            </tr>
                        </table>
                        <h4>Thông tin học vấn</h4>
                        <table>
                            <tr>
                                <td>Trình độ <span class="required">*</span>:</td>
                                <td>
                                    <select name="trinhdo" required="required">
                                        <option value="">Chọn</option>
                                        <option value="Trung cấp">Trung cấp</option>
                                        <option value="Cao đẳng">Cao đẳng</option>
                                        <option value="Đại học">Đại học</option>
                                        <option value="Thạc sĩ">Thạc sĩ</option>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Học trường <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="school" /></td>
                            </tr>
                            <tr>
                                <td>Chuyên ngành <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="chuyennganh" /></td>
                            </tr>
                            <tr>
                                <td>Năm tốt nghiệp <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="namtotnghiep" /></td>
                            </tr>
                            <tr>
                                <td>Hiện tại là <span class="required">*</span>:</td>
                                <td>
                                    <select name="hientaila" required="required">
                                        <option value="">Chọn</option>
                                        <option value="Sinh viên">Sinh viên</option>
                                        <option value="Giáo viên">Giáo viên</option>
                                        <option value="Đã tốt nghiệp">Đã tốt nghiệp</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <h4>Thông tin lớp nhận dạy</h4>
                        <table>
                            <tr>
                                <td>Lớp dạy <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="lopday" /></td>
                            </tr>
                            <tr>
                                <td>Các môn <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="monday" /></td>
                            </tr>
                            <tr>
                                <td>Khu vực dạy <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="khuvucday" /><span class="ghi_chu">Ví dụ: Quận 1, Tân Bình, ...</span></td>
                            </tr>
                            <tr>
                                <td>Thời gian dạy <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="thoigianday" /><span class="ghi_chu">Ví dụ: T2 - T4 - T6; 18h - 20h</span></td>
                            </tr>
                            <tr>
                                <td>Lương yêu cầu <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="luongyeucau" /></td>
                            </tr>
                            <tr>
                                <td>Số buổi <span class="required">*</span>:</td>
                                <td><input required="required" class="full-width" type="text" name="sobuoi" /></td>
                            </tr>
                            <tr>
                                <td>Mô tả thêm:</td>
                                <td><textarea class="full-width" name="motathem"></textarea>
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
			'birthday': {
				required: true,
                validatorDate: true
			},
            'mobiphone': {
				required: true
			},
            'email': {
				required: true,
                email: true
			},
            'address': {
				required: true
			},
            'image': {
				required: true
			},
            'gender': {
				required: true
			},
            'city': {
				required: true
			},
            'district': {
				required: true
			},
            'trinhdo': {
				required: true
			},
            'school': {
				required: true
			},
            'chuyennganh': {
				required: true
			},
            'namtotnghiep': {
				required: true
			},
            'hientaila': {
				required: true
			},
            'lopday': {
				required: true
			},
            'monday': {
				required: true
			},
            'khuvucday': {
				required: true
			},
            'thoigianday': {
				required: true
			},
            'luongyeucau': {
				required: true
			},
            'sobuoi': {
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
    jQuery.validator.addMethod("validatorDate",
		function(value, element) {
			return value.match(/^(0?[1-9]|[12][0-9]|3[0-1])[/., -](0?[1-9]|1[0-2])[/., -](19|20)?\d{2}$/);
		},
		"Please enter a date in the format dd/mm/yyyy!"
	);
    
    jQuery("select[name=city]").change(function(){
        var city = jQuery(this).val();
        jQuery(".district_loading").show();
        jQuery.ajax({
				url:'<?php echo admin_url('admin-ajax.php'); ?>',
				type:'post',
				data:{city:city, gia_su:"gia_su"},
				success:function(data){
				    jQuery("select[name=district]").html(data);
                    jQuery(".district_loading").hide();
				},
				error: function (data) {
					alert('ajax failed');
				}
			});	
    });
});
</script>