<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BPMediaFeatured
 *
 * @author saurabh
 */
class BPMediaFeatured {

	/**
	 *
	 */
	public $featured,$user, $settings;

	function __construct($user_id=false) {
		$this->init($user_id);
	}

	function init($user_id=false){
		if(!$user_id){
			$user = bp_displayed_user_id();
		}else{
			$user = $user_id;
		}
		$this->user = $user_id;
		$this->get();
		$this->settings();
	}

	function set($media_id=false){
		if(!$media_id) return;
		bp_update_user_meta($this->user,'bp_media_featured_media',$media_id);
		$this->get();
	}

	function get(){
		$this->featured = bp_get_user_meta($this->user,'bp_media_featured_media', true);
	}

	function settings(){
            global $bp_media;
            $this->settings['image'] = isset($bp_media->options['featured_image'])?1:0;
            $this->settings['video'] = isset($bp_media->options['featured_video'])?1:0;
            $this->settings['audio'] = isset($bp_media->options['featured_audio'])?1:0;
            $this->settings['size'] = isset($bp_media->options['sizes']['media']['featured'])?$bp_media->options['sizes']['media']['featured']:array('width'=>100,'height'=>100, 'crop'=>1);
	}

	function valid_type($type){

	}

	function add_button(){

	}





	function featured_object(){

	}

	function link(){

	}
	function display(){

	}

}

function bp_media_featured($user_id=false){
	$featured = BPMediaFeatured($user_id);
	echo $featured->display();

}

function bp_media_get_featured($user_id=false){
	$featured = BPMediaFeatured($user_id);
	return $featured->featured_object();
}

?>
