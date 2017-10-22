<?php
namespace Radical\Web\Pagination\Output\Template;

use Radical\Web\Pagination\Output\IPaginator;

class Bootstrap implements IPaginationTemplate {
	function onePage(){
		return 'Page <strong>1</strong> of <strong>1</strong>';
	}
	function prevLink(IPaginator $paginator,$page){
		return '<li><a href="'.$paginator->toURL($page).'">&laquo; Prev</a></li>';
	}
	function nextLink(IPaginator $paginator,$page){
		return '<li><a href="'.$paginator->toURL($page).'">Next &raquo;</a></li>';
	}
	function lastLink(IPaginator $paginator,$page){
		return '';
	}
	function pageLink(IPaginator $paginator,$page,$isCurrent=false){
		$url = $paginator->toURL($page);
		$ret = '';
		$ret .= '<li'.($isCurrent?' class="active"':'').'><a href="'.$url.'">'.$page.'</a></li>';
		return $ret;
	}

	function start()
	{
		return '<ul class="pagination">';
	}

	function end()
	{
		return '</ul>';
	}
}