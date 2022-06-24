<?php

namespace App\Observers;

use App\Admin\Page;

class PageObserver
{
    /**
     * Handle the page "created" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function created(Page $page)
    {
        //
    }

    /**
     * Handle the page "updated" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function updated(Page $page)
    {
        //
    }

    /**
     * Handle the page "deleted" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        //dd('i am calling');
        $page->modules()->delete();
    }

    /**
     * Handle the page "restored" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        //
    }

    /**
     * Handle the page "force deleted" event.
     *
     * @param  \App\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        //
    }

    public function deleting(Page $page)
    {
        $page->modules()->delete();
    }
}
