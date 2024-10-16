<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TableuserController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckageMiddleware;

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
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::resource('customers', CustomerController::class);
// Route::delete('customers/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])
//     ->name('customers.forceDestroy');



// Route::resource('employees', EmployeeController::class);
// Route::delete('employees/{employee}/forceDestroy', [EmployeeController::class, 'forceDestroy'])
//     ->name('employees.forceDestroy');

// Route::middleware([CheckageMiddleware::class])->group(function () {
//     Route::resource('movies', MovieController::class);
//     Route::get('/admin', function () {
//         return view('admin.dashboard');
//     });

//     Route::get('/orders', function () {
//         return view('orders.index');
//     });

//     Route::get('/profile', function () {
//         return view('profile.index');
//     });
// });
// Route cho admin
// Route::get('/admin', function () {
//     return 'Chào mừng admin!';
// })->middleware('role');

// // Route cho nhân viên
// Route::get('/employee', function () {
//     return 'Chào mừng nhân viên!';
// })->middleware('role');

// // Route cho khách hàng
// Route::get('/customer', function () {
//     return 'Chào mừng khách hàng!';
// })->middleware('role');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['role:admin'])->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::delete('customers/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])
        ->name('customers.forceDestroy');

    Route::resource('employees', EmployeeController::class);
    Route::delete('employees/{employee}/forceDestroy', [EmployeeController::class, 'forceDestroy'])
        ->name('employees.forceDestroy');
});

// Route cho nhân viên
Route::middleware(['role:employee'])->group(function () {
    Route::resource('employees', EmployeeController::class)->except(['destroy', 'forceDestroy']);
    // Các route khác liên quan đến nhân viên
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// return về home nếu ko có quyền truy cập 
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Routes cho đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route cho đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route cho dashboard sau khi đăng nhập
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');


// Route::post('/transaction/start', [TransactionController::class, 'startTransaction']);
// Route::get('/transaction', [TransactionController::class, 'getTransaction']);
// Route::post('/transaction/confirm', [TransactionController::class, 'confirmTransaction']);
// Route::post('/transaction/complete', [TransactionController::class, 'completeTransaction']);

Route::get('transactions', [TransactionController::class, 'index'])->name('index');
Route::post('transactions', [TransactionController::class, 'startTransaction'])->name('start');

Route::get('/transactions/review', [TransactionController::class, 'reviewTransaction'])->name('review');
Route::post('/transactions/complete', [TransactionController::class, 'completeTransaction'])->name('complete');
Route::post('/transactions/cancel', [TransactionController::class, 'cancelTransaction'])->name('cancel');

Route::get('/transactions/success', [TransactionController::class, 'successTransaction'])->name('success');

// API
Route::apiResource('projects', ProjectController::class);

Route::prefix('projects/{projectId}/tasks')->group(function () {
    Route::apiResource('/', TaskController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
});

Route::resource('students', StudentController::class);