<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Projeto extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'gerente_id'
    ];

    /**
     * @return BelongsTo
     */
    public function gerente()
    {
        return $this->belongsTo(User::class, 'gerente_id');
    }

    public function pesquisadores()
    {
        return $this->belongsToMany(User::class, 'projeto_users')
            ->using(Pesquisador::class)->withPivot('papel_id');
    }
}
