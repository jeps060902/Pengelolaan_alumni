<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumniResource extends JsonResource
{

    public $status;
    public $message;
    public $data;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function __construct($status, $message, $data)
    {
        parent::__construct($data);
        $this->status  = $status;
        $this->message = $message;
        $this->data = $data;
    }
    public function toArray(Request $request): array
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->data
        ];
    }
}
