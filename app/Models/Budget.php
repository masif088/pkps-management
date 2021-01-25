<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property boolean $status_transaction
 * @property int $money
 * @property string $pic_internal
 * @property string $pic_external
 * @property string $time_transaction
 * @property string $note
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 */
class Budget extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'status_transaction', 'money', 'pic_internal', 'pic_external', 'time_transaction', 'note', 'file', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%')
                ->orWhere('money', 'like', '%'.$query.'%')
                ->orWhere('status_transaction', 'like', '%'.$query.'%')
                ->orWhere('time_transaction', 'like', '%'.$query.'%')
                ->orWhere('created_at', 'like', '%'.$query.'%')
            ;
    }

}
