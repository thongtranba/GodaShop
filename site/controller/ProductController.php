<?php 

class ProductController {
	function list() {
		$productRepository = new ProductRepository();
		$conds = [];
		$sorts = [];
		$page = !empty($_GET["page"])?$_GET["page"]:null;;
		$qty_per_page = PRODUCT_PER_PAGE;
		$category_id = !empty($_GET["category_id"])?$_GET["category_id"]:null;
		if (!empty($category_id)) {
			$conds = [
				"category_id"=>[
					"type"=>"=",
					"val"=>$category_id
				]
			];
		}

		$price_range = !empty($_GET["price-range"])?$_GET["price-range"]:null;
		if (!empty($price_range)) {
			// SELECT * FROM product WHERE sale_price BETWEEN 100000 AND 200000
			$tmp= explode("-",$price_range);
			// $start=[0]
			// $end=[1]
			list($start,$end) = $tmp;
			$conds = [
				"sale_price"=>[
					"type"=>"BETWEEN",
					"val"=>"$start AND $end"
				]
			];
			if ($end == greater) {
				$conds = [
					"sale_price"=>[
						"type"=>">",
						"val"=>"$start "
					]
				];
			}
		}
		$search = !empty($_GET["search"])?$_GET["search"]:null;
		if (!empty($search)) {
			
			$conds = [
				"name"=>[
					"type"=>"LIKE",
					"val"=>"'%$search%'"
				]
			];
			
		}
		$sort = !empty($_GET["sort"]) ? $_GET["sort"]:null;
		if (!empty($sort)) {
			$tmp = explode ("-",$sort);
			$order = $tmp[1];
			$type = $tmp[0];
			$mapCol = ["price" => "sale_price", "alpha"=>"name", "created" =>"created_date"];
			$col = $mapCol[$type];
			$sorts = [$col =>$order];


		}

		$products = $productRepository->getBy($conds, $sorts,$page,$qty_per_page);

		$categoryRepository = new categoryRepository();
		$categories = $categoryRepository->getAll();


		$totalProducts = $productRepository->getBy($conds,$sorts);
		$totalPage = ceil(count($totalProducts) / $qty_per_page);
		echo $totalPage;

		include "view/product/list.php";
	}
	function ajaxSearch() {
		$search = $_GET["pattern"];
		$productRepository = new ProductRepository();
		$conds = [
			"name"=>[
				"type"=>"LIKE",
				"val"=>"'%$search%'"
			]
		];
		$sorts = [];
		$products = $productRepository->getBy($conds, $sorts,1,20);
		include "view/product/ajaxSearch.php";

	}
	function detail() {
		$id= $_GET["id"];
		$productRepository = new ProductRepository();
		$product = $productRepository->find($id);

		$conds = [
			"category_id" => [
				"type" => "=",
				"val" =>$product->getCategoryId(),
			],
			"id" => [
				"type" => "!=",
				"val" =>$product->getId(),
			]

		];

		$relatedProducts = $productRepository->getBy($conds);
		include "view/product/detail.php";
	}

}



?>

<!-- khi thấy num-row báo lỗi thì câu SQL bị sai cần check lại -->
