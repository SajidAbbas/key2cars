<?php

namespace App;
use DB;
use App\ConditionDetail;
use App\Images;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    public function images()
    {
        return $this->hasMany('Images'); 
    }
    
  private $col;
  private $id;
  
  
  
  public function getRelatedLinks($make_id,$model_id)
  {
       return $data=DB::table('vehicles')
      ->where([['vehicles.status','approved'],['vehicles.manufacture_id',$make_id],['vehicles.model_id',$model_id]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')         
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','model_versions.title as model_version')
      ->get();
  }
  
  public function getOwnerReviews($make_id,$model_id,$model_version_id)
  {
      return $data=DB::table('vehicles')
      ->where([['vehicles.status','approved'],['vehicles.manufacture_id',$make_id],['vehicles.model_id',$model_id],['vehicles.model_version_id',$model_version_id]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('users','users.id','=','vehicles.user_id')
      ->select('vehicles.reviews','users.name')
      ->get();
      
  }
 



    public function getFeaturedVehicles()
    { 
       return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0']])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','model_years.year as year','images.url as url')
      ->get();
    }

    public function getFeaturedCars()
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','model_years.year as year','images.url as url')
      ->get();

    }

    public function getFeaturedBikes()
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','model_years.year as year','images.url as url')
      ->get();

    }
    
    public function getFeaturedOthers($vehicle_type)
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0'],['vehicles.vehicle_type_id',$vehicle_type]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','model_years.year as year','images.url as url')
      ->get();

    }
    
    

    public function getallNewFeaturedBikes()
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','model_years.year as year','images.url as url')
      ->get();


    }


    public function getallNewFeaturedCars()
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','model_years.year as year','images.url as url')
       ->orderby('vehicles.updated_at','desc')
              ->get();


    }




    public function getFeaturedCarsPaginate()
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','false'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')        
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','engine_types.title as engine_type','transmissions.title as transmission','model_versions.title as model_version','cities.title as city','model_years.year as year','images.url as url')
      ->orderby('vehicles.updated_at','desc')
              ->paginate(20);
      

    }
    public function getAllOthers($vehicle_type)
    {
      return $data=DB::table('vehicles')
      ->where([['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0'],['vehicles.vehicle_type_id',$vehicle_type]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id') 
      ->join('images','images.post_id','=','vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->select('vehicles.*','brands.title as manufacture','models.title as model','transmissions.title as transmission','engine_types.title as engine_type','cities.title as city','model_years.year as year','images.url as url')
      ->orderby('vehicles.featured',1)
       ->orderby('vehicles.updated_at','desc')
      ->paginate(15);

    }
    
    public function getFeaturedBikesPaginate()
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','0'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
              
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','model_years.year as model_year','engine_types.title as engine_type','images.url as url')
       ->orderby('vehicles.updated_at','desc')
              ->paginate(20);

    }



    public function getVehicleDetails($id)
    {
      return $data=DB::table('vehicles')
      ->where('vehicles.id',$id)
      ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('colors','colors.id','=','vehicles.color_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
       ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')

      ->select('vehicles.*','vehicle_body_types.title as body_type','vehicle_types.title as vehicle_type','vehicle_types.id as vehicle_type_id','brands.title as manufacture','brands.id as manufacture_id','models.title as model','models.id as model_id','model_versions.title as model_version','model_versions.id as model_version_id','cities.title as city','cities.id as city_id','city_areas.title as city_area','city_areas.id as city_area_id','transmissions.title as transmission','transmissions.id as transmission_id','assemblies.title as assembly','assemblies.id as assembly_id','engine_types.title as engine','engine_types.id as engine_id','colors.title as color','colors.id as color_id','model_years.year as model_year','model_years.id as model_year_id','registration_cities.title as reg_city','registration_cities.id as reg_city_id')
      
              ->get();


    }
    
    public function getNewVehicleDetails($id)
    {
      return $data=DB::table('new_vehicles')
      ->where('new_vehicles.id',$id)
      ->join('vehicle_types','vehicle_types.id','=' , 'new_vehicles.vehicle_type')
      ->join('models','models.id','=','new_vehicles.model_id')
      ->join('manufactures','manufactures.id','=','models.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
       ->join('cities','cities.id' , '=' , 'new_vehicles.city')
    
      ->join('engine_types','engine_types.id','=','new_vehicles.engine_type')
      ->select('new_vehicles.*','vehicle_types.title as type','vehicle_types.id as type_id','brands.title as make','brands.id as make_id'  ,'models.title as model','models.id as model_id','engine_types.title as engine_type','engine_types.id as engine_type_id','cities.title as city','cities.id as city_id')
      ->get();


    }
    
    public function getOtherDetails($id)
    {
      return $data=DB::table('vehicles')
      ->where('vehicles.id',$id)
      ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
     
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
       ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')

      ->select('vehicles.*','vehicle_body_types.title as body_type','vehicle_types.title as vehicle_type','vehicle_types.id as vehicle_type_id','brands.title as manufacture','brands.id as manufacture_id','models.title as model','models.id as model_id','model_versions.title as model_version','model_versions.id as model_version_id','cities.title as city','cities.id as city_id','city_areas.title as city_area','city_areas.id as city_area_id','transmissions.title as transmission','transmissions.id as transmission_id','assemblies.title as assembly','assemblies.id as assembly_id','engine_types.title as engine','engine_types.id as engine_id','model_years.year as model_year','model_years.id as model_year_id','registration_cities.title as reg_city','registration_cities.id as reg_city_id')
      ->get();


    }


    public function getBikeDetails($id)
    {
      return $data=DB::table('vehicles')
      ->where('vehicles.id',$id)
      ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
     ->join('model_years','model_years.id','=','vehicles.model_year_id')
       ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')

      ->select('vehicles.*','vehicle_types.title as vehicle_type','vehicle_types.id as vehicle_type_id','brands.title as manufacture','brands.id as manufacture_id','models.title as model','models.id as model_id','cities.title as city','cities.id as city_id','city_areas.title as city_area','city_areas.id as city_area_id','engine_types.title as engine','engine_types.id as engine_id','model_years.year as model_year','registration_cities.title as reg_city','registration_cities.id as reg_city_id')
      ->get();


    }


    public function getAllImagesByPostId($id)
    {
      return DB::table('images')->where([['post_id',$id],['size','l']])->get();
    }
    
    public function get4ImagesByPostId($id)
    {
       
      return DB::table('images')->where([['post_id',$id],['size','l']])->orderby('id','asc')->limit(4)->get();
    }
    
    
    
     public function getAllImagesByPostIdNewVehicles($id)
    {
      return DB::table('new_vehicles_images')->where([['post_id',$id],['size','l']])->get();
    }


/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////SEARCH BY Any Filter//// USED CAR PAGE/////////////
    //////////////////////////////////////////////////////////////////////////

    

    public function searchVehiclesByGeneralFilter($col,$id)
    {
      return $data=DB::table('vehicles')
      ->where([[$col.'.id',$id],['vehicles.condition',"used"],['images.size','s'],['status','approved']])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city')
      ->orderby('vehicles.featured','desc')
              ->orderby('vehicles.updated_at','desc')
      ->paginate(35);
      
    }

    ////////////////////////////////////////////////////////////////
    /////////////////SEARCH BY ALL FILTERS//////////////////////////
    ////////////////////////////////////////////////////////////////

    

    public function searchFeaturedVehiclesByAllFilters(array $filters =[])
    {
      


       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=',$this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=',$this->id);
      }
      else if($this->col=="capacity_fr")
      {
        $query=$query->Where('vehicles.engine_capacity','>=',$this->id);
      }
      else if($this->col=="capacity_to")
      {
        $query=$query->Where('vehicles.engine_capacity','<=',$this->id);
      }
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
      else if($this->col=="sort_price")
     {
         
     }
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
        //$query=$query->orWhere($col . '.id', $id1);
     

    }
      
     
    }


    $query->where([['vehicles.featured',1],['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('colors','colors.id','=','vehicles.color_id')
       ->select('vehicles.*','brands.title as manufacture','engine_types.title as engine_type','transmissions.title as transmission','models.title as model','model_versions.title as model_version','cities.title as city','images.url','model_years.year as year')
      ->orderby('vehicles.updated_at','desc');
      //->groupby('vehicles.id');
    
    foreach ($filters as $col => $id)
    {
        if($col=="sort_price")
      {
          if($id=="0")
          {
              $query->orderBy('vehicles.price','asc');
          }
          else if($id==1)
          {
             $query->orderBy('vehicles.price','desc');
          }
      }
        
    }

       return $query->paginate(24);

    }

    public function searchCarsByAllFilters(array $filters =[])
    {
      


       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=',$this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=',$this->id);
      }
       else if($this->col=="year_fr")
      {
        $query=$query->Where('model_years.year','>=',$this->id);
      }
      else if($this->col=="year_to")
      {
        $query=$query->Where('model_years.year','<=',$this->id);
      }
      else if($this->col=="capacity_fr")
      {
        $query=$query->Where('vehicles.engine_capacity','>=',$this->id);
      }
      else if($this->col=="capacity_to")
      {
        $query=$query->Where('vehicles.engine_capacity','<=',$this->id);
      }
      
      else if($this->col=="condition")
      {
         $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
     
      else
      {
         $query= $query->where($this->col.'.id',$this->id);
      }
      
     
    }


    $query->where([['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('colors','colors.id','=','vehicles.color_id')
      ->select('vehicles.*','brands.title as manufacture','engine_types.title as engine_type','transmissions.title as transmission','models.title as model','model_versions.title as model_version','cities.title as city','images.url','model_years.year as year')
      ->orderBy('vehicles.featured',1)
      ->orderBy('vehicles.updated_at','desc');

       return $query->paginate(2);

    }
    
    public function updateCarsByAllFilters(array $filters =[])
    {
       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=',$this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=',$this->id);
      }
      else if($this->col=="year_fr")
      {
        $query=$query->Where('model_years.year','>=',$this->id);
      }
      else if($this->col=="year_to")
      {
        $query=$query->Where('model_years.year','<=',$this->id);
      }
      else if($this->col=="capacity_fr")
      {
        $query=$query->Where('vehicles.engine_capacity','>=',$this->id);
      }
      else if($this->col=="capacity_to")
      {
        $query=$query->Where('vehicles.engine_capacity','<=',$this->id);
      }
      else if($this->col=="name")
      {
          
          $query=$query->Where('brands.title','LIKE','%'.$this->id.'%');
        
      }
      
      else if($this->col=="condition")
      {
         $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
     else if($this->col=="sort_price")
     {
         
     }
        
          
      
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
       
     

    }
      
     
    }


    $query->where([['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('colors','colors.id','=','vehicles.color_id')
      ->select('vehicles.*','brands.title as manufacture','engine_types.title as engine_type','transmissions.title as transmission','models.title as model','model_versions.title as model_version','cities.title as city','images.url','model_years.year as year')
      ->orderby('vehicles.updated_at','desc');
      
//->groupby('vehicles.id');

    
    foreach ($filters as $col => $id)
    {
        if($col=="sort_price")
      {
          if($id=="0")
          {
              $query->orderBy('vehicles.price','asc');
          }
          else if($id==1)
          {
             $query->orderBy('vehicles.price','desc');
          }
      }
        
    }
    
       return $query->paginate(1)->setPath(url()->previous());

    }
    
     public function searchFeaturedCarsByAllFilters(array $filters =[])
    {
      

       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=',$this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=',$this->id);
      }
      else if($this->col=="capacity_fr")
      {
        $query=$query->Where('vehicles.engine_capacity','>=',$this->id);
      }
      else if($this->col=="capacity_to")
      {
        $query=$query->Where('vehicles.engine_capacity','<=',$this->id);
      }
      
      else if($this->col=="condition")
      {
         $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query=$query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
     
      
      else
      {
        
           $query= $query->Where($this->col. '.id', $this->id);
         
    }
      
     
    }


    $query->where([['vehicles.featured',1],['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('colors','colors.id','=','vehicles.color_id')
      ->select('vehicles.*','brands.title as manufacture','engine_types.title as engine_type','transmissions.title as transmission','models.title as model','model_versions.title as model_version','cities.title as city','images.url','model_years.year as year')
      ->orderBy('vehicles.featured',1)
      ->orderBy('vehicles.updated_at','desc');
      
     
    
       return $query->paginate(24);
    }
    
     public function updateFeaturedCarsByAllFilters(array $filters =[])
    {
      

       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=',$this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=',$this->id);
      }
      else if($this->col=="year_fr")
      {
        $query=$query->Where('model_years.year','>=',$this->id);
      }
      else if($this->col=="year_to")
      {
        $query=$query->Where('model_years.year','<=',$this->id);
      }
      else if($this->col=="capacity_fr")
      {
        $query=$query->Where('vehicles.engine_capacity','>=',$this->id);
      }
      else if($this->col=="capacity_to")
      {
        $query=$query->Where('vehicles.engine_capacity','<=',$this->id);
      }
      else if($this->col=="name")
      {
          
          $query=$query->Where('brands.title','LIKE','%'.$this->id.'%');
        
      }
      
      else if($this->col=="condition")
      {
         $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
     else if($this->col=="sort_price")
     {
         
     }
        
          
      
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
       
     

    }
      
     
    }


    $query->where([['vehicles.featured',1],['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('colors','colors.id','=','vehicles.color_id')
      ->select('vehicles.*','brands.title as manufacture','engine_types.title as engine_type','transmissions.title as transmission','models.title as model','model_versions.title as model_version','cities.title as city','images.url','model_years.year as year')
      ->orderby('vehicles.updated_at','desc');
      
      //->groupby('vehicles.id');

    
    foreach ($filters as $col => $id)
    {
        if($col=="sort_price")
      {
          if($id=="0")
          {
              $query->orderBy('vehicles.price','asc');
          }
          else if($id==1)
          {
             $query->orderBy('vehicles.price','desc');
          }
      }
        
    }
    
       return $query->paginate(24);
    }
    
    public function searchBikesByAllFilters(array $filters =[])
    {
      
       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
     
      
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query=$query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
      
          
      else
      {
        
            $query=$query->Where($this->col. '.id', $this->id);
          
     

    }
      
     
    }


    $query->where([['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','images.url','model_years.year as model_year','engine_types.title as engine_type')
      ->orderBy('vehicles.featured',1)
      ->orderBy('vehicles.updated_at','desc');
     
    

       return $query->paginate(24);

    }
    
   
    
    public function updateBikesByAllFilters(array $filters =[])
    {
      
       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
         else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=', $this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=', $this->id);
      }
      else if($this->col=="year_fr")
      {
        $query=$query->Where('model_years.year','>=', $this->id);
      }
      else if($this->col=="year_to")
      {
        $query=$query->Where('model_years.year','<=', $this->id);
      }
        else if($this->col=="name")
      {
          
          $query=$query->Where('brands.title','LIKE','%'.$this->id.'%');
        
      }
     
      
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
      
      else if($this->col=="sort_price")
      {
          
      }
          
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
        //$query=$query->orWhere($col . '.id', $id1);
     

    }
      
     
    }


    $query->where([['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','images.url','model_years.year as model_year','engine_types.title as engine_type')
             ->orderby('vehicles.updated_at','desc');
     
    foreach ($filters as $col => $id)
    {
        if($col=="sort_price")
      {
          if($id=="0")
          {
              $query->orderBy('vehicles.price','asc');
          }
          else if($id==1)
          {
             $query->orderBy('vehicles.price','desc');
          }
      }
        
    }
      //->groupby('vehicles.id');

       return $query->paginate(24);

    }
    
    
    public function searchOtherByAllFilters(array $filters =[],$vehcile_id)
    {
      


       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=',$this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=',$this->id);
      }
      else if($this->col=="capacity_fr")
      {
        $query=$query->Where('vehicles.engine_capacity','>=',$this->id);
      }
      else if($this->col=="capacity_to")
      {
        $query=$query->Where('vehicles.engine_capacity','<=',$this->id);
      }
      else if($this->col=="year_fr")
      {
        $query=$query->Where('model_years.year','>=', $this->id);
      }
      else if($this->col=="year_to")
      {
        $query=$query->Where('model_years.year','<=', $this->id);
      }
      else if($this->col=="name")
      {
          
          $query=$query->Where('brands.title','LIKE','%'.$this->id.'%');
        
      }
      
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
        //$query=$query->orWhere($col . '.id', $id1);
     

    }
      
     
    }


    $query->where([['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',$vehcile_id]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','model_years.year as year','engine_types.title as engine_type','transmissions.title as transmission')
      ->orderby('vehicles.featured',1)
      ->orderby('vehicles.updated_at','desc');
      //->groupby('vehicles.id');

       return $query->paginate(15);

    }
    
    
    public function searchCarsByHomeFilters(array $filters =[])
    {
        
        
        //dd($filters);
       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
        
        if($this->col=="condition")
        {
            $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
             if($id1=="any")
              {
                  break;
              }
            $query->orwhere('vehicles.condition', $id1);
          }
            });
            
            
            
        }
      else if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="cities")
      {
        $query=$query->Where('cities.id',$this->id);
      }
      else if($this->col=="brands")
      {
        $query=$query->Where('brands.id',$this->id);
      }
      else if($this->col=="models")
      {
        $query=$query->Where('models.id',$this->id);
      }
     
     
            
          
       }


    $query->where([['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('colors','colors.id','=','vehicles.color_id')
      ->select('vehicles.*','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','model_years.year as year','engine_types.title as engine_type','transmissions.title as transmission')
      ->orderby('vehicles.featured',1)
      ->orderby('vehicles.updated_at','desc');
      //->groupby('vehicles.id');

       return $query->paginate(1)
               ->setPath(url()->current());

        
    }

    public function searchFeaturedBikesByAllFilters(array $filters =[])
    {
     

       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
         else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=', $this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=', $this->id);
      }
      else if($this->col=="year_fr")
      {
        $query=$query->Where('model_years.year','>=', $this->id);
      }
      else if($this->col=="year_to")
      {
        $query=$query->Where('model_years.year','<=', $this->id);
      }
     
      
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query=$query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
      
      else
      {
            $query=$query->Where($this->col. '.id', $this->id);
         
    }
      
     
    }


    $query->where([['vehicles.featured',1],['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','images.url','model_years.year as model_year','engine_types.title as engine_type')
      
      ->orderBy('vehicles.updated_at','desc');
    

       return $query->paginate(24);


    }
    
    public function updateFeaturedBikesByAllFilters(array $filters =[])
    {
     

       $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('vehicles.price','<=', $this->id);
      }
       else if($this->col=="mileage_fr")
      {
        $query=$query->Where('vehicles.mileage','>=', $this->id);
      }
      else if($this->col=="mileage_to")
      {
        $query=$query->Where('vehicles.mileage','<=', $this->id);
      }
      else if($this->col=="year_fr")
      {
        $query=$query->Where('model_years.year','>=', $this->id);
      }
      else if($this->col=="year_to")
      {
        $query=$query->Where('model_years.year','<=', $this->id);
      }
        else if($this->col=="name")
      {
          
          $query=$query->Where('brands.title','LIKE','%'.$this->id.'%');
        
      }
      
     
      
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('vehicles.condition', $id1);
          }
            });
          
      }
      
      else if($this->col=="sort_price")
      {
          
      }
          
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
        //$query=$query->orWhere($col . '.id', $id1);
     

    }
      
     
    }


    $query->where([['vehicles.featured',1],['vehicles.isDeleted','false'],['images.size','s'],['status','approved'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('city_areas','city_areas.id','=','vehicles.city_area_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','brands.title as manufacture','models.title as model','cities.title as city','images.url','model_years.year as model_year','engine_types.title as engine_type')
      ->orderby('vehicles.updated_at','desc');
     
    foreach ($filters as $col => $id)
    {
        if($col=="sort_price")
      {
          if($id=="0")
          {
              $query->orderBy('vehicles.price','asc');
          }
          else if($id==1)
          {
             $query->orderBy('vehicles.price','desc');
          }
      }
        
    }
      //->groupby('vehicles.id');

       return $query->paginate(24);


    }

    


    public function getAllCarsByCity($id)
    {
      return $data=DB::table('vehicles')
      ->where([['cities.id',$id],['images.size','s'],['vehicles.vehicle_type_id',\App\VehicleType::Car],['status','approved'],['vehicles.isDeleted','false']])
       
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
     
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      
          

      ->select('vehicles.*','engine_types.title as engine_type','transmissions.title as transmission','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url as url','model_years.year as year')
      
     ->latest('vehicles.updated_at')
      ->orderby('vehicles.featured','desc')
               
      ->paginate(20);
      

    }

    public function getAllFeaturedCarsByCity($id)
    {
      return $data=DB::table('vehicles')
      ->where([['cities.id',$id],['images.size','s'],['vehicles.vehicle_type_id',\App\VehicleType::Car],['status','approved'],['vehicles.isDeleted','false'],['vehicles.featured',1]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_versions.title as model_version','model_years.year as year','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city','engine_types.title as engine_type')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(35);
      

    }
    
    public function getAllFeaturedCarsByManufacture($id)
    {
      return $data=DB::table('vehicles')
      ->where([['brands.id',$id],['images.size','s'],['vehicles.vehicle_type_id',\App\VehicleType::Car],['status','approved'],['vehicles.isDeleted','false'],['vehicles.featured',1]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_versions.title as model_version','model_years.year as year','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city','engine_types.title as engine_type')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(35);
      

    }
    
     public function getAllFeaturedBikesByCity($id)
    {
      return $data=DB::table('vehicles')
      ->where([['cities.id',$id],['images.size','s'],['vehicles.vehicle_type_id',\App\VehicleType::Bike],['status','approved'],['vehicles.isDeleted','false'],['vehicles.featured',1]])
        ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','cities.title as city','images.url as url','registration_cities.title as reg_city','model_years.year as year')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(15);
      

    }
    
    public function getAllFeaturedBikesByManufacture($id)
    {
      return $data=DB::table('vehicles')
      ->where([['brands.id',$id],['images.size','s'],['vehicles.vehicle_type_id',\App\VehicleType::Bike],['status','approved'],['vehicles.isDeleted','false'],['vehicles.featured',1]])
        ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','cities.title as city','images.url as url','registration_cities.title as reg_city','model_years.year as year')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(15);
      

    }


/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////SEARCH BY BODY TYPE//// USED CAR PAGE/////////////
    //////////////////////////////////////////////////////////////////////////

    public function getAllCarsByBodyType($id)
    {
      return $data=DB::table('vehicles')
      ->where([['vehicle_body_types.id',$id],['vehicles.vehicle_type_id',\App\VehicleType::Car],['images.size','s'],['status','approved'],['vehicles.isDeleted','false']])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')        
      

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','engine_types.title as engine_type','transmissions.title as transmission','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','vehicle_body_types.title as body_type','registration_cities.title as reg_city','model_years.year as year')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(15);
      

    }
    
  

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////SEARCH BY MODEL//// USED CAR PAGE/////////////
    //////////////////////////////////////////////////////////////////////////
    public function getAllCarsByModel($id)
    {
      return $data=DB::table('vehicles')
      ->where([['models.id',$id],['images.size','s'],['vehicles.isDeleted','false'],['status','approved'],['vehicles.vehilce_type_id',\App\VehicleType::Car]])
        ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(4);
      
    }

     public function getAllCarsByUserId($id)
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.user_id',$id],['images.size','s'],['vehicles.vehicle_type_id',\App\VehicleType::Car],['status','approved'],['vehicles.isDeleted','false']])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_versions.title as model_version','model_years.year as year','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city','engine_types.title as engine_type')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(20);
      

    }
    
    public function getAllBikesByUserId($id)
    {
      return $data=DB::table('vehicles')
      ->where([['vehicles.user_id',$id],['images.size','s'],['vehicles.vehicle_type_id',\App\VehicleType::Bike],['status','approved'],['vehicles.isDeleted','false']])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
     
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_years.year as year','cities.title as city','images.url','registration_cities.title as reg_city','engine_types.title as engine_type')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(20);
      

    }
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////SEARCH BY MAKE//// USED CAR PAGE/////////////
    //////////////////////////////////////////////////////////////////////////

    public function getAllUsedCarsByMake($id)
    {
      return $data=DB::table('vehicles')
      ->where([['brands.id',$id],['vehicles.condition',"used"],['images.size','s'],['status','approved']])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(35);
      
    }

    public function getAllBikesByManufacture($id)
    {
      return $data=DB::table('vehicles')
      ->where([['brands.id',$id],['images.size','s'],['status','approved'],['vehicles.isDeleted','false'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','cities.title as city','images.url as url','engine_types.title as engine_type','registration_cities.title as reg_city','model_years.year as model_year')
      ->orderby('vehicles.featured','desc')
      ->paginate(15);
      
    }

    public function getAllBikesByCity($id)
    {
      return $data=DB::table('vehicles')
      ->where([['cities.id',$id],['images.size','s'],['status','approved'],['vehicles.isDeleted','false'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->select('vehicles.*','engine_types.title as engine_type','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','cities.title as city','images.url as url','registration_cities.title as reg_city','model_years.year as model_year')
      ->orderby('vehicles.featured','desc')
      ->paginate(15);
      
    }

     public function getAllBikesByModel($id)
    {
      return $data=DB::table('vehicles')
      ->where([['models.id',$id],['images.size','s'],['status','approved'],['vehicles.isDeleted','false'],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
     
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','cities.title as city','images.url as url','registration_cities.title as reg_city','model_years.year as model_year','engine_types.title as engine_type')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(15);
      
    }

    public function getAllUsedFeaturedCarsByMake($id)
    {
      return $data=DB::table('vehicles')
      ->where([['brands.id',$id],['vehicles.condition',"used"],['images.size','s'],['status','approved'],['vehicles.featured',1]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(35);
      
    }

    
     public function getRelatedCarsByModel($ad_id,$model_id)
    {
      return $data=DB::table('vehicles')
      ->where([['models.id',$model_id],['vehicles.vehicle_type_id',\App\VehicleType::Car],['vehicles.id','!=',$ad_id],['images.size','s'],['vehicles.isDeleted','false'],['status','approved']])
        ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
     ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','model_years.year as year','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->limit(8)
      ->get();
      
    }
    
    public function getRelatedOtherByModel($ad_id,$model_id,$vehicle_id)
    {
      return $data=DB::table('vehicles')
      ->where([['models.id',$model_id],['vehicles.vehicle_type_id',$vehicle_id],['vehicles.id','!=',$ad_id],['images.size','s'],['vehicles.isDeleted','false'],['status','approved']])
        ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
     ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')

      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','model_years.year as year','brands.title as manufacture','models.title as model','model_versions.title as model_version','cities.title as city','images.url','transmissions.title as transmission','assemblies.title as assembly','vehicle_body_types.title as body_type','registration_cities.title as reg_city')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(4);
      
    }
    
   
    public function getRelatedBikesByModel($ad_id,$model_id)
    {
      return $data=DB::table('vehicles')
      ->where([['models.id',$model_id],['vehicles.id','!=',$ad_id],['vehicles.vehicle_type_id',\App\VehicleType::Bike],['images.size','s'],['vehicles.isDeleted','false'],['status','approved']])
        ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
      ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
              
      ->select('vehicles.*','vehicle_types.title as vehicle_type','model_years.year as year','brands.title as manufacture','models.title as model','cities.title as city','images.url','registration_cities.title as reg_city')
      ->orderby('vehicles.featured','desc')
               ->orderby('vehicles.updated_at','desc')
      ->paginate(4);
      
    }





///////admin panel///////////////////
    public function getAllVehiclesByCity($id)
    {
       return $data=DB::table('vehicles')
         ->where([['images.size','=','s'],['vehicles.city_id',$id],['status','=',"approve"]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
     // ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
    
   
      ->select('vehicles.*','vehicle_types.title as vehicle_type','models.title as model','model_versions.title as model_version','cities.title as city','images.url as url','transmissions.title as transmission','assemblies.title as assembly')
       ->orderby('vehicles.updated_at','desc')
       ->paginate(10);

      

    }

    public function getAllVehiclesByModel($id)
    {
       return $data=DB::table('vehicles')
         ->where([['images.size','=','s'],['vehicles.model_id',$id],['status','=',"approve"]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
     // ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
    
   
      ->select('vehicles.*','vehicle_types.title as vehicle_type','models.title as model','model_versions.title as model_version','cities.title as city','images.url as url','transmissions.title as transmission','assemblies.title as assembly')
       ->orderby('vehicles.updated_at','desc')
               ->paginate(10);
    }

    public function getAllVehiclesByCity_Model($request)
    {
       return $data=DB::table('vehicles')
         ->where([['images.size','=','s'],['vehicles.city_id',$$request->city],['vehicles.model_id',$request->model],['status','=',"approve"]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
     // ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
      ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
    
   
      ->select('vehicles.*','vehicle_types.title as vehicle_type','models.title as model','model_versions.title as model_version','cities.title as city','images.url as url','transmissions.title as transmission','assemblies.title as assembly')
       ->orderby('vehicles.updated_at','desc')
               ->paginate(10);

      

    }



    public function getAllVehicles()
    {
      return $data=DB::table('vehicles')
   ->where([['images.size','=','s']])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
              ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
     // ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      
     
   
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','vehicle_types.id as vehicle_id','models.title as model','cities.title as city','images.url as url')
       ->orderby('vehicles.updated_at','desc')
              ->paginate(10);

    }
    
    public function getAllVehiclesByUser($id)
    {
      return $data=DB::table('vehicles')
   ->where([['images.size','=','s'],['vehicles.user_id',$id]])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
               ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
     // ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      
     
   
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','vehicle_types.id as vehicle_id','models.title as model','cities.title as city','images.url as url')
       ->orderby('vehicles.updated_at','desc')
              ->paginate(10);

    }
    
    public function getAllClientAds($id,$status)
    {
      return $data=DB::table('vehicles')
   ->where([['images.size','=','s'],['vehicles.user_id',$id],['vehicles.status',$status]])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
              
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
              ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
     // ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      
     
   
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','vehicle_types.id as vehicle_id','models.title as model','cities.title as city','images.url as url')
       ->orderby('vehicles.updated_at','desc')
              ->paginate(10);

    }
    
    public function  getAllDeletedVehiclesByUser($id)
    {
      return $data=DB::table('vehicles')
   ->where([['images.size','=','s'],['vehicles.user_id',$id],['vehicles.isDeleted',1]])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
               ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
     // ->join('model_versions','model_versions.id','=','vehicles.model_version_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      
     
   
      ->select('vehicles.*','vehicle_types.title as vehicle_type','brands.title as manufacture','vehicle_types.id as vehicle_id','models.title as model','cities.title as city','images.url as url')
       ->orderby('vehicles.updated_at','desc')
              ->paginate(10);

    }
   
     


    public function getAllPendingRequest()
    {
      return $data=DB::table('vehicles')
      ->where('images.size','=','s')
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('images','images.post_id' , '=' , 'vehicles.id')
      ->select('vehicles.*','vehicle_types.title as vehicle_type','vehicle_types.id as vehicle_id','models.title as model','cities.title as city','images.url as url')
      ->orderby('vehicles.updated_at', 'desc')
      ->paginate(10);


    }

    public function addVehicle($request,$code)
    {
        date_default_timezone_set("Asia/Karachi");
       $make = DB::table('manufactures')->where([['brand_id',$request->make],['vehicle_type_id', VehicleType::Car]])->first();
       //dd($make);
       $user_id=null;
       $data=DB::table('users')->where('number',$request->number)->first();
       if($data){
       $user_id=$data->id;
       }
       $condition=null;
       if($request->mileage<1000)
       {$condition= VehicleType::New_Vehicle;
       }
       else if($request->mileage<10000)
       {$condition= VehicleType::Almost_New_Vehicle;
       }
       else 
       {$condition= VehicleType::Used_Vehicle;
       }
       
     
       
      $id= DB::table('vehicles')->insertGetId(['user_id'=>$user_id,'vehicle_type_id'=>\App\VehicleType::Car,'reviews'=>$request->review,'email'=>$request->email,'manufacture_id'=>$make->id,'model_id'=>$request->model,'model_version_id'=>$request->model_version,'city_id'=>$request->city,'city_area_id'=>$request->city_area,'price'=>$request->price,'description'=>$request->description,'transmission_id'=>$request->transmission,'assembly_id'=>$request->assembly,'reg_city_id'=>$request->reg_city,'engine_type_id'=>$request->engine_type,'color_id'=>$request->color,'condition'=>$condition,'engine_capacity'=>$request->engine_capacity,'mileage'=>$request->mileage,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'featured'=>0,'seller_name'=>$request->name,'number'=>$request->number,'model_year_id'=>$request->year,'status'=>"pending",'verification_code'=>$code,'isVerified'=>0]);

   
      ///////////////////////////////////////////Conditional Detail//////////////////
      $data=ConditionDetail::all();
      $data=json_decode($data);
     
      foreach($data as $d)
      {
        if($request->get($d->title))
        {
          DB::table('vehicle_conditions')->insert(['ads_id'=>$id,'condition_detail_id'=>$d->id,'condition_detail_value_id'=>$request->get($d->title),'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        }
      }
      //////////////////////////////////////////////////////////////////////////////////////
      
      
      /////////////////////////////////IMAGES/////////////////////////////////////
      $this->imageCompression($id);
      
     /////////////////////////////////////////////////////////////////////////////
      
      
      ////////////////////////////////////////FEATURES/////////////////////////
      
      foreach($request->feature as $feature_id)
      {

        DB::table('vehicle_feature_mapping')->insert(['post_id'=>$id,'feature_id'=>$feature_id]);
      }
      
       
    
      return $id;
      
    }
    
    
    public function addOther($request,$vehicle_id,$code)
    { 
        
        date_default_timezone_set("Asia/Karachi");
       $make = DB::table('manufactures')->where([['brand_id',$request->make],['vehicle_type_id',$vehicle_id]])->first();
       //dd($make);
       
       $user_id=null;
        $data=DB::table('users')->where('number',$request->number)->first();
        if($data){
       $user_id=$data->id;
        }       
       $condition=null;
       if($request->mileage<1000)
       {$condition= VehicleType::New_Vehicle;
       }
       else if($request->mileage<10000)
       {$condition= VehicleType::Almost_New_Vehicle;
       }
       else 
       {$condition= VehicleType::Used_Vehicle;
       }

      $id= DB::table('vehicles')->insertGetId(['user_id'=>$user_id,'vehicle_type_id'=>$vehicle_id,'seat'=>$request->seat,'reviews'=>$request->review,'email'=>$request->email,'manufacture_id'=>$make->id,'model_id'=>$request->model,'model_version_id'=>$request->model_version,'city_id'=>$request->city,'city_area_id'=>$request->city_area,'price'=>$request->price,'description'=>$request->description,'transmission_id'=>$request->transmission,'assembly_id'=>$request->assembly,'reg_city_id'=>$request->reg_city,'engine_type_id'=>$request->engine_type,'color_id'=>$request->color,'condition'=>$condition,'engine_capacity'=>$request->engine_capacity,'mileage'=>$request->mileage,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'featured'=>0,'seller_name'=>$request->name,'number'=>$request->number,'model_year_id'=>$request->year,'status'=>"pending",'verification_code'=>$code,'isVerified'=>0]);

     

      $this->imageCompression($id);
      if($request->feature){
      foreach($request->feature as $feature_id)
      {

        DB::table('vehicle_feature_mapping')->insert(['post_id'=>$id,'feature_id'=>$feature_id]);
      }
      }
      
       return $id;


    }

    public function addBike($request,$code)
    {
        date_default_timezone_set("Asia/Karachi");
       $make = DB::table('manufactures')->where([['brand_id',$request->make],['vehicle_type_id',2]])->first();
       //dd($make);
       $data=DB::table('users')->where('number',$request->number)->first();
       $user_id=$data->id;
       $condition=null;
       if($request->mileage<1000)
       {$condition= VehicleType::New_Vehicle;
       }
       else if($request->mileage<10000)
       {$condition= VehicleType::Almost_New_Vehicle;
       }
       else 
       {$condition= VehicleType::Used_Vehicle;
       }

      $id= DB::table('vehicles')->insertGetId(['user_id'=>$user_id,'vehicle_type_id'=>\App\VehicleType::Bike,'manufacture_id'=>$make->id,'model_id'=>$request->model,'city_id'=>$request->city,'city_area_id'=>$request->city_area,'price'=>$request->price,'description'=>$request->description,'reg_city_id'=>$request->reg_city,'engine_type_id'=>$request->engine_type,'condition'=>$condition,'mileage'=>$request->mileage,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'featured'=>0,'seller_name'=>$request->name,'number'=>$request->number,'model_year_id'=>$request->year,'status'=>"pending",'verification_code'=>$code,'isVerified'=>0]);

      $this->imageCompression($id);
      foreach($request->feature as $feature_id)
      {

        DB::table('vehicle_feature_mapping')->insert(['post_id'=>$id,'feature_id'=>$feature_id]);
      }
      
       return $id;



    }
    
    public function addNewVehicle($request)
    {
       

      $id= DB::table('new_vehicles')->insertGetId(['vehicle_type'=>$request->type,'status'=>1,'title'=>$request->title,'short_description'=>$request->short_description,'description'=>$request->description,'specification'=>$request->specification,'features'=>$request->features,'colors'=>$request->colors,'brand_id'=>$request->make,'model_id'=>$request->model,'engine_type'=>$request->engine_type,'engine_capacity'=>$request->engine_capacity,'mileage'=>$request->mileage,'price'=>$request->price,'city'=>$request->city]);
      $this->imageCompressionNewVehicle($id);
    }


    public function imageCompression($id)
    {
     
     $img_id=DB::table('images')->insertGetId(['post_id'=>$id,'size'=>"s",'url'=>'/vehicle/default.png']);   
////// add Thumbnail/////////////////////////////
      $post_photo=$_FILES['file']['name'];
      $post_photo_tmp=$_FILES['file']['tmp_name'];
      
    
      
      $ext=pathinfo($post_photo, PATHINFO_EXTENSION);///getting extention
      if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
      {
        if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
        {
          $src=imagecreatefromjpeg($post_photo_tmp);
        }
        if($ext=='png' || $ext=='PNG')
        {
          $src=imagecreatefrompng($post_photo_tmp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
          $src=imagecreatefromgif($post_photo_tmp);
        }

        list($width_min,$height_min)=getimagesize($post_photo_tmp);
        $newwidth_min=290;///set compressing image width
        $newheight_min=184;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/vehicle/').($id."-s").".".$ext,100);////copy image
            $path="/vehicle/".($id."-s").".".$ext;

            DB::table('images')->where('id',$img_id)->update(['url'=>$path]);

            list($width_min,$height_min)=getimagesize($post_photo_tmp);
        $newwidth_min=700;///set compressing image width
        $newheight_min=430;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/vehicle/').($id).".".$ext,100);////copy image
            $path="/vehicle/".($id).".".$ext;

             DB::table('images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
      }


 ///////////////////////////////////////////////////////////////////////////////////////
 //Add other pics



            $post_photo=$_FILES['img']['name'];
            $post_photo_tmp=$_FILES['img']['tmp_name'];
            $photo_array=$_FILES['img']['size'];
            for($i=0;$i<count($photo_array);$i++)
            {
            $ext=pathinfo($post_photo[$i], PATHINFO_EXTENSION);///getting extention
            if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
            {
              if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
              {
                $src=imagecreatefromjpeg($post_photo_tmp[$i]);
              }
              if($ext=='png' || $ext=='PNG')
              {
                $src=imagecreatefrompng($post_photo_tmp[$i]);
              }
              if($ext=='gif' || $ext=='GIF')
              {

                $src=imagecreatefromgif($post_photo_tmp[$i]);
              }
              list($width_min,$height_min)=getimagesize($post_photo_tmp[$i]);
              $newwidth_min=700;///set compressing image width
              $newheight_min=430;//($height_min/$width_min)*$newwidth_min;///equation for set image height
              $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
              imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress
              imagejpeg($tmp_min,public_path('images/vehicle/').($id.'-'.$i).".".$ext,100);////copy image
              $path="/vehicle/".($id.'-'.$i).".".$ext;
              DB::table('images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
            }
          }     
      
    }
    
    public function imageCompressionNewVehicle($id)
    {
     
     $img_id=DB::table('new_vehicles_images')->insertGetId(['post_id'=>$id,'size'=>"s",'url'=>'/newvehicle/default.png']);   
////// add Thumbnail/////////////////////////////
      $post_photo=$_FILES['file']['name'];
      $post_photo_tmp=$_FILES['file']['tmp_name'];
      
    
      
      $ext=pathinfo($post_photo, PATHINFO_EXTENSION);///getting extention
      if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
      {
        if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
        {
          $src=imagecreatefromjpeg($post_photo_tmp);
        }
        if($ext=='png' || $ext=='PNG')
        {
          $src=imagecreatefrompng($post_photo_tmp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
          $src=imagecreatefromgif($post_photo_tmp);
        }

        list($width_min,$height_min)=getimagesize($post_photo_tmp);
        $newwidth_min=290;///set compressing image width
        $newheight_min=184;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/newvehicle/').($id."-s").".".$ext,100);////copy image
            $path="/newvehicle/".($id."-s").".".$ext;

            DB::table('new_vehicles_images')->where('id',$img_id)->update(['url'=>$path]);

            list($width_min,$height_min)=getimagesize($post_photo_tmp);
        $newwidth_min=700;///set compressing image width
        $newheight_min=430;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/newvehicle/').($id).".".$ext,100);////copy image
            $path="/newvehicle/".($id).".".$ext;

             DB::table('new_vehicles_images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
      }


 ///////////////////////////////////////////////////////////////////////////////////////
 //Add other pics



            $post_photo=$_FILES['img']['name'];
            $post_photo_tmp=$_FILES['img']['tmp_name'];
            $photo_array=$_FILES['img']['size'];
            for($i=0;$i<count($photo_array);$i++)
            {
            $ext=pathinfo($post_photo[$i], PATHINFO_EXTENSION);///getting extention
            if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
            {
              if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
              {
                $src=imagecreatefromjpeg($post_photo_tmp[$i]);
              }
              if($ext=='png' || $ext=='PNG')
              {
                $src=imagecreatefrompng($post_photo_tmp[$i]);
              }
              if($ext=='gif' || $ext=='GIF')
              {

                $src=imagecreatefromgif($post_photo_tmp[$i]);
              }
              list($width_min,$height_min)=getimagesize($post_photo_tmp[$i]);
              $newwidth_min=700;///set compressing image width
              $newheight_min=430;//($height_min/$width_min)*$newwidth_min;///equation for set image height
              $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
              imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress
              imagejpeg($tmp_min,public_path('images/newvehicle/').($id.'-'.$i).".".$ext,100);////copy image
              $path="/newvehicle/".($id.'-'.$i).".".$ext;
              DB::table('new_vehicles_images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
            }
          }     
      
    }


    ////////delete Record///////////////
    public function deleteVehicle($ids)
    {
        foreach($ids as $id)
        {
             $data=DB::table('vehicles')->where('id', $id)->update(['isDeleted'=>'1']);
        }
        return $data;
    }

    public function updateVehicle($request)
    {
        date_default_timezone_set("Asia/Karachi");
         $make = DB::table('manufactures')->where([['brand_id',$request->make],['vehicle_type_id',\App\VehicleType::Car]])->first();



      DB::table('vehicles')->where('id',$request->id)->update(['vehicle_type_id'=>$request->type,'manufacture_id'=>$make->id,'model_id'=>$request->model,'model_version_id'=>$request->model_version,'city_id'=>$request->city,'city_area_id'=>$request->city_area,'price'=>$request->price,'description'=>$request->description,'transmission_id'=>$request->transmission,'assembly_id'=>$request->assembly,'reg_city_id'=>$request->reg_city,'engine_type_id'=>$request->engine_type,'color_id'=>$request->color,'engine_capacity'=>$request->engine_capacity,'mileage'=>$request->mileage,'updated_at' => date('Y-m-d H:i:s'),'featured'=>0,'seller_name'=>$request->name,'number'=>$request->number,'model_year_id'=>$request->year]);


      DB::table('vehicle_conditions')->where('ads_id',$request->id)->delete();


      $data=ConditionDetail::all();
      $data=json_decode($data);
     
      foreach($data as $d)
      {
        if($request->get($d->title))
        {
          DB::table('vehicle_conditions')->insert(['ads_id'=>$id,'condition_detail_id'=>$d->id,'condition_detail_value_id'=>$request->get($d->title),'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
        }
      }


     // $this->imageCompression($request->id);
      if($request->feature)
      {
        DB::table('vehicle_feature_mapping')->where('post_id',$request->id)->delete();
      }

      foreach($request->feature as $feature_id)
      {
        DB::table('vehicle_feature_mapping')->insert(['post_id'=>$request->id,'feature_id'=>$feature_id]);
      }



    }
    
    public function updateOther($request)
    {
        date_default_timezone_set("Asia/Karachi");
         $make = DB::table('manufactures')->where([['brand_id',$request->make],['vehicle_type_id',$request->vehicle_id]])->first();



      DB::table('vehicles')->where('id',$request->id)->update(['seat'=>$request->seat,'vehicle_type_id'=>$request->vehicle_id,'manufacture_id'=>$make->id,'model_id'=>$request->model,'model_version_id'=>$request->model_version,'city_id'=>$request->city,'city_area_id'=>$request->city_area,'price'=>$request->price,'description'=>$request->description,'transmission_id'=>$request->transmission,'assembly_id'=>$request->assembly,'reg_city_id'=>$request->reg_city,'engine_type_id'=>$request->engine_type,'color_id'=>$request->color,'engine_capacity'=>$request->engine_capacity,'mileage'=>$request->mileage,'updated_at' => date('Y-m-d H:i:s'),'seller_name'=>$request->name,'number'=>$request->number,'model_year_id'=>$request->year]);


      

     // $this->imageCompression($request->id);
      if($request->feature)
      {
        DB::table('vehicle_feature_mapping')->where('post_id',$request->id)->delete();
      }

      foreach($request->feature as $feature_id)
      {
        DB::table('vehicle_feature_mapping')->insert(['post_id'=>$request->id,'feature_id'=>$feature_id]);
      }



    }

    public function updateBike($request)
    {
        date_default_timezone_set("Asia/Karachi");
     //dd($request);

        $make = DB::table('manufactures')->where([['brand_id',$request->make],['vehicle_type_id',\App\VehicleType::Bike]])->first();

        try{
        
      DB::table('vehicles')->where('id',$request->id)->update(['manufacture_id'=>$make->id,'model_id'=>$request->model,'city_id'=>$request->city,'city_area_id'=>$request->city_area,'price'=>$request->price,'description'=>$request->description,'reg_city_id'=>$request->reg_city,'engine_type_id'=>$request->engine_type,'mileage'=>$request->mileage,'seller_name'=>$request->name,'number'=>$request->number,'model_year_id'=>$request->year]);
     }catch(\Illuminate\Database\QueryException $ex){ 
        
        dd($ex->getMessage());
    }




      
     // $this->imageCompression($request->id);
      if($request->feature)
      {
        DB::table('vehicle_feature_mapping')->where('post_id',$request->id)->delete();
      }

      foreach($request->feature as $feature_id)
      {
        DB::table('vehicle_feature_mapping')->insert(['post_id'=>$request->id,'feature_id'=>$feature_id]);
      }



    }
    
    
    
     public function updateNewVehicle($request)
    {
         

      DB::table('new_vehicles')->where('id',$request->id)->update(['vehicle_type'=>$request->type,'status'=>$request->status,'title'=>$request->title,'short_description'=>$request->short_description,'description'=>$request->description,'specification'=>$request->specification,'features'=>$request->features,'colors'=>$request->colors,'brand_id'=>$request->make,'model_id'=>$request->model,'engine_type'=>$request->engine_type,'engine_capacity'=>$request->engine_capacity,'mileage'=>$request->mileage,'price'=>$request->price,'city'=>$request->city]);


      DB::table('new_vehicles_images')->where('post_id',$request->id)->delete();

    $this->imageCompressionNewVehicle($request->id);
     

    }



    public function updateRequest($request)
    {
         date_default_timezone_set("Asia/Karachi");
      return DB::table('vehicles')->where('id',$request->id)->update(['status'=>$request->value]);
    }

    public function featureVehicle($id)
    {
        $date= Carbon::now(new \DateTimeZone('Asia/Karachi'))->addDay(7);
      return DB::table('vehicles')->where('id',$id)->update(['featured'=>1,'featured_expiry_date'=>$date]);
    }


    public function updateSearchButton(array $filters=[])
    {
        $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('vehicles.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
      $query= $query->Where('vehicles.price','<=', $this->id);
      }
      else if($this->col=="condition")
        {
            $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
             if($id1== VehicleType::Any)
              {
                  break;
              }
            $query->orwhere('vehicles.condition', $id1);
          }
            });
            
            
            
        }
     
      else
      {
         $query= $query->Where($this->col. '.id', $this->id);
      }
    
    }
      
     
      $query->Where([['vehicles.isDeleted','false'],['vehicles.vehicle_type_id',\App\VehicleType::Car],['vehicles.status','approved']])
     
     ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
     ->join('brands','brands.id','=','manufactures.brand_id')
     ->join('cities','cities.id','=','vehicles.city_id')
     ->join('models','models.id','=','vehicles.model_id')        
     ->select((DB::raw('COUNT(vehicles.id) as size')));
            
     
      return $query->get();

    }


    
    
    
    
    
    
    
    
    
    public function getAllNewVehicles()
    {
        return DB::table('new_vehicles')
                ->where([['new_vehicles_images.size','=','s']])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'new_vehicles.vehicle_type')
     
      ->join('new_vehicles_images','new_vehicles_images.post_id' , '=' , 'new_vehicles.id')
      
     
   
      ->select('new_vehicles.*','vehicle_types.title as type','vehicle_types.id as vehicle_id','new_vehicles_images.url as url')
       
                ->paginate(10);
    }
    
    
     public function getNewVehiclesByType($type)
    {
        return DB::table('new_vehicles')
                ->where([['new_vehicles_images.size','=','s'],['new_vehicles.status',1],['new_vehicles.vehicle_type',$type]])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'new_vehicles.vehicle_type')
     
      ->join('new_vehicles_images','new_vehicles_images.post_id' , '=' , 'new_vehicles.id')
      
     
   
      ->select('new_vehicles.*','vehicle_types.title as type','vehicle_types.id as vehicle_id','new_vehicles_images.url as url')
       
                ->paginate(15);
    }
    
     public function getNewVehiclesByMakeAndModel($brand_id,$model_id,$type)
    {
        return DB::table('new_vehicles')
                ->where([['new_vehicles.vehicle_type','=',$type],['new_vehicles_images.size','=','s'],['new_vehicles.status',1],['new_vehicles.brand_id',$brand_id],['new_vehicles.model_id',$model_id]])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'new_vehicles.vehicle_type')
     
      ->join('new_vehicles_images','new_vehicles_images.post_id' , '=' , 'new_vehicles.id')
      
     
   
      ->select('new_vehicles.*','vehicle_types.title as type','vehicle_types.id as vehicle_id','new_vehicles_images.url as url')
      ->get();
    }
    
    
    public function searchNewVehiclesByType(array $filters =[],$type)
    {
        
        $query = DB::table('new_vehicles');

    foreach ($filters as $this->col => $this->id) {
       
         
         $query= $query->Where($this->col. '.id', $this->id);
     
    
    }
      
     $query->where([['new_vehicles_images.size','=','s'],['new_vehicles.vehicle_type',$type]])
   
       ->join('vehicle_types','vehicle_types.id','=' , 'new_vehicles.vehicle_type')
     
      ->join('new_vehicles_images','new_vehicles_images.post_id' , '=' , 'new_vehicles.id')
      ->join('models','models.id','=','new_vehicles.model_id')       
      ->join('brands','brands.id','=','new_vehicles.brand_id')
     
   
      ->select('new_vehicles.*','vehicle_types.title as type','vehicle_types.id as vehicle_id','new_vehicles_images.url as url');
      return $query->paginate(15);
    }
    
    
     public function getAllFeaturedAds()
    {
      return DB::table('vehicles')
      ->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','false']])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
             
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','engine_types.title as engine_type','cities.title as city','model_years.year as year','images.url as url')
       ->orderby('vehicles.updated_at','desc')
              ->paginate(20);
      

    }
     public function getAllFeaturedAdsByType($request)
    {
         $query = DB::table('vehicles');

    
       $this->id=$request->category;
       if($request->category){
         $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
             
            $query->orwhere('vehicles.vehicle_type_id', $id1);
          }
            });
         
       }
     
      $query->where([['vehicles.featured',1],['images.size','s'],['vehicles.status','like','approved'],['vehicles.isDeleted','false']])
      ->join('manufactures','manufactures.id' , '=' , 'vehicles.manufacture_id')
      ->join('brands','brands.id','=','manufactures.brand_id')
      ->join('models','models.id' , '=' , 'vehicles.model_id')
      
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('model_years','model_years.id','=','vehicles.model_year_id')
      ->join('images','images.post_id','=','vehicles.id')
      ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
             
      
      ->select('vehicles.*','brands.title as manufacture','models.title as model','engine_types.title as engine_type','cities.title as city','model_years.year as year','images.url as url')
               ->orderby('vehicles.updated_at','desc');
      
      if($request->sort=="0")
          {
              $query->orderBy('vehicles.price','asc');
          }
          else if($request->sort==1)
          {
             $query->orderBy('vehicles.price','desc');
          }
      
      
      return $query->paginate(20);
      

    }
    
    public function getVehicleCountByType($id)
    {
        return DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$id]])
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'))
        ->groupBY('vehicles.vehicle_type_id')
        ->get();
    
    }
    
    
    public function getFilterDealers(array $filters =[])
    
    {
         $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      
      
      if($this->col == "name")
      {
          $query = $query->where('users.name',$this->id);
      }
      
      else
      {
            $query=$query->Where($this->col. '.id', $this->id);
         
    }
      
     
    }
    


    $query->where([['users.role_id', User::dealer],['vehicles.vehicle_type_id',\App\VehicleType::Car]])
      
       ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
     
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
    
      ->join('users','users.id','=','vehicles.user_id')
      ->select('users.*','vehicles.id as i')
      
      ->orderBy('users.updated_at','desc')
            ->groupby('users.id');
    

       return $query->paginate(24);
      

    }
    
    public function getFilterDealersBike(array $filters =[])
    
    {
         $query = DB::table('vehicles');

    foreach ($filters as $this->col => $this->id) {
      
      
      if($this->col == "name")
      {
          $query = $query->where('users.name',$this->id);
      }
      
      else
      {
            $query=$query->Where($this->col. '.id', $this->id);
         
    }
      
     
    }


    $query->where([['users.role_id', User::dealer],['vehicles.vehicle_type_id',\App\VehicleType::Bike]])
      
      ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('users','users.id','=','vehicles.user_id')
      ->select('users.*','vehicles.id as i')
      
      ->orderBy('users.updated_at','desc')
            ->groupby('users.id');
    

       return $query->paginate(24);

    }

}
