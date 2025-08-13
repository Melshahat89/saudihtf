<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Countries extends Model
{
   public $table = "countries";

   protected $fillable = [
    "name", "country_phone_code", "country_code"
   ];


   public function getNameLangAttribute(){
    return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->{getCurrentLang()}  : $this->name;
   }
   public function getNameEnAttribute(){
    return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->en  : $this->name;
   }
   public function getNameArAttribute(){
    return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->ar  : $this->name;
   }

}