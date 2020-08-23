<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOrcamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item_orcamentos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'conta_id', 'data_vencimento', 'valor', 'data_pagamento', 'descricao'];

    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
    
}
