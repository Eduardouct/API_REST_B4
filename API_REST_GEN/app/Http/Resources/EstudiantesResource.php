<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstudiantesResource extends JsonResource
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
            'RUT_E' => $this->RUT_E, 
 			'ID_Usuario' => $this->ID_Usuario, 
 			'Nombre' => $this->Nombre, 
 			'Apellidos' => $this->Apellidos, 
 			'Fecha_Nacimiento' => $this->Fecha_Nacimiento, 
 			'Direccion' => $this->Direccion, 
 			'Telefono' => $this->Telefono, 
 			'Carrera' => $this->Carrera, 
 			
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
