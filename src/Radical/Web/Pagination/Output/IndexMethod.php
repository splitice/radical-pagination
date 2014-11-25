<?php
namespace Radical\Web\Pagination\Output;

class IndexMethod extends Internal\PaginationBase {
	function toURL($page = 1){
		if($page<=1){
			return $this->url;
		}else{
			return rtrim($this->url,'/').'/index'.$page.'.html';
		}
	}
}