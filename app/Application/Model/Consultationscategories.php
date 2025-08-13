<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Consultationscategories extends Model
{
    public $table = "consultations_categories";
    protected $fillable = [
        'name', 'slug', 'status', 'show_home', 'show_menu'
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
       public function getDescLangAttribute(){
        return is_json($this->desc) && is_object(json_decode($this->desc)) ?  json_decode($this->desc)->{getCurrentLang()}  : $this->desc;
       }
       public function getDescEnAttribute(){
        return is_json($this->desc) && is_object(json_decode($this->desc)) ?  json_decode($this->desc)->en  : $this->desc;
       }
       public function getDescArAttribute(){
        return is_json($this->desc) && is_object(json_decode($this->desc)) ?  json_decode($this->desc)->ar  : $this->desc;
       }
}
