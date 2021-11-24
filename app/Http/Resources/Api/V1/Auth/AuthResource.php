<?php

namespace App\Http\Resources\Api\V1\Auth;

use App\Http\Resources\Api\V1\Company\Company;
use App\Http\Resources\Api\V1\Form\FormManager\FormDetail;
use App\Http\Resources\Api\V1\Form\FormManager\FormDetailCollection;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $email
 * @property mixed username
 * @property mixed tel
 * @property mixed name
 * @property mixed user_type
 * @property mixed company_id
 */
class AuthResource extends JsonResource
{
    /**
     * @var string
     */
    public $token;

    public function __construct($resource, $token)
    {
        $this->token = $token;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'email'      => $this->email,
            'name'       => $this->name,
            'token'      => $this->token,
        ];
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function with($request): array
    {
        return [
            'status' => 'success'
        ];
    }
}
