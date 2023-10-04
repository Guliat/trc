<?php

namespace App\Services;

use App\Models\PricePeriod;
use Illuminate\Support\Carbon;

class PricePeriodService {

    public function getPrices($request)
    {
        $periods = [];
        $dates_range = [];
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        while ($start_date->lte($end_date)) {
            $dates_range[] = $start_date->toDateString();
            $start_date->addDay();
        }

        foreach($dates_range as $index=>$date)
        {
            $price = PricePeriod::where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)
            ->first();

            if ($price)
            {
                $periods[$index]['date'] = Carbon::parse($price->start_date)->translatedFormat('d F Y');
                $periods[$index]['price_per_day'] = $price->price_per_day;
            }
            else {
                $periods[$index]['date'] = Carbon::parse($date)->translatedFormat('d F Y');
                $periods[$index]['price_per_day'] = config('trc.default_price_per_day');
            }
        }

        return $periods;
    }

    public function calculateTotalPrice($prices)
    {
        $total_price = null;

        foreach($prices as $price)
        {
            $total_price += $price['price_per_day'];
        }

        return $total_price;
    }
}