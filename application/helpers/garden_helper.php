<?php

if ( ! function_exists('dump')) {
	function dump($data,$die=false) {
		echo "<pre>";
		print_r($data);
		if ($die == false) {
			echo "</pre>";
			die;
		} else {
			echo "</pre>";
		}
		
	}
}

if ( ! function_exists('limit_text')) {
	function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
}


if (! function_exists('url_to_id')) {
	function url_to_id($url) {
		$id = explode("-", $url);
		return end($id);
	}
}

if ( ! function_exists('get_uri')) {
	function get_uri($uri = '') {
		return "{$uri}";
	}
}

if (! function_exists('page_is')) {
	function page_is($class_name = '') {
		$CI =& get_instance();
		return $CI->router->fetch_class() === $class_name;
	}
}

if (! function_exists('round_up')) {
	function round_up($number, $precision = 2) {
	    $fig = (int) str_pad('1', $precision, '0');
	    return (ceil($number * $fig) / $fig);
	}
}