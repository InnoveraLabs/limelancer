<?php

namespace App\Http\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{

	public function compose(View $view)
	{
		$categoriesCollect = Category::with('children')->get();

		$categories = $categoriesCollect->take(7);

		$othersCategories = $categoriesCollect->diff($categories);

		$view->with('categories', $categories)
                ->with('othersCategories', $othersCategories);
	}
}
