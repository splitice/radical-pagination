<?php
namespace Radical\Web\Pagination\Output\Internal;

use Radical\Database\SQL\SelectStatement;
use Radical\Web\Pagination\Output\IPaginator;
use Radical\Web\Pagination\Output\Template\IPaginationTemplate;

abstract class PaginationBase implements IPaginator {
	protected $url;
	public $nofollow;
	protected $current;
	
	function __construct($url){
		$this->url = $url;
	}
	
	function getLimit($num){
		$sql = new SelectStatement();
		$sql->limit((($this->current-1)*$num),$num);
		return $sql;
	}
	
	/**
	 * @return int $current
	 */
	public function getCurrent() {
		return $this->current;
	}
	function output($last,IPaginationTemplate $template){
		echo $template->start();
		if($this->current == -1){
			$this->current = $last;
		}
		if($last == 1){
			echo $template->onePage();
			echo $template->end();
			return;
		}
		$istart=max($this->current-5,1);
		if($this->current>1){
			echo $template->prevLink($this, $this->current-1);
		}
		$f=min($last,$this->current+5);
		for($i=$istart;$i<=$f;++$i){
			echo $template->pageLink($this, $i, $this->current==$i);
		}
		if($istart>1 && $f!=$last){
			echo $template->lastLink($this, $last);
		}
		if($this->current<$last){
			echo $template->nextLink($this, $this->current+1);
		}
		echo $template->end();
	}
}