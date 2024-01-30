<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Support\Facades\DB; // Import DB facade

class AdminController extends Controller
{
    public function index()
    {
        // Fetch reservations data
        $reservations = Reservation::all();
    
        // Fetch data for chart (categories and menu counts)
        $categories = Category::withCount('menus')->get();
        $categoryNames = $categories->pluck('name');
        $menuCounts = $categories->pluck('menus_count');

        
    
        // Fetch reservations count by month
        $reservationData = DB::table('reservations')
            ->select(DB::raw('MONTH(res_date) as month'), 
                     DB::raw('COUNT(*) as reservation_count'),
                     DB::raw('MAX(TIME_FORMAT(res_date, "%H:%i")) as high_reservation_time')
            )
            ->groupBy(DB::raw('MONTH(res_date)'))
            ->get();
    
        // Fetch reservation details
    $reservationDetails = Reservation::select('first_name', 'last_name', 'email', 'tel_number', 'res_date', 'guest_number')
    ->get();

// Map numeric month values to month names
$monthNames = [
    1 => 'Jan',
    2 => 'Feb',
    3 => 'Mar',
    4 => 'Apr',
    5 => 'May',
    6 => 'Jun',
    7 => 'Jul',
    8 => 'Aug',
    9 => 'Sep',
    10 => 'Oct',
    11 => 'Nov',
    12 => 'Dec',
];

// Replace numeric month values with month names
foreach ($reservationData as $data) {
    $data->month = $monthNames[$data->month];
}

return view('admin.index', compact('reservations', 'categoryNames', 'menuCounts', 'reservationData', 'reservationDetails'));
}
}