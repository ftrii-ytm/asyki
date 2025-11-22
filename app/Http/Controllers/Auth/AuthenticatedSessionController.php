<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login user.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // ✅ Redirect otomatis berdasarkan role user
        $user = $request->user();

        switch ($user->role) {
            case 'pengaju':
                return redirect('/pengajuan'); // ✅ sudah diperbaiki
            case 'ga':
                return redirect('/ga');
            case 'keuangan':
                return redirect('/keuangan');
            case 'payment':
                return redirect('/payment');
            default:
                return redirect('/pengajuan');
        }
    }

    /**
     * Logout user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
