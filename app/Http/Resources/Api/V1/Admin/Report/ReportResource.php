<?php

namespace App\Http\Resources\Api\V1\Admin\Report;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'total_prices' => $this['total_prices'],
            'total_nights' => $this['total_nights'],
            'total_guests' => $this['total_guests'],
            'total_empty_nights' => $this['total_empty_nights'],
            'most_common_type' => [
                'type' => $this['most_common_type']['type'],
                'total' => $this['most_common_type']['total'],
            ]
        ];
    }
}
