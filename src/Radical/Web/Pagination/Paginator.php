<?php
namespace Radical\Web\Pagination;

use Radical\Web\Pagination\Output\Template\IPaginationTemplate;

/**
 * @author SplitIce
 * A paginated data set
 */
class Paginator implements IPaginator {
	private $source;
	private $page;
	private $perPage;
	private $set;
	private $totalRows;
	public $url;


	function __construct(IPaginationSource $source,$page = 1, $perPage = 30){
		$this->source = $source;
		$this->page = $page;
		$this->perPage = $perPage;
		$this->set = $this->source->get_limit(($this->page-1)*$this->perPage, $this->perPage);
		$this->totalRows = $this->source->getCount();
	}
	
	public function getIterator() {
		$o = $this->set;
		while($o instanceof \IteratorAggregate){
			$o = $o->getIterator();
		}
		return $o;
	}
	
	function outputLinks(IPaginator $paginator,IPaginationTemplate $template){
		$paginator->Output(ceil($this->totalRows/$this->perPage), $template);
	}
}