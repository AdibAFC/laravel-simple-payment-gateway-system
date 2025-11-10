// app/Http/Controllers/Admin/TransactionController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['merchant','bank','pos','currency'])
            ->latest('id')
            ->paginate(10, ['*'], 'transactions');

        return view('admin.transactions.index', compact('transactions'));
    }
}
