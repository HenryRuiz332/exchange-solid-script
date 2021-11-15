<?php


	
	namespace App\Traits\GlobalTraits;
	use Illuminate\Pagination\LengthAwarePaginator;
	use Illuminate\Support\Arr;
	use stdClass;

	trait Paginate {

		public static function createPaginator($request,$items,$perPage){
	        $currentPage = LengthAwarePaginator::resolveCurrentPage();
	        $perPage = $perPage;
	        $items = array_reverse( Arr::sort($items , function ($value) {
	            return $value['created_at'];
	        }));
	        $currentItems = array_slice($items, $perPage * ($currentPage - 1), $perPage);
	        $itemsPaginated = new LengthAwarePaginator($currentItems, count($items), $perPage, $currentPage,[
	            'path' => $request->url(),
	            'pageName' => 'page',
	        ]);
	        return $itemsPaginated;
	    }


	    //Add models for pagination global
	    public static function itemPerPage(){
			$items = new stdClass;
			$items->users = 1000;
			
			return  $items;
		}
	}