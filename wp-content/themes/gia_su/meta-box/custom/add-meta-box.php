<?php
global $meta_boxes;
$meta_boxes = array();

$meta_boxes[] =array(
   'id'=>'lop-moi',
   'title'=>'Lớp mới',
   'pages'=>array('lop-moi'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
        array(
			'name'             => 'Mã lớp',
			'id'               => "code-class",
			'type'             => 'text'
		),
		array(
			'name'             => 'Môn dạy',
			'id'               => "subject-class",
			'type'             => 'text'
		),
		array(
			'name'             => 'Khu vực',
			'id'               => "address-class",
			'type'             => 'text'
		),
		array(
			'name'             => 'Học phí',
			'id'               => "money-class",
			'type'             => 'text'
		),
		array(
			'name'             => 'Lịch học',
			'id'               => "time-class",
			'type'             => 'text'
		),
		array(
			'name'             => 'Số buổi/Tuần',
			'id'               => "lesson-class",
			'type'             => 'text'
		),
		array(
			'name'             => 'Học sinh',
			'id'               => "student-class",
			'type'             => 'text'
		),
        array(
			'name'             => 'Yêu cầu',
			'id'               => "require-class",
			'type'             => 'text'
		),
        array(
			'name'             => 'Tình trạng',
			'id'               => "status-class",
			'options'		   => array(''=>'', 'Cần gấp' => 'Cần gấp', 'Đã giao lớp' => 'Đã giao lớp'),
			'type'             => 'select'
		),
		array(
			'name'             => 'Liên hệ nhận lớp',
			'id'               => "contact-class",
			'type'             => 'textarea'
		),
	 )
);

$meta_boxes[] =array(
   'id'=>'tim-gia-su',
   'title'=>'Tìm gia sư',
   'pages'=>array('tim-gia-su'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
        array(
			'name'             => 'Họ tên',
			'id'               => "username-tim-gia-su",
			'type'             => 'text'
		),
		array(
			'name'             => 'Địa chỉ nhà riêng',
			'id'               => "address-tim-gia-su",
			'type'             => 'text'
		),
		array(
			'name'             => 'Điện thoại',
			'id'               => "phone-tim-gia-su",
			'type'             => 'text'
		),
		array(
			'name'             => 'Email',
			'id'               => "email-tim-gia-su",
			'type'             => 'text'
		),
		array(
			'name'             => 'Lớp',
			'id'               => "class-tim-gia-su",
			'type'             => 'text'
		),
		array(
			'name'             => 'Trường',
			'id'               => "school-tim-gia-su",
			'type'             => 'text'
		),
		array(
			'name'             => 'Giới tính',
			'id'               => "gender-tim-gia-su",
			'type'             => 'text'
		),
        array(
			'name'             => 'Học lực hiện tại',
			'id'               => "capacity-tim-gia-su",
			'type'             => 'text'
		),
        array(
			'name'             => 'Môn dạy',
			'id'               => "subject-tim-gia-su",
			'type'             => 'text'
		),
        array(
			'name'             => 'Số người học',
			'id'               => "number-tim-gia-su",
			'type'             => 'text'
		),
        array(
			'name'             => 'Mục đích học',
			'id'               => "purpose-tim-gia-su",
			'type'             => 'text'
		),
		array(
			'name'             => 'Yêu cầu khác',
			'id'               => "requirement-tim-gia-su",
			'type'             => 'textarea'
		),
	 )
);

function register_meta_boxes(){
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
add_action( 'admin_init', 'register_meta_boxes' );





