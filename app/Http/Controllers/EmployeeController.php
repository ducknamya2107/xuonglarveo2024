<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'employees.';
    public function index()
    {
        //
        $data = Employee::latest('id')->paginate(5);
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
        //
        $data = $request->validate([
            'firstname' => 'required|string|max:100',   // Bắt buộc, chuỗi, tối đa 100 ký tự
            'lastname' => 'required|string|max:100',    // Bắt buộc, chuỗi, tối đa 100 ký tự
            'email' => 'required|email|max:150|unique:employees,email',  // Bắt buộc, email hợp lệ, duy nhất, tối đa 150 ký tự
            'phone' => 'required|string|max:20',        // Bắt buộc, chuỗi, tối đa 20 ký tự
            'date_of_birth' => 'required|date',         // Bắt buộc, định dạng ngày tháng
            'hire_date' => 'required|date',             // Bắt buộc, định dạng ngày tháng
            'salary' => 'required|numeric|min:0',       // Bắt buộc, số, không âm
            'department_id' => 'nullable|integer',      // Không bắt buộc, số nguyên
            'manager_id' => 'nullable|integer',         // Không bắt buộc, số nguyên
            'address' => 'nullable|string|max:255',     // Không bắt buộc, chuỗi, tối đa 255 ký tự
            'is_active' => ['nullable', Rule::in([0, 1])],
        ]);

        try {
            // Xử lý file profile_picture nếu có
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
            }

            // Tạo bản ghi mới trong cơ sở dữ liệu
            Employee::query()->create($data);
            // dd($data);
            return redirect()
                ->route('employees.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            // Kiểm tra và xóa file profile_picture nếu cần
            if (!empty($data['profile_picture']) && Storage::exists($data['profile_picture'])) {
                Storage::delete($data['profile_picture']);
            }

            return back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
        // dd($employee);
        // dd($employee); // Kiểm tra giá trị của employee
        return view(self::PATH_VIEW . __FUNCTION__, compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__, compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $data = $request->validate([
            'firstname' => 'required|string|max:100',   // Bắt buộc, chuỗi, tối đa 100 ký tự
            'lastname' => 'required|string|max:100',    // Bắt buộc, chuỗi, tối đa 100 ký tự
            'email' => [
                'required', 
                'email', 
                'max:150', 
                Rule::unique('employees')->ignore($employee->id) // Kiểm tra unique trừ bản ghi hiện tại
            ],  
            'phone' => 'required|string|max:20',        // Bắt buộc, chuỗi, tối đa 20 ký tự
            'date_of_birth' => 'required|date',         // Bắt buộc, định dạng ngày tháng
            'hire_date' => 'required|date',             // Bắt buộc, định dạng ngày tháng
            'salary' => 'required|numeric|min:0',       // Bắt buộc, số, không âm
            'department_id' => 'nullable|integer',      // Không bắt buộc, số nguyên
            'manager_id' => 'nullable|integer',         // Không bắt buộc, số nguyên
            'address' => 'nullable|string|max:255',     // Không bắt buộc, chuỗi, tối đa 255 ký tự
            'is_active' => ['nullable', Rule::in([0, 1])],
            'profile_picture' => 'nullable|image|max:2048',  // Không bắt buộc, file ảnh, tối đa 2MB
        ]);
        
        try {
            // Xử lý file profile_picture nếu có
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
            }
        
            // Lưu lại ảnh đại diện hiện tại để kiểm tra sau khi cập nhật
            $currentAvatar = $employee->profile_picture;
        
            // Cập nhật dữ liệu nhân viên
            $employee->update($data);
        
            // Kiểm tra và xóa ảnh cũ nếu có ảnh mới được cập nhật
            if (
                $request->hasFile('profile_picture')
                && !empty($currentAvatar)
                && Storage::exists($currentAvatar)
            ) {
                Storage::delete($currentAvatar);
            }
        
            return redirect()
                ->route('employees.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            // Xóa ảnh mới nếu cập nhật thất bại
            if (!empty($data['profile_picture']) && Storage::exists($data['profile_picture'])) {
                Storage::delete($data['profile_picture']);
            }
        
            return back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        try {
            $employee->delete();
            
        } catch (\Throwable $th) {
            return back()
                ->with('success', true)
                ->with('error', $th->getMessage());
        }
    }
    public function forceDestroy(Employee $employee)
    {
        //
        try {
            $employee->forceDelete();
            if (empty($employee->profile_picture && Storage::exists($employee->profile_picture))) {
                Storage::delete($employee->profile_picture);
            }
        } catch (\Throwable $th) {
            return back()
                ->with('success', true)
                ->with('error', $th->getMessage());
        }
    }
}
