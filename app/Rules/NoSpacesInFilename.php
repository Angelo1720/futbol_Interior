<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoSpacesInFilename implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Obtener el nombre del archivo sin la extensión
        $filename = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);
        // Verificar si el nombre del archivo contiene espacios en blanco
        return !preg_match('/\s/', $filename);
    }

    public function message()
    {
        return 'El nombre del archivo no debe contener espacios en blanco. Ej: "Club_Uruguay.png"';
    }
}
