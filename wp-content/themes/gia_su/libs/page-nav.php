<?php
function bt_paginate(){ 
		global $wp_query, $wp_rewrite;
         $next='Next';
		$prev='Previous';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$pagination = array(
	    'base'         => @add_query_arg('paged','%#%'),
	    'format'       => '',
	    'total'        => $wp_query->max_num_pages,
	    'current'      => $current,
	    'show_all'     => false,
	    'end_size'     => 3,
	    'mid_size'     => 5,
	    'prev_next'    => true,
	    'prev_text'    => __($prev),
        'next_text'    => __($next),
	    'type'         => 'plain',
	    'add_args'     => true,
		 'add_fragment' =>''  );
		
		if( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ) ;

		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => str_replace(' ', '+',stripslashes(strip_tags(get_search_query())) ));

		echo paginate_links( $pagination );
}

function bt_paginate_custom(){
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$pagination = array(
			'base'         => @add_query_arg('paged','%#%'),
			'format'       => '',
			'total'        => $wp_query->max_num_pages,
			'current'      => $current,
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 5,
			'prev_next'    => true,
			'prev_text'    => __('Lùi lại'),
			'next_text'    => __('Tiếp theo'),
			'type'         => 'plain',
			'add_args'     => true,
		 'add_fragment' =>''  );

	$string ='';
	$filename=get_pagenum_link( 1 );
	 
	$pos = strpos(get_pagenum_link(1),'/?');
	$string = substr(get_pagenum_link(1),$pos+1,strlen(get_pagenum_link(1)));
	$filename=substr(get_pagenum_link(1),0,$pos);
	 
	 
	if( $wp_rewrite->using_permalinks() )

		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's',$filename ) ) . 'page/%#%', 'paged' ).$string;

	 
	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => str_replace(' ', '+',stripslashes(strip_tags(get_search_query())) ));

	echo paginate_links( $pagination );
}

function bt_paginate_ajax($string){
	global $wp_query, $wp_rewrite;
         $next='Tiếp theo';
		$prev='Quay lại';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$pagination = array(
	    'base'         => @add_query_arg('paged','%#%'),
	    'format'       => '',
	    'total'        => $wp_query->max_num_pages,
	    'current'      => $current,
	    'show_all'     => false,
	    'end_size'     => 3,
	    'mid_size'     => 5,
	    'prev_next'    => true,
	    'prev_text'    => __($prev),
        'next_text'    => __($next),
	    'type'         => 'plain',
	    'add_args'     => true,
		 'add_fragment' =>''  );
		
		//$string ='';
	$filename=get_pagenum_link( 1 );
	$pos = strpos(get_pagenum_link(1),'/wp-admin');
	
	//$string = substr(get_pagenum_link(1),$pos+1,strlen(get_pagenum_link(1)));
	$filename=substr(get_pagenum_link(1),0,$pos);
	
	
	if( $wp_rewrite->using_permalinks() )
		$pos2=strpos(get_pagenum_link(1),'/?catid');
		$filename=substr($filename,0,$pos2);
		//echo get_pagenum_link(1);
		$pagination['base'] =user_trailingslashit( trailingslashit( remove_query_arg( 'catid',$filename ) ). 'page/%#%', 'paged' ).$string;
		
		if( !empty($wp_query->query_vars['s']) )
		{
			$pagination['add_args'] = array( 's' => str_replace(' ', '+',stripslashes(strip_tags(get_search_query())) ));
			//echo get_pagenum_link(1);
		}
		echo paginate_links( $pagination );
}

function pagegin_by_ajax($catid,$key)
{
	global $wp_query;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$page =$current;
	$current_page = $page;
	$page -= 1;
	$display = 1;
	$start = $page * $display;
	$pages =$wp_query->max_num_pages;
  // print_r($wp_query);
	if ($current_page >= 7) {
		$start_page = $current_page - 3;
		if ($pages > $current_page + 3)
			$end_page = $current_page + 3;
		else if ($current_page <= $pages && $current_page > $pages - 6) {
			$start_page = $pages - 6;
			$end_page = $pages;
		} else {
			$end_page = $pages;
		}
	} else {
		$start_page = 1;
		if ($pages > 7)
			$end_page = 7;
		else
			$end_page = $pages;
	}
	
	$data = "";
	
	if ($current_page > 1) {
		//$data .= "<a class='page-numbers' page='1' onclick='load_tab_box_2(".$catid.",".$key.",1);' href='javascript:void()'>1</a>";
		$previous = $current_page - 1;
		$data .= "<a class='page-numbers' page='$previous' href='javascript:void()' onclick='load_tab_box_2(".$catid.",".$key.",0);'>Quay lại</li>";
	}
	
	for ($i = $start_page; $i <= $end_page; $i++) {
	if ($current_page == $i)
			$data .= "<span page='$i' class='page-numbers current' href='javascript:void()' onclick='load_tab_box_2(".$catid.",".$key.",".$i.");'>{$i}</span>";
		else
			$data .= "<a  class='page-numbers' page='$i' href='javascript:void()' onclick='load_tab_box_2(".$catid.",".$key.",".$i.");'>{$i}</a>";
	}
	if($end_page==1) $data='';
	
	if ($current_page < $pages) {
		$next = $current_page + 1;
		$data .= "<a class='page-numbers' page='$next' href='javascript:void()'onclick='load_tab_box_2(".$catid.",".$key.",".$next.");'>Tiếp theo</a>";
		$data .= "<a class='page-numbers' page='$pages' href='javascript:void()' onclick='load_tab_box_2(".$catid.",".$key.",".$pages.");'>Trang cuối</a>";
	}
	echo $data;
	
}


?>