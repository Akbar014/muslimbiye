<?php

namespace App\Models;

use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SubscriptionHistory extends Model
{
    use HasFactory;

    protected $table = 'subscription_histories';

    protected $fillable = [
        'type',
        'type_id',
        'reference',
        'pay_id',
        'payment_id',      // Corrected from 'paymentID' to 'payment_id'
        'payment_details', // Corrected from 'paymentDetails' to 'payment_details'
        'status_code',
        'message',
        'trxID',
        'apiVersion',
        'users_id',
        'users',
        'amount',
        'created_at',
        'updated_at',
        'status'
    ];

    protected $casts = [
        'users' => 'array', // Assuming 'users' is stored as JSON in the database
    ];

    public $timestamps = true; // This will automatically manage 'created_at' and 'updated_at'


    public static function total_subscription_earn()
    {
        return self::where('type', 'SubscriptionPackage')
            ->where('status_code', '0000')
            ->whereNotNull('trxID')
            ->sum('amount');
    }

    public static function today_subscription_earn()
    {
        return self::whereDate('created_at', Carbon::today())
            ->where('type', 'SubscriptionPackage')
            ->where('status_code', '0000')
            ->whereNotNull('trxID')
            ->sum('amount');
    }
    public function plan()
    {
        return $this->belongsTo(Package::class, 'type_id');
    }


    public function package()
    {
        return Packages::find($this->type_id);
    }

    public function user()
    {
        return User::find($this->users_id);
    }
}
