<?php
namespace Radical\Web\Pagination;
use Radical\Web\Pagination\Output\Template\IPaginationTemplate;

/**
 * @author SplitIce
 * A paginated data set
 */
class AlphaPaginator implements IPaginator {
	private $source;
	private $page;
	private $set;
	private $field;
	
	public $url;
	public $sql;

	function __construct(IPaginationSource $source,$field){
		$this->source = $source;
		$this->field = $field;
		$this->set = $this->source->get_where($field, $this->page.'%');
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