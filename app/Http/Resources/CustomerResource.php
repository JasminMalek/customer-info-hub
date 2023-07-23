<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        if (isset($data['gender'])) {
            $data['gender_string'] = Customer::GENDER_TYPE_ARRAY[$data['gender']];
        }
        if (isset($data['birthday'])) {
            $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
        }
        return $data;
    }
}
