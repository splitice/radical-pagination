<?php
namespace Radical\Web\Pagination\Output\Template;
use Radical\Web\Pagination\Output\IPaginator;

interface IPaginationTemplate {
	function onePage();
	function prevLink(IPaginator $paginator,$page);
	function nextLink(IPaginator $paginator,$page);
	function lastLink(IPaginator $paginator,$page);
	function pageLink(IPaginator $paginator,$page,$isCurrent=false);
}