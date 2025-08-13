<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

  public $table = "slider";


   protected $fillable = [
        'title','description','image','status', 'cta_text', 'cta_link'
   ];

	public function getTitleLangAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->{getCurrentLang()}  : $this->title;
	}
	public function getTitleEnAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->en  : $this->title;
	}
	public function getTitleArAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->ar  : $this->title;
	}
	public function getDescriptionLangAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->{getCurrentLang()}  : $this->description;
	}
	public function getDescriptionEnAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->en  : $this->description;
	}
	public function getDescriptionArAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->ar  : $this->description;
	}
	
	public function getCtaTextLangAttribute(){
		return is_json($this->cta_text) && is_object(json_decode($this->cta_text)) ?  json_decode($this->cta_text)->{getCurrentLang()}  : $this->cta_text;
	}
	public function getCtaTextEnAttribute(){
		return is_json($this->cta_text) && is_object(json_decode($this->cta_text)) ?  json_decode($this->cta_text)->en  : $this->cta_text;
	}
	public function getCtaTextArAttribute(){
		return is_json($this->cta_text) && is_object(json_decode($this->cta_text)) ?  json_decode($this->cta_text)->ar  : $this->cta_text;
	}
}
