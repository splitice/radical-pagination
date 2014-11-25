<?php
namespace Radical\Web\Pagination;

use Radical\Web\Pagination\Output\Template\IPaginationTemplate;

interface IPaginator extends \IteratorAggregate {
	function outputLinks(Output\IPaginator $paginator,IPaginationTemplate $template);
}