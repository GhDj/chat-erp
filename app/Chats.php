<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model  {


/*    public function scopeuser1($query, $id, $id2)
    {
        return $query->where('id_u1', '=', $id)->orwhere('id_u1', '=', $id2);
    }



    public function scopeuser2($query, $id, $id2)
    {
        return $query->where('id_u2', '=', $id)->orwhere('id_u2', '=', $id2);
    }
*/

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chats';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_u1', 'id_u2', 'message', 'u1_ty', 'u2_ty'];

}
