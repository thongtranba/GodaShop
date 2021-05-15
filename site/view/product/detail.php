<?php include "layout/header.php" ?>
<main id="maincontent" class="page-main">
    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <ol class="breadcrumb">
                    <li><a href="/" target="_self">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li class="active"><span>Kem Dưỡng Da</span></li>
                </ol>
            </div>
            <div class="col-xs-3 hidden-lg hidden-md">
                <a class="hidden-lg pull-right btn-aside-mobile" href="javascript:void(0)">Bộ lọc <i class="fa fa-angle-double-right"></i></a>
            </div>
            <div class="clearfix"></div>
            <aside class="col-md-3">
                <div class="inner-aside">
                    <div class="category">
                        <h5>Danh mục sản phẩm</h5>
                        <ul>
                            <li>
                                <a href="#" title="Tất cả sản phẩm" target="_self">Tất cả sản phẩm
                                </a>
                            </li>
                            <li class="">
                                <a href="#" title="Kem Chống Nắng" target="_self">Kem Chống Nắng</a>
                            </li>
                            <li class="active">
                                <a href="#" title="Kem Dưỡng Da" target="_self">Kem Dưỡng Da</a>
                            </li>
                            <li class="">
                                <a href="#" title="Kem Trị Mụn" target="_self">Kem Trị Mụn</a>
                            </li>
                            <li class="">
                                <a href="#" title="Kem Trị Thâm Nám" target="_self">Kem Trị Thâm Nám</a>
                            </li>
                            <li class="">
                                <a href="#" title="Sữa Rửa Mặt" target="_self">Sữa Rửa Mặt</a>
                            </li>
                            <li class="">
                                <a href="#" title="Sữa Tắm" target="_self">Sữa Tắm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="price-range">
                        <h5>Khoảng giá</h5>
                        <ul>
                            <li >
                                <label for="filter-less-100">
                                    <input  type="radio" id="filter-less-100" name="filter-price" value="0-100000">
                                    <i class="fa"></i>
                                    Giá dưới 100.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-100-200">
                                    <input  type="radio" id="filter-100-200" name="filter-price" value="100000-200000">
                                    <i class="fa"></i>
                                    100.000đ - 200.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-200-300">
                                    <input  type="radio" id="filter-200-300" name="filter-price" value="200000-300000">
                                    <i class="fa"></i>
                                    200.000đ - 300.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-300-500">
                                    <input  type="radio" id="filter-300-500" name="filter-price" value="300000-500000">
                                    <i class="fa"></i>
                                    300.000đ - 500.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-500-1000">
                                    <input  type="radio" id="filter-500-1000" name="filter-price" value="500000-1000000">
                                    <i class="fa"></i>
                                    500.000đ - 1.000.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-greater-1000">
                                    <input  type="radio" id="filter-greater-1000" name="filter-price" value="1000000-greater">
                                    <i class="fa"></i>
                                    Giá trên 1.000.000đ 
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <div class="col-md-9 product-detail">
                <div class="row product-info">
                    <div class="col-md-6">
                        <img data-zoom-image="../upload/<?=$product->getFeaturedImage()?>" class="img-responsive thumbnail main-image-thumbnail" src="../upload/<?=$product->getFeaturedImage()?>" alt="">
                        <div class="product-detail-carousel-slider">
                            <div class="owl-carousel owl-theme">
                                <div class="item thumbnail"><img src="../upload/<?=$product->getFeaturedImage()?>" alt=""></div>


                                <?php foreach ($product->getImageItems() as $imageItem): ?>
                                    <div class="item thumbnail"><img src="../upload/<?=$product->getname()?>" alt=""></div>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="product-name"><?=$product->getname()?></h5>
                        <div class="brand">
                            <span>Nhãn hàng: </span> <span><?=$product->getBrand()->getName()?></span> 
                        </div>
                        <div class="product-status"> 
                            <span>Trạng thái: </span>
                            <?php if($product->getInventoryQty() == 0): ?>
                                <span class="label-warning">Hết hàng</span>
                                <?php else: ?>
                                    <span class="label-success">Còn hàng</span>
                                <?php endif ?>
                            </div>
                            <div class="product-item-price">
                                <span>Giá: </span>
                              <?php if ($product->getPrice() != $product->getSalePrice()): ?>  
                                <span class="product-item-regular"><?=number_format($product->getPrice())?>đ</span>
                                 <?php endif ?>
                            <span class="product-item-discount"><?=number_format($product->getSalePrice())?>đ</span>            
                        </div>
                    </div>
                </div>
                <div class="row product-description">
                    <div class="col-xs-12">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#product-description" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a>
                                </li>
                                <li role="presentation">
                                    <a href="#product-comment" aria-controls="tab" role="tab" data-toggle="tab">Đánh giá</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="product-description">   
                                   <?=$product->getDescription()?>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="product-comment">
                                    <form class="form-comment" action="" method="POST" role="form" value="<?$product->getId()?>">
                                        <label>Đánh giá của bạn</label>
                                        <div class="form-group">
                                            <input type="hidden" name="product_id" value="3">
                                            <input class="rating-input" name="rating" type="text" title="" value="4"/>
                                            <input type="text" class="form-control" id="" name="fullname" placeholder="Tên *" required>
                                            <input type="email" name="email" class="form-control" id="" placeholder="Email *" required>
                                            <textarea name="description" id="input" class="form-control" rows="3" required placeholder="Nội dung *"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </form>
                                    <div class="comment-list">
                                        <?php foreach ($product->getComments() as $comment):?>
                                        <hr>
                                        <span class="date pull-right"><?=$comment->getCreatedDate()?></span>
                                        <input class="answered-rating-input" name="rating" type="text" title="" value="<?=$comment->getStar()?>" readonly />
                                        <span class="by"><?=$comment->getFullname()?></span>
                                        <p><?=$comment->getDescription()?></p>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-related equal">
                    <div class="col-md-12">
                        <h4 class="text-center">Sản phẩm liên quan</h4>
                        <div class="owl-carousel owl-theme">
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/kemLuaLamDepDaBeaumore.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem lụa làm đẹp da Beaumore- 30ml">Kem lụa làm đẹp da Beaumore- 30ml</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">1,500,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="5" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/kemLamDepTucThiInstantBeauMore.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm đẹp tức thì  Instant Beaumore">Kem làm đẹp tức thì  Instant Beaumore</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">762,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="6" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/suaTamSandrasShowerGel.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Sữa tắm Sandras Shower Gel">Sữa tắm Sandras Shower Gel</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">180,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="7" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/suaDuongTheSandraschai88ml.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Sữa dưỡng thể Sandras chai 88ml">Sữa dưỡng thể Sandras chai 88ml</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">180,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="8" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/kemDuongTrangDaNgayVaDem.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem Dưỡng Trắng Da Ngày vs Đêm">Kem Dưỡng Trắng Da Ngày vs Đêm</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">265,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="10" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/kemNenTrangDiemDuongDaSandrasBB.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml">Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">321,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="11" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/nhamSamSandrasBeauty20g.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g ">Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g </a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">380,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="13" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/beaumoreContourEyeCream.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g">Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">300,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="14" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/kemGiaiDocToPh20ml.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem giải độc tố pH Beaumore- 20ml">Kem giải độc tố pH Beaumore- 20ml</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">239,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="18" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item thumbnail">
                                <div class="product-container">
                                    <div class="image">
                                        <img class="img-responsive" src="../upload/kemTrangDaLinhChiDongTrungHaThao.jpg" alt="">
                                    </div>
                                    <div class="product-meta">
                                        <h5 class="name">
                                            <a class="product-name" href="chi-tiet-san-pham.html" title="Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g">Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g</a>
                                        </h5>
                                        <div class="product-item-price">
                                            <span class="product-item-discount">905,000₫</span>            
                                        </div>
                                    </div>
                                    <div class="button-product-action clearfix">
                                        <div class="cart icon">
                                            <a class="btn btn-outline-inverse buy" product-id="20" href="javascript:void(0)" title="Thêm vào giỏ">
                                                Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="quickview icon">
                                            <a class="btn btn-outline-inverse" href="chi-tiet-san-pham.html" title="Xem nhanh">
                                                Xem chi tiết <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "layout/footer.php" ?>       