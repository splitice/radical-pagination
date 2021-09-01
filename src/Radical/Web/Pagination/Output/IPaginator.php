<?php
namespace Radical\Web\Pagination\Output;
use Radical\Web\Pagination\Output\Template\IPaginationTemplate;

interface IPaginator {
	function toURL($page = 1);
	function output($last,IPaginationTemplate $template);
}