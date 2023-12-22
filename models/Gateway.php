<?php

namespace App\Models;

use Illuminate\Config\Repository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    use HasFactory;


    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $casts = [
        'config' => 'array'
    ];


    /**
     * @return Repository
     */
    public static function getConfig()
    {
        $configArray = self::all()->groupBy('name')->map(function ($value) {
            if (isset($value[1])) {
                $defaultGateway = $value->where('is_default', true)->first();
                $defaultGateway = ($defaultGateway) ?: $value->first();
            } else $defaultGateway = $value->first();
            return $defaultGateway->config;
        })->all();

        $configArray['timezone'] = app('config')->get('gateway.timezone');
        $configArray['table'] = app('config')->get('gateway.table');
        return new Repository(['gateway' => $configArray]);
    }


    /**
     * @return mixed
     */
    public function setAsDefault()
    {
        self::query()->where('name', $this->name)->update(['is_default' => false]);
        return $this->update(['is_default' => true]);
    }
}
