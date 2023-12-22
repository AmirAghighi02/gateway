<?php

namespace App\Models\Traits;

use App\Models\Gateway;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasGateway
{
    /**
     * @param Gateway|int $gateway
     */
    public function attachGateway($gateway)
    {
        $gateway = (is_int($gateway)) ? Gateway::find($gateway) : $gateway;
        $gatewayWithSameName = $this->gateways()->where('name', $gateway->name)->first();
        if ($gatewayWithSameName) $this->detachGateway($gatewayWithSameName);
        $this->gateways()->attach($gateway->id);
    }

    /**
     * @param Gateway|int $gateway
     * @return int
     */
    public function detachGateway($gateway): int
    {
        return $this->gateways()->detach($gateway->id);
    }

    /**
=     * @return BelongsToMany
     */
    public function gateways()
    {
        return $this->belongsToMany(Gateway::class);
    }

    /**
     * @param Gateway|int $gateway
     * @return bool
     */
    public function hasGateway($gateway)
    {
        return $this->gatewayes->contains($gateway);
    }

    /**
     * @param string $gateName
     * @return mixed
     */
    public function getGatewayByName(string $gateName)
    {
        return $this->gateways()->where('name', $gateName)->first();
    }
}
