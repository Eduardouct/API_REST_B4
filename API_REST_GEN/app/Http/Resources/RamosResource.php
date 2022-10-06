<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RamosResource extends JsonResource
{
    /**
     * @var null
     */
    protected $message = null;

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'ID_Estudiantes' => $this->ID_Estudiantes, 
 			'ID_Ramos' => $this->ID_Ramos, 
 			'Semestre' => $this->Semestre, 
 			'asignatura' => $this->asignatura, 
 			'nota' => $this->nota, 
 			
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'success' => true,
            'message' => $this->message,
            'meta' => null,
            'errors' => null
        ];
    }
}
