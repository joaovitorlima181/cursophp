<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero', 'temporada', 'serie_id', 'assistido'];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssitidoAttribute($assistido) : bool
    {
        return $assistido;
    }

    public function getLinksAttribute() : array
    {
        return [
            'self' => '/api/episodios/' . $this->id,
            'serie' => 'api/series/' . $this->serie_id,
        ];
    }
}