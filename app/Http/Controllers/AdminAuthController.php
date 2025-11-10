<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Bank;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $creds = $request->validate([
            'email'    => ['required','email','max:100'],
            'password' => ['required','string','min:6'],
        ]);

        if (Auth::guard('admin')->attempt($creds, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required','string','max:100'],
            'email'                 => ['required','email','max:100','unique:admins,email'],
            'password'              => ['required','string','min:6','confirmed'],
        ]);

        $admin = Admin::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        // Determine which tab is selected (default: banks)
        $tab = $request->query('tab');

        // Counts for sidebar
        $counts = [
            'banks'        => \App\Models\Bank::count(),
            'merchants'    => \App\Models\Merchant::count(),
            'transactions' => \App\Models\Transaction::count(),
        ];

        // Load only data for the active tab
        $banks = $merchants = $transactions = collect();

        if ($tab === 'banks') {
            $banks = \App\Models\Bank::latest('id')->paginate(10, ['*'], 'banks');
        } elseif ($tab === 'merchants') {
            $merchants = \App\Models\Merchant::latest('id')->paginate(10, ['*'], 'merchants');
        } elseif ($tab === 'transactions') {
            $transactions = \App\Models\Transaction::with(['merchant', 'bank', 'pos', 'currency'])
                ->latest('id')
                ->paginate(10, ['*'], 'transactions');
        }

        // Send data to the view
        return view('admin.dashboard', compact('tab', 'counts', 'banks', 'merchants', 'transactions'));
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
