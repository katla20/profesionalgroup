<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
	use HasFactory;
	
    public $timestamps = true;
    protected  $primaryKey = 'id';

    protected $table = 'authorizations';

    protected $fillable = [
        'client_id',
        'user_id',
        'proceeded',
        'proceeded_date',
        'signature_client',
        'signature_date',
        'skin_type',
        'history',
        'history_specify',
        'reason',
        'color_observation',
        'color_eyebrows',
        'color_eyerline',
        'color_lips',
        'color_other',
        'cost_treatment',
        'image_release'
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
