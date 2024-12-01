<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash; // Asegúrate de importar esta clase

class UsuarioExcelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new User([
            'name' => $row['name'],      // Columna del archivo Excel
            'email' => $row['email'],    // Columna del archivo Excel
            'password' => Hash::make($row['password']),
        ]);
    }
}
