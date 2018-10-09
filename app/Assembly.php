<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
   

    public function getAllAssembly()
    {
    	return DB::table('assemblies')->orderby('title','asc')->get();

    }

    public function getAllAssemblyFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'assemblies.title','assemblies.id')
        ->groupBY('vehicles.assembly_id')
        ->get();
    
    }

    public function getAllAssemblyVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('assemblies','assemblies.id','=','vehicles.assembly_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'assemblies.title','assemblies.id')
        ->groupBY('vehicles.assembly_id')
        ->get();
    
    }
}
