<?php


namespace App\Traits;

trait TagTrait{

	public function AllTags()
	{
	    $data = [];
	    foreach($this->tags as $tag)
	    {
	        $data[] = '<a href="#" class="badge badge-info">'.$tag->name.'</a>';
	    }
	    return implode(' ', $data);
	}
}