<?php namespace App;

    use Illuminate\Auth\Authenticatable;
    use Laravel\Lumen\Auth\Authorizable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
    use DB;

    class Restaurants extends Model implements AuthenticatableContract, AuthorizableContract
    {
      use Authenticatable, Authorizable;

      //variable to stpre the geo-spatial fields
      protected $geofields = array('location');
      
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = ['name', 'road_name', 'cuisine_type', 'opening_hour', 'closing_hour', 'avg_cost', 'location'];

      /**
       * The attributes excluded from the model's JSON form.
       *
       * @var array
       */
      protected $hidden = [];

 			//setter method to set the location from the Maps API
	    public function setLocationAttribute($value)
		    {
		      $this->attributes['location'] = DB::raw("POINT($value)");
		    }
	 
 			//getter method to get the location from the Maps API
	    public function getLocationAttribute($value)
		    {
		        $loc =  substr($value, 6);
		        $loc = preg_replace('/[ ,]+/', ',', $loc, 1);
		 
		        return substr($loc,0,-1);
		    }
	 		
      //function to cycle the geo-spatial fields and trasform it into text
	    public function newQuery($excludeDeleted = true)
		    {
	        $raw='';
	        foreach($this->geofields as $column)
		        {
		    	    $raw .= ' astext('.$column.') as '.$column.' ';
		        }
	 
	        return parent::newQuery($excludeDeleted)->addSelect('*',DB::raw($raw));
		    }

		  //function to format the writing of the distance using 'latitude' and 'longitude' points
			public function scopeDistance($query,$dist,$location)
		    {
	        return $query->whereRaw('st_distance(location,POINT('.$location.')) < '.$dist);			 
		    }		   
    }
