<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// app/Models/Product.php

use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    static $rules = [
        'nombre' => 'required',
        'genero' => 'required',
        'rutaIMG' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre', 'genero', 'rutaIMG'];

    public function storeImage($image)
    {
        $uniqueName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/img', $uniqueName);
        $this->update(['rutaIMG' => 'storage/img/' . $uniqueName]);
    }
}