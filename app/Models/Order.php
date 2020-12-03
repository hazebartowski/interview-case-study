<?php

namespace App\Models;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number', 'user_id', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method',
        'first_name', 'last_name', 'address', 'city', 'country', 'post_code', 'phone_number', 'notes'
    ];

    /*******************
     * VALIDATION FUNCTIONS
     ******************
     */

    /**
     * @param $input
     * @return ValidatorContract|null
     */
    public function getValidatorOrder($input): ?ValidatorContract
    {
        return Validator::make($input, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);
    }

    /*******************
     * ENTTITY FUNCTIONS
     ******************
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
