<?php 
require_once "../config.php";
require_once "../model/connectdb.php";
require_once "../model/base/BaseRepository.php";
require_once "../model/action/Action.php";
require_once "../model/action/ActionRepository.php";
require_once "../model/category/Category.php";
require_once "../model/category/CategoryRepository.php";
require_once "../model/brand/Brand.php";
require_once "../model/brand/BrandRepository.php";
require_once "../model/comment/Comment.php";
require_once "../model/comment/CommentRepository.php";
require_once "../model/customer/Customer.php";
require_once "../model/customer/CustomerRepository.php";
require_once "../model/district/District.php";
require_once "../model/district/DistrictRepository.php";
require_once "../model/order/Order.php";
require_once "../model/order/OrderRepository.php";
require_once "../model/status/Status.php";
require_once "../model/status/StatusRepository.php";
require_once "../model/orderItem/OrderItem.php";
require_once "../model/orderItem/OrderItemRepository.php";
require_once "../model/product/Product.php";
require_once "../model/product/ProductRepository.php";
require_once "../model/brand/Brand.php";
require_once "../model/brand/BrandRepository.php";
require_once "../model/imageItem/ImageItem.php";
require_once "../model/imageItem/ImageItemRepository.php";
require_once "../model/province/Province.php";
require_once "../model/province/ProvinceRepository.php";
require_once "../model/role/Role.php";
require_once "../model/role/RoleRepository.php";
require_once "../model/roleAction/RoleAction.php";
require_once "../model/roleAction/RoleActionRepository.php";
require_once "../model/staff/Staff.php";
require_once "../model/staff/StaffRepository.php";
require_once "../model/transport/Transport.php";
require_once "../model/transport/TransportRepository.php";
require_once "../model/ward/Ward.php";
require_once "../model/ward/WardRepository.php";
require_once "../model/cart/Cart.php";
require_once "../model/cart/CartStorage.php";
require_once "../model/newsletter/NewsLetter.php";
require_once "../model/newsletter/NewsLetterRepository.php";

//Load Composer's autoloader
require '../vendor/autoload.php';

require "../service/MailService.php";

function get_host_name() {
	return $_SERVER['HTTP_HOST'];
}

function getProtocol() {
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol;
}

function get_domain(){
	$protocol = getProtocol();
    return $protocol . $_SERVER['HTTP_HOST'];
}


$footerCategoryRepository = new CategoryRepository();
$footerCategories = $footerCategoryRepository->getAll();
 ?>