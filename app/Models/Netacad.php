<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Netacad extends Model
{
    use HasFactory;

    public static function insertData($data){

        $value=DB::table('users')->where('name', $data['name'])->get();
        if($value->count() == 0){
           DB::table('users')->insert($data);
        }

   }
   
   public static function insertDataSalle($data){

      $value=DB::table('salles')->where('id', $data['id'])->get();
      if($value->count() == 0){
         DB::table('salles')->insert($data);
      }
   }

   public static function insertDataMateriel($data){

      $value=DB::table('materiels')->where('id', $data['id'])->get();
      if($value->count() == 0){
         DB::table('materiels')->insert($data);
      }
   }
}