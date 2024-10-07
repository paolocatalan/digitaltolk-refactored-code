<?php declare(strict_types=1);


namespace DTApi\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'immediate' => $this->immediate,
                'status' => $this->status,
                'message' => $this->message,
                'field_name' => $this->field_name,
                'due' => $this->due,
                'gender' => $this->gender,
                'customer_phone_type' => $this->customer_phone_type,
                'customer_physical_type' => $this->customer_physical_type,
                'job_type' => $this->job_type
            ],
            'relationships' => [
                'id' => (string)$this->user->id,
                'name' => $this->__authenticatedUser->name,
                'job for' => $this->user->email
            ]
        ];
    }
}
