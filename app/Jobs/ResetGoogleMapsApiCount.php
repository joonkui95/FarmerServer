<?php

namespace App\Jobs;

use App\GoogleMapsApi;
use App\OriginalAddressData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResetGoogleMapsApiCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach (GoogleMapsApi::get() as $item) {
            $item->update(['used_count'=>0]);
        }
        foreach (OriginalAddressData::whereNull('is_converted')->get() as $item) {
            dump($item->fail_count);
            $item->update(['is_fail'=>null, 'is_queue'=>null]);
        }
    }
}
