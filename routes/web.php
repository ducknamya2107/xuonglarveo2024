<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/jointables', function () {
//     // return view('welcome');
//     $results =  DB::table('users')
//         ->join('orders', 'users.id', '=', 'orders.user_id')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->select('users.name', DB::raw('SUM(order_items.quantity * order_items.price) as total_spent'))
//         ->groupBy('users.name')
//         ->having('total_spent', '>', 1000)
//         ->get();


//     dd($results);
// });

// Route::get('/truyvantime', function () {
//     $results = DB::table('orders')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->select(DB::raw('DATE(orders.order_date) as date'), DB::raw('COUNT(DISTINCT orders.id) as orders_count'), DB::raw('SUM(order_items.quantity * order_items.price) as total_sales'))
//         ->whereBetween('orders.order_date', ['2024-01-01', '2024-09-30'])
//         ->groupBy(DB::raw('DATE(orders.order_date)'))
//         ->get();

//     dd($results);
// });

// Route::get('/cte', function () {
//     $salesCte = DB::table('sales')
//         ->select('product_id', DB::raw('SUM(quantity) as total_sold'))
//         ->groupBy('product_id');

//     $results = DB::table('products as p')
//         ->joinSub($salesCte, 's', function ($join) {
//             $join->on('p.id', '=', 's.product_id');
//         })
//         ->select('p.product_name', 's.total_sold')
//         ->where('s.total_sold', '>', 100)
//         ->get();
//     dd($results);
// });

// Route::get('/30daygannhat', function () {
//     $thirtyDaysAgo = Carbon::now()->subDays(30);

//     $results = DB::table('users')
//         ->join('orders', 'users.id', '=', 'orders.user_id')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->join('products', 'order_items.product_id', '=', 'products.id')
//         ->select('users.name', 'products.product_name', 'orders.order_date')
//         ->where('orders.order_date', '>=', $thirtyDaysAgo)
//         ->get();
//     dd($results);
// });
// Route::get('/tongdoanhthutheothang', function () {
//     $results = DB::table('orders')
//         ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//         ->select(
//             DB::raw("DATE_FORMAT(orders.order_date, '%Y-%m') as order_month"),
//             DB::raw('SUM(order_items.quantity * order_items.price) as total_revenue')
//         )
//         ->where('orders.status', 'completed')
//         ->groupBy('order_month')
//         ->orderBy('order_month', 'desc')
//         ->get();
//     dd($results);
// });
// Route::get('/spkobandc', function () {
//     $results = DB::table('products')
//         ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
//         ->select('products.product_name')
//         ->whereNull('order_items.product_id')
//         ->get();
//     dd($results);
// });
// Route::get('/spdoanhthumax', function () {
//     $results = DB::table('products as p')
//         ->join(
//             DB::raw('(SELECT product_id, SUM(quantity * price) AS total 
//                      FROM order_items 
//                      GROUP BY product_id) AS oi'),
//             'p.id',
//             '=',
//             'oi.product_id'
//         )
//         ->select('p.category_id', 'p.product_name', DB::raw('MAX(oi.total) AS max_revenue'))
//         ->groupBy('p.category_id', 'p.product_name')
//         ->orderBy('max_revenue', 'DESC')
//         ->get();
//     dd($results);
// });
// Route::get('/tongdoanhthutheothang', function () {
//     $results = DB::table('sales')
//         ->selectRaw('SUM(total) as total_sales, EXTRACT(MONTH FROM sale_date) as month, EXTRACT(YEAR FROM sale_date) as year')
//         ->groupByRaw('EXTRACT(MONTH FROM sale_date), EXTRACT(YEAR FROM sale_date)')
//         ->get();

//     foreach ($results as $result) {
//         echo "Tháng {$result->month} năm {$result->year}: Tổng doanh thu = {$result->total_sales}<br>";
//         dd($results);
//     }
// });
// Route::get('/tongchiphitheothang', function () {
//     $results = DB::table('expenses')
//         ->selectRaw('SUM(amount) as total_expenses, EXTRACT(MONTH FROM expense_date) as month, EXTRACT(YEAR FROM expense_date) as year')
//         ->groupByRaw('EXTRACT(MONTH FROM expense_date), EXTRACT(YEAR FROM expense_date)')
//         ->get();

//     foreach ($results as $result) {
//         echo "Tháng {$result->month} năm {$result->year}: Tổng chi phí = {$result->total_expenses}<br>";
//     }
//     dd($results);
// });
Route::get('/', function () {
    return view('welcome');
});
Route::resource('customers', CustomerController::class);
Route::delete('customers/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])
    ->name('customers.forceDestroy');


Route::resource('employees', EmployeeController::class);
Route::delete('employees/{employee}/forceDestroy', [EmployeeController::class, 'forceDestroy'])
    ->name('employees.forceDestroy');
