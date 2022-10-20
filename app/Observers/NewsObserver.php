<?php

namespace App\Observers;

use App\Models\News;
use Carbon\Carbon;

class NewsObserver
{
    // TODO: тут правильно будет реализовать генерацию markdown -> html

    protected function setPublishedAt(News $news)
    {
        if (empty($news->published_at) && $news->is_published) {
            $news->published_at = Carbon::now();
        }
    }

    public function updating(News $news)
    {
        $this->setPublishedAt($news);
    }

    public function creating(News $news)
    {
        $this->setPublishedAt($news);
    }

    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function created(News $news)
    {
        //
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function updated(News $news)
    {
        //
    }

    public function deleting(News $news)
    {
        // return false;
    }
    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
