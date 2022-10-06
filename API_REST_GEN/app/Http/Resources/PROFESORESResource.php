<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PROFESORESResource extends JsonResource
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
            'ID_Profesor' => $this->ID_Profesor, 
 			'ID_Usuarios' => $this->ID_Usuarios, 
 			'Nombre' => $this->Nombre, 
 			'apellido_1' => $this->apellido_1, 
 			'apellido_2' => $this->apellido_2, 
 			'Telefono' => $this->Telefono, 
 			'Correo' => $this->Correo, 
 			'Asignatura' => $this->Asignatura, 
 			
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
