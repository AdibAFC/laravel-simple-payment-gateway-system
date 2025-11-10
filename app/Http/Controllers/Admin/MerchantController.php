// app/Http/Controllers/Admin/MerchantController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;

class MerchantController extends Controller
{
    public function index()
    {
        $merchants = Merchant::latest('id')->paginate(10, ['*'], 'merchants');
        return view('admin.merchants.index', compact('merchants'));
    }
}
