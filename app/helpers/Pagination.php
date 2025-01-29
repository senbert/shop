<?php

namespace App\Helpers;

class Pagination 
{
    public $perpage;
    public $page;
    public $total;
    public $pages;
    public $offset;
    public $next;
    public $prev;

    public function __construct($perpage, $total)
    {
        
        $this->perpage = $perpage;
        $this->total = $total; 
        $this->page = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->countPages();
        $this->countOffset();
        $this->getNextPage();
        $this->getPrevPage();
    }

    public function countPages()
    {
        $this->pages = ceil($this->total / $this->perpage);
    }
    public function countOffset()
    {
        $this->offset = ($this->page - 1) * $this->perpage;
    }

    public function getNextPage()
    {
        $this->next = ($this->page == $this->pages) ? 1 : $this->page + 1;
    }

    public function getPrevPage()
    {
        $this->prev = ($this->page == 1) ? $this->pages : $this->page - 1;
    }
}