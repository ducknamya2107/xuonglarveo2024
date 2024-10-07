<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'customers.';
    public function index()
    {
        //
        $data = Customer::latest('id')->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //=>[]
        $data = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            // 'avatar' => 'nullable|image|max:2048',
            // 'avatar' =>'nullable|file|max:2048',
            'avatar' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => ['required', 'string', 'max:20', Rule::unique('customers')],
            'email' => 'required|email|max:100',
            'is_active' => ['nullable', Rule::in([0, 1])],
        ]);
        
        try {
            // Xử lý file avatar nếu có
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::put('customers', $request->file('avatar'));
            }
        
            // Tạo bản ghi mới trong cơ sở dữ liệu
            Customer::query()->create($data);
        
            return redirect()
                ->route('customers.index')
                ->with('success', true);
        
        } catch (\Throwable $th) {
            // Kiểm tra và xóa file avatar nếu cần
            if (!empty($data['avatar']) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
        
            return back()
                ->with('error', $th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__, compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__, compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'avatar' => 'nullable|image|max:2048',
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('customers')->ignore($customer->id)
            ],
            'email' => 'required|email|max:100',
            'is_active' => ['nullable', Rule::in([0, 1])],
        ]);
        try {
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::put('customers', $request->file('avatar'));
            }
            $currentAvatar = $customer->avatar;
            $customer->update($data);
            if (
                $request->hasFile('avatar')
                && !empty($currentAvatar)
                && Storage::exists($currentAvatar)
            ){
                Storage::delete($currentAvatar);
            }
            return back()->with('success', true);
        } catch (\Throwable $th) {
            //throw $th;
            if (empty($data['avatar'] && Storage::exists($data['avatar']))) {
                Storage::delete($data['avatar']);
            }
            return back()
                ->with('success', true)
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        try {
            $customer->delete();
            
        } catch (\Throwable $th) {
            return back()
                ->with('success', true)
                ->with('error', $th->getMessage());
        }
    }
    public function forceDestroy(Customer $customer)
    {
        //
        try {
            $customer->forceDelete();
            if (empty($customer->avatar && Storage::exists($customer->avatar))) {
                Storage::delete($customer->avatar);
            }
        } catch (\Throwable $th) {
            return back()
                ->with('success', true)
                ->with('error', $th->getMessage());
        }
    }
}
