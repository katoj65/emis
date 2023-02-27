<?php


namespace App\Traits;

use App\Models\RegionModel;
use App\Models\Settings\AdminUnits\County;
use App\Models\Settings\AdminUnits\Districts;
use App\Models\Settings\AdminUnits\Parish;
use App\Models\Settings\AdminUnits\Region;
use App\Models\Settings\AdminUnits\Subcounty;
use App\Models\Settings\AdminUnits\Village;

trait AdminUnits
{

    public function Region($id = null, $withDistricts = false, $search = null)
    {
        $query = Region::orderBy('id', 'ASC');
        if (isset($id)) {

            return $query->with('districts')->where('id', $id)->first();
        } else {
            $withDistricts == true ? $query->with('districts') : '';

            // $query->where('name', 'like', '%' . $search . '%');

            isset($search) && !empty($search) ? $query->where('name', 'like', '%' . $search . '%'):'';

            return $query->get();
        }
    }

    public function Districts($id = null)
    {
        $query = new Districts;
        return $id ? $query->with('county')->where('id', $id)->first() : $query->get();
    }

    public function County($id = null)
    {
        $query = new County;
        return $id ? $query->with('subcounty')->where('id', $id)->first() : $query->get();
    }
    public function Subcounty($id = null)
    {
        $query = new Subcounty;
        return $id ? $query->with('parish')->where('id', $id)->first() : $query->get();
    }

    public function Parish($id = null)
    {
        $query = new Parish;
        return $id ? $query->with('villages')->where('id', $id)->first() : $query->get();
    }
    public function Village($id = null)
    {
        $query = new Village;
        return $id ? $query->with('parish')->where('id', $id)->first() : $query->get();
    }
}
