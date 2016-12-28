<?php

namespace Douyasi\Extensions;

use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Contracts\Pagination\Presenter as PresenterContract;
use Illuminate\Support\HtmlString;

/**
 * 实现另一种 Bootstrap 3 简单分页样式
 * 
 * @author raoyc <raoyc2009@gmail.com>
 */
class SimpleBootstrapThreePreviousNextPresenter implements PresenterContract
{
    /**
     * Create a simple Bootstrap 3 presenter.
     *
     * @param  \Illuminate\Contracts\Pagination\Paginator  $paginator
     * @return void
     */
    public function __construct(PaginatorContract $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Determine if the underlying paginator being presented has pages to show.
     *
     * @return bool
     */
    public function hasPages()
    {
        return $this->paginator->hasPages() && count($this->paginator->items()) > 0;
    }

    /**
     * Convert the URL window into Bootstrap HTML.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render()
    {
        if ($this->hasPages()) {
            return new HtmlString(sprintf(
                '<ul class="pager">%s %s</ul>',
                $this->getPreviousButton(trans('pagination.previous')),
                $this->getNextButton(trans('pagination.next'))
            ));
        }

        return '';
    }

    /**
     * Get the previous page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getPreviousButton($text = '&laquo;')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text, 'previous');
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getAvailablePageWrapper($url, $text, 'previous', 'prev');
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getNextButton($text = '&raquo;')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if (! $this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text, 'next');
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return $this->getAvailablePageWrapper($url, $text, 'next', 'next');
    }


    protected function getDisabledTextWrapper($text, $style_class = '')
    {
        return '<li class="disabled '.$style_class.'"><span>'.$text.'</span></li>';
    }

    protected function getAvailablePageWrapper($url, $text, $style_class = '', $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li class="'.$style_class.'"><a href="'.$url.'"'.$rel.'>'.$text.'</a></li>';
    }

}