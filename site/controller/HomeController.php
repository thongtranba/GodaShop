<?php 

class HomeController {
	function list() {
		$productRepository = new ProductRepository();
		$conds=[];
		$sorts = ["featured" => "DESC"];
		$FeaturedProducts = $productRepository->getBy($conds, $sorts, 1,4);
		$sorts = ["created_date"=> "DESC"];
		$LastedProducts = $productRepository->getBy($conds, $sorts, 1,4);

		$categoryRepository = new CategoryRepository();
		$categories = $categoryRepository->getAll();
		$categoryProduct = [];
		foreach ($categories as $category) {
			$conds=[
				"category_id" => [
					"type" => "=",
					"val" => $category->getId()
				]
			];
			$products = $productRepository->getBy($conds, $sorts, 1,4);
			$categoryProducts[$category->getName()]= $products;
		}
		
		include "view/home/list.php";
	}
	
}

?>
