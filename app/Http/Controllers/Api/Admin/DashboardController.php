<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = Invoice::where('status', Invoice::pending)->count();
        $success = Invoice::where('status', Invoice::success)->count();
        $expired = Invoice::where('status', Invoice::expired)->count();
        $failed  = Invoice::where('status', Invoice::failed)->count();

        $year = Carbon::now()->year;

        $trans = Invoice::whereYear('created_at', $year)
            ->where('status', Invoice::success)
            ->groupBy('month')
            ->orderBy('month')
            ->selectRaw('SUM(grand_total) as grand_total,
                MONTH(created_at) as month,
                MONTHNAME(created_at) as month_name,
                YEAR(created_at) as year')
            ->get();

        if(count($trans)) {
            foreach($trans as $result) {
                $month_name[] = $result->month_name;
                $grand_total[] = (int)$result->grand_total;
            }
        } else {
            $month_name = "";
            $grand_total = "";
        }

        return response()->json([
            'success' => true,
            'message' => 'Statistik Data',
            'data' => [
                'count' => [
                    'pending' => $pending,
                    'success' => $success,
                    'expired' => $expired,
                    'failed' => $failed,
                ],
                'chart' => [
                    'month_name' => $month_name,
                    'grand_total' => $grand_total,
                ]
            ]
        ], 200);
    }
}
