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

		$count = $this->source->getCount();

		if($page == -1) {
			$page = $count == 0 ? 0 :floor(($count -1) / $perPage);
			$this->page = $page + 1;
		}else{
			$page = $this->page - 1;
		}

		$start = $page*$this->perPage;

		$this->set = $this->source->get_limit($start, $this->perPage);
		$this->totalRows = $count;
	}

	/**
	 * @return float
	 */
	public function getPage()
	{
		return $this->page;
	}

	/**
	 * @return int
	 */
	public function getPerPage()
	{
		return $this->perPage;
	}

	/**
	 * @return mixed
	 */
	public function getTotalRows()
	{
		return $this->totalRows;
	}



	public function getIterator() {
		$o = $this->set;
        if(is_array($o)){
            return new \ArrayIterator($o);
        }
		while($o instanceof \IteratorAggregate){
			$o = $o->getIterator();
		}
		return $o;
	}
	
	function outputLinks(Output\IPaginator $paginator,IPaginationTemplate $template){
		$paginator->Output(ceil($this->totalRows/$this->perPage), $template);
	}
}