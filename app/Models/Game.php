<?php   

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function scopeFindName($query, array $filter){
        if(($filter) ? $filter['search'] : false){
            return $query->where('name','like','%'.$filter['search']."%");
        }
    }   
    public function scopeFindGenre($query){
        if(request('category')){
            $request=request('category');
            foreach($request as $select) {
                $query->orWhere('slug', '=', $select[]);
             }
            return $query;
        }
    }

    public function gameDetail(){
        return $this->hasOne(GameDetail::class,'id');
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
