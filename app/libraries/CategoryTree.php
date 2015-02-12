<?php

Class CategoryTree{

	private $list = null;
	private $contLevel = 1;

	public function getCategory($category_id)
	{
		$category = CategoryPackage::find($category_id);

		
		$packages = $category->packages();

		if($packages)
        {
            echo "<ol class='sortable'>";
            foreach ($packages as $package) {                                  
            echo '<li id="item-'.$package->package_id.'"><strong>Package: </strong>'.$package->name;
            echo "</li>";                   
            }
            echo "</ol>";
        }

        $subCategories = $this->getCategoryChild($category_id, 3);
        echo $this->list;

	}

	public function getCategoryChild($parent_id,  $level = 1000, $firstTime = true)
	{
		

		$categories = CategoryPackage::where('parent', '=', $parent_id)->orderBy('order', 'asc')->get();

		/*if($categories)
		{
			echo $this->contLevel ." >= ". $level."<br/>";

			if($this->contLevel >= $level)
			{ 
				$this->list .= "</ol>";
				exit();
			}
			$this->contLevel++;
		}*/

        if($firstTime){ $this->list .= "<ol class='sortable'>";}else{ if(count($categories) >= 1){ $this->list .= "<ol>";}}
            
        foreach ($categories as $category) {
        
            $this->list .= '<li id="item-'.$category->category_package_id.'"><strong>Category: ('. $category->category_package_id .')</strong>'.$category->name;

                $packages = $category->packages();
                if($packages)
                {
                    $this->list .= "<ol class='sortable'>";
                    foreach ($packages as $package) {                                  
	                    $this->list .= '<li id="item-'.$package->package_id.'"><strong>Package: </strong>'.$package->name;
	                    $this->list .= "</li>";                   
                    }
                    $this->list .= "</ol>";
                }

            $this->getCategoryChild($category->category_package_id,  $level, false);

            $this->list .= "</li>";
            
        }

        if($firstTime){ $this->list .= "</ol>";}else{if(count($categories) >= 1){$this->list .= "</ol>";}}

            //return $this->list;
	}




}