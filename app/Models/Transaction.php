<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model {
    protected $fillable = ['merchant_id','bank_id','pos_id','currency_id','account_no','amount','net_amount'];
    public function merchant(){ return $this->belongsTo(Merchant::class); }
    public function bank(){ return $this->belongsTo(Bank::class); }
    public function pos(){ return $this->belongsTo(Pos::class); }
    public function currency(){ return $this->belongsTo(Currency::class); }
}