<?php
namespace App\Http\Controllers;

use App\Models\User; // Sử dụng model User của bạn
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Hiện form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register'); // Trả về view của form đăng ký
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password trước khi lưu
        ]);

        // Đăng nhập người dùng sau khi đăng ký thành công
        Auth::login($user);

        // Chuyển hướng đến trang dashboard hoặc trang chủ
        return redirect('/home');
    }

    // Hiện form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login'); // Trả về view của form đăng nhập
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Validate thông tin đăng nhập
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Thử đăng nhập
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Tạo lại session để bảo vệ khỏi session fixation

            return redirect()->intended('/home'); // Chuyển hướng đến trang mà người dùng định vào
        }

        // Nếu đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Hủy session hiện tại
        $request->session()->regenerateToken(); // Tạo token mới

        return redirect('/'); // Chuyển hướng về trang chủ
    }

    // Hiện form quên mật khẩu
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Hiện form đặt lại mật khẩu
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    // Xử lý đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required|string',
        ]);

        // Logic để cập nhật mật khẩu
        // Ví dụ: lấy email từ token và cập nhật mật khẩu
        // ...
        
        return redirect('/login')->with('success', 'Mật khẩu đã được đặt lại thành công! Hãy đăng nhập.');
    }
}
