<?php include "layout/header.php" ?>
<main id="maincontent" class="page-main">
    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <ol class="breadcrumb">
                    <li><a href="/" target="_self">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li class="active"><span>Tất cả sản phẩm</span></li>
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
                            <li class="<?=empty($category_id) ? "active":""?>">
                                <a href="index.php?c=product" title="Tất cả sản phẩm" target="_self">Tất cả sản phẩm
                                </a>
                            </li>
                            <?php foreach ($categories as  $category): ?>
                                <li class="<?=!empty($category_id) && $category_id==$category->getId() ? "active":""?>">
                                    <a href="index.php?c=product&category_id=<?=$category->getId()?>" title="<?=$category->getName()?>" target="_self"><?=$category->getName()?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="price-range">
                        <h5>Khoảng giá</h5>
                        <ul>
                            <li >
                                <label for="filter-less-100">
                                    <input  type="radio" id="filter-less-100" name="filter-price" value="0-100000" <?=!empty($price_range) && $price_range == "0-100000" ? "checked" : ""?>>
                                    <i class="fa"></i>
                                    Giá dưới 100.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-100-200">
                                    <input  type="radio" id="filter-100-200" name="filter-price" value="100000-200000" <?=!empty($price_range) && $price_range == "100000-200000" ? "checked" : ""?>>
                                    <i class="fa"></i>
                                    100.000đ - 200.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-200-300">
                                    <input  type="radio" id="filter-200-300" name="filter-price" value="200000-300000" <?=!empty($price_range) && $price_range == "200000-300000" ? "checked" : ""?>>
                                    <i class="fa"></i>
                                    200.000đ - 300.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-300-500">
                                    <input  type="radio" id="filter-300-500" name="filter-price" value="300000-500000" <?=!empty($price_range) && $price_range == "300000-500000" ? "checked" : ""?>>
                                    <i class="fa"></i>
                                    300.000đ - 500.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-500-1000">
                                    <input  type="radio" id="filter-500-1000" name="filter-price" value="500000-1000000" <?=!empty($price_range) && $price_range == "500000-1000000" ? "checked" : ""?>>
                                    <i class="fa"></i>
                                    500.000đ - 1.000.000đ
                                </label>
                            </li>
                            <li >
                                <label for="filter-greater-1000">
                                    <input  type="radio" id="filter-greater-1000" name="filter-price" value="1000000-greater" <?=!empty($price_range) && $price_range == "1000000-greater" ? "checked" : ""?>>
                                    <i class="fa"></i>
                                    Giá trên 1.000.000đ 
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <div class="col-md-9 products">
                <div class="row equal">
                    <div class="col-xs-6">
                        <h4 class="home-title">Tất cả sản phẩm</h4>
                    </div>
                    <div class="col-xs-6 sort-by">
                        <div class="pull-right">
                            <label class="left hidden-xs" for="sort-select">Sắp xếp: </label>
                            <select id="sort-select">
                                <option value="" <?=empty($sort) ?"selected": ""?>>Mặc định</option>
                                <option <?=!empty($sort) && $sort=="price-asc" ?"selected": ""?>  value="price-asc">Giá tăng dần</option>
                                <option <?=!empty($sort) && $sort=="price-desc" ?"selected": ""?> value="price-desc">Giá giảm dần</option>
                                <option <?=!empty($sort) && $sort=="alpha-asc" ?"selected": ""?> value="alpha-asc">Từ A-Z</option>
                                <option <?=!empty($sort) && $sort=="alpha-desc" ?"selected": ""?> value="alpha-desc">Từ Z-A</option>
                                <option <?=!empty($sort) && $sort=="created-asc" ?"selected": ""?> value="created-asc">Cũ đến mới</option>
                                <option <?=!empty($sort) && $sort=="created-desc" ?"selected": ""?> value="created-desc">Mới đến cũ</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php foreach ($products as $product): ?>
                        <div class="col-xs-6 col-sm-4">
                           <?php include "layout/product.php" ?>
                       </div>
                   <?php endforeach ?>
               </div>
               <!-- Paging -->
               <ul class="pagination pull-right">
                <?php if ($page != 1): ?>
                    <li class=""><a href="javascript:void(0)" onclick="goToPage(<?=$page-1?>)">Trước</a></li>
                <?php endif ?>

                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    <li class="<?=$i==$page? "active": "" ?>"><a href="javascript:void(0)" onclick="goToPage(<?=$i?>)"><?=$i?></a></li>
                <?php endfor ?>

                <?php if ($page != $totalPage): ?>
                    <li class=""><a href="javascript:void(0)" onclick="goToPage(<?=$page+1?>)">Sau</a></li>
                <?php endif ?>
            </ul>
            <!-- End paging -->
        </div>
    </div>
</div>
</main>
<?php include "layout/footer.php" ?>

<!-- <?php 
foreach ($produts as $product) {
    if ($product->getId()==5) {
        //do something
    }
}

foreach ($produts as $product) :
    if ($product->getId()==5):
        //do something
    endif;
endforeach;

 ?> -->