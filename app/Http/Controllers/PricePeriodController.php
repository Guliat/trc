<?php

namespace App\Http\Controllers;

use App\Models\PricePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\PricePeriodService;
use App\Http\Requests\PricePeriodRequest;

class PricePeriodController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new PricePeriodService();
    }

    public function index()
    {
        $price_periods = PricePeriod::all();

        $price_periods->transform(function($item) {
            $item->start_date = Carbon::parse($item->start_date)->translatedFormat('d F Y');
            $item->end_date = Carbon::parse($item->end_date)->translatedFormat('d F Y');
            return $item;
        });

        return response()->json($price_periods, 200);
    }

    public function store(PricePeriodRequest $request)
    {
        PricePeriod::create([
            'start_date' => Carbon::createFromDate($request->start_date),
            'end_date' => Carbon::createFromDate($request->end_date),
            'price_per_day' => $request->price_per_day
        ]);

        return response('Created', 200);
    }

    public function show(PricePeriod $pricePeriod)
    {
        return response()->json($pricePeriod, 200);
    }

    public function update(PricePeriodRequest $request, PricePeriod $pricePeriod)
    {
        $pricePeriod->update([
            'start_date' => Carbon::createFromDate($request->start_date),
            'end_date' => Carbon::createFromDate($request->end_date),
            'price_per_day' => $request->price_per_day
        ]);

        return response('Updated', 200);
    }

    public function destroy(PricePeriod $pricePeriod)
    {
        PricePeriod::destroy($pricePeriod->id);
        return response('Deleted', 200);
    }

    public function getPrices(Request $request)
    {
        $periods = $this->service->getPrices($request);
        $total_price = $this->service->calculateTotalPrice($periods);

        return response()->json([
            'periods'=> $periods,
            'total_price' => $total_price
        ], 200);
    }
}