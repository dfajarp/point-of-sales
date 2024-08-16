<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use HasFactory;


    protected $table = "permission";

    static function getRecord()
    {
        $get_permission = PermissionModel::groupBy("groupby")->get();
        $result = [];

        foreach ($get_permission as $key => $value) {
            $get_permission_group = PermissionModel::gtPermissionGroup($value->groupby);
            $data = [];
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $group = [];
            foreach ($get_permission_group as $k => $v) {
                $dataG = [];
                $dataG['id'] = $v->id;
                $dataG['name'] = $v->name;
                $group[] = $dataG;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;

    }
    static public function getSingle($id)
    {
        return PermissionModel::find($id);
    }

    static public function gtPermissionGroup($groupny)
    {
        return PermissionModel::where('groupby', $groupny)->get();
    }
}
