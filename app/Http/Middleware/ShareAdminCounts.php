// app/Http/Middleware/ShareAdminCounts.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Merchant;
use App\Models\Transaction;

class ShareAdminCounts
{
    public function handle(Request $request, Closure $next)
    {
        $counts = [
            'banks'        => Bank::count(),
            'merchants'    => Merchant::count(),
            'transactions' => Transaction::count(),
        ];
        view()->share('counts', $counts);
        return $next($request);
    }
}
