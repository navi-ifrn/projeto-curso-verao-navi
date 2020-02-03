<?php


namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Pesquisador extends Pivot
{
    /**
     * @return BelongsTo
     */
    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function papel()
    {
        return $this->belongsTo(Papel::class, 'papel_id');
    }
}
