<?php namespace App;

    use Illuminate\Auth\Authenticatable;
    use Laravel\Lumen\Auth\Authorizable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

    class Users extends Model implements AuthenticatableContract, AuthorizableContract
    {
        use Authenticatable, Authorizable;
        
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['email', 'name', 'password', 'api_token'];

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = ['password', 'api_token', 'remember_token'];

        //Get the user's reviews
        public function reviews()
        {
            return $this->hasMany('App\Reviews', 'id_user');
        }
    }
