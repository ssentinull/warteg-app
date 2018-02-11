<?php namespace App;

    use Illuminate\Auth\Authenticatable;
    use Laravel\Lumen\Auth\Authorizable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

    class Menus extends Model implements AuthenticatableContract, AuthorizableContract
    {
        use Authenticatable, Authorizable;
        
        protected $table = 'Menus';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['id_res', 'name', 'type', 'price'];

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = [];
    }
