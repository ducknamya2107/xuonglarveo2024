<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactions.transaction');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    // 1. Khởi tạo phiên giao dịch và lưu vào session


    public function startTransaction(Request $request)
    {
        try {
            $data = $request->validate([
                'transaction_id' => 'required|integer|unique:transactions',
                'amount' => 'required|numeric|min:1',
                'receiver_account' => 'required|numeric', // Thêm 'numeric' nếu đây là số tài khoản
                'status' => 'required|string|in:pending,completed', // Xóa 'cancelled' nếu không cần
            ]);

            // Đưa ra thông tin đã nhận để kiểm tra


            session()->put('transaction', [
                'transaction_id'    => $data['transaction_id'],
                'amount'            => $data['amount'],
                'receiver_account'   => $data['receiver_account'],
                'status'            => $data['status'],
            ]);

            return redirect()->route('review')->with('success', 'Khởi tạo session thành công');
        } catch (Exception $e) {
            // Ghi lại thông điệp lỗi để dễ dàng chẩn đoán
            // \Log::error('Transaction creation failed: ' . $e->getMessage());
            return back()->with('error', 'Khởi tạo giao dịch thất bại: ' . $e->getMessage());
        }
    }

    public function reviewTransaction()
    {
        if(session()->has('transaction')){
            $transaction = session()->get('transaction');

            return view('transactions.review', compact('transaction'));
        }
      
    }
    public function cancelTransaction()
    {
        try {
            if (session()->has('transaction')) {
                session()->forget('transaction');
                return redirect('transactions')->with('success', 'Giao dịch bị hủy thành công');
            } else {
                return redirect()->route('review')->with('error', 'Không tìm thấy giao dịch để hủy.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('review')->with('error', 'Đã xảy ra lỗi trong quá trình hủy giao dịch.' . $th->getMessage());
        }
    }
    public function completeTransaction(Request $request)
    {
        try {
            if (session()->has('transaction')) {
                
                session()->put('transaction.status', 'confirmed');

                Transaction::create([
                    'transaction_id' => session('transaction.transaction_id'),
                    'amount' => session('transaction.amount'),
                    'receiver_account' => session('transaction.receiver_account'),
                    'status' => session('transaction.status'),
                ]);
                session()->forget('transaction');

                return redirect()->route('success')->with('completeSuccess', 'Chuyển tiền thành công');
            } else {
                return redirect()->route('review')->with('error', 'Không tìm thấy giao dịch để hủy.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('review')->with('error', 'Đã xảy ra lỗi trong quá trình hủy giao dịch.' . $th->getMessage());
        }
    }

    public function successTransaction(){
        return view('transactions.success');
    }
}
