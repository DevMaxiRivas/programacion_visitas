<?php

namespace App\Validation;

class Messages 
{
    public static function getMessages(): array
    {
        return [
            'required' => 'El campo :field es obligatorio.',
            'email' => 'El campo :field no es un correo electrónico válido.',
            'min' => 'El campo :field debe tener no mínimo :param caracteres.',
            'max' => 'El campo :field debe tener no máximo :param caracteres.',
            'between' => 'El campo :field debe tener entre :param0 y :param1 caracteres.',
            'unique' => 'El campo :field ya está en uso.',
            'integer' => 'El campo :field debe ser un número entero.',
            'numeric' => 'El campo :field deve ser un número.',
            'date' => 'El campo :field debe ser una fecha válida.',
            'digits' => 'El campo :field debe tener :param dígitos.',
            'alpha' => 'El campo :field debe contener solo letras.',
            'alpha_numeric' => 'El campo :field debe contener solo letras y números.',
            'alpha_dash' => 'El campo :field debe contener solo letras, números y guiones.',
            'boolean' => 'El campo :field debe ser verdadero o falso.',
            'confirmed' => 'El campo :field no coincide con su confirmación.',
            'in' => 'El campo :field debe ser uno de los siguientes valores: :param0, :param1, ...',
            'not_in' => 'El campo :field no puede ser uno de los siguientes valores: :param0, :param1, ...',
            'url' => 'El campo :field debe ser una URL válida.',
            'ip' => 'El campo :field debe ser una dirección IP válida.',
            'json' => 'El campo :field debe ser una cadena JSON válida.',
            'regex' => 'El campo :field no coincide con el formato requerido.',
            'file' => 'El campo :field debe ser un archivo.',
            'image' => 'El campo :field debe ser una imagen válida.',
            'mimes' => 'El campo :field debe ser un archivo de tipo: :param0, :param1, ...',
            'size' => 'El campo :field debe tener un tamaño de :param bytes.',
            'timezone' => 'El campo :field debe ser una zona horaria válida.',
            'array' => 'El campo :field debe ser un arreglo.',
            'accepted' => 'El campo :field debe ser aceptado.',
            'different' => 'El campo :field debe ser diferente de :param0.',
            'exists' => 'El campo :field no existe en la base de datos.',
            'not_exists' => 'El campo :field ya existe en la base de datos.',
            'starts_with' => 'El campo :field debe comenzar con uno de los siguientes valores: :param0, :param1, ...',
            'ends_with' => 'El campo :field debe terminar con uno de los siguientes valores: :param0, :param1, ...'
        ];
    }
    public static function getMessage(string $rule, string $field, array $params = []): string
    {
        $message = self::getMessages()[$rule] ?? 'El campo :field no tiene un mensaje definido para la regla ' . $rule;
        $message = str_replace(':field', $field, $message);

        foreach ($params as $key => $value) {
            $message = str_replace(":param{$key}", $value, $message);
        }

        return $message;
    }

    public static function getMessagesForFields(array $rule, $field): array
    {
        $rules = [];
        foreach ($rule as $key => $params) {
            $rules[$key] = self::getMessage($key, $field, $params);
        }

        return $rules;
    }

}
    