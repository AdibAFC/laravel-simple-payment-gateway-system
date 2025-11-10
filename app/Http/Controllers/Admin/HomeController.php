// app/Http/Controllers/Admin/HomeController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Just return the blank home (your layout renders sidebar & header)
        return view('admin.home'); // create admin/home.blade.php
    }
}
