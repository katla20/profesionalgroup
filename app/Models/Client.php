<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'clients';
    protected  $primaryKey = 'id';

    protected $fillable = ['email','fullname','ci','occupation','address','citycode','phone','dob','knowabout'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authorizations()
    {
        return $this->hasMany('App\Models\Authorization', 'client_id', 'id');
    }
    
}
