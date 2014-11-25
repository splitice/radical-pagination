<?php
namespace Radical\Web\Pagination\Output;

class CallbackMethod extends Internal\PaginationBase {
	function toURL($page = 1){
		$callback = $this->url;
		return $callback($page);
	}
}