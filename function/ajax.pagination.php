<?php

include '../includes/autoload.php';

$ProductView = new ProductView();
$output = "";
$output .= '<div class="row">';
$limit_per_pages = 6;

// $page = "";
// $id_brand = "";
if (isset($_GET['page_no'])) {
    $page = $_GET['page_no'];
} else {
    $page = 1;
}
// Lay id Brand;
if (isset($_GET['brand_no'])) {
    $id_brand =  $_GET['brand_no'];
} else {
    $id_brand = 0;
}

if (isset($_GET['input_search'])) {
    $input_value = $_GET['input_search'];
} else {
    $input_value = "";
}

// Lay khoang gia priceStart,priceEnd
if (isset($_GET['priceStart']) && isset($_GET['priceEnd'])) {
    $priceStart = $_GET['priceStart'];
    $priceEnd = $_GET['priceEnd'];
} else {
    $priceStart = 0;
    $priceEnd = 0;
}

if (isset($_GET['classify'])) {
    $classify = $_GET['classify'];
} else {
    $classify = 0;
}

$offset = ($page - 1) * $limit_per_pages;

if ($classify == 0) {
    if ($id_brand == 0) {
        if ($input_value == "") {
            if ($priceStart == 0 && $priceEnd == 0) {
                $resultOffical = $ProductView->getProductViewByNumberPage($offset, $limit_per_pages, $id_brand);
            } else {
                $resultOfficalOld = $ProductView->getProductsView();
                $resultOffical = filterPriceStartVsPriceEnd($resultOfficalOld, $priceStart, $priceEnd);
                $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
            }
        } else {
            if ($priceStart == 0 && $priceEnd == 0) {
                $result = $ProductView->getProductsView();
                $resultOfficalOld = filterSearch($result, $input_value);
                $resultOffical = filterLimitPage($resultOfficalOld, $offset, $limit_per_pages);
            } else {
                $result = $ProductView->getProductsView();
                $resultOfficalOld = filterSearch($result, $input_value);
                $resultOffical = filterPriceStartVsPriceEnd($resultOfficalOld, $priceStart, $priceEnd);
                $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
            }
        }
    } else {
        if ($input_value == "") {
            if ($priceStart == 0 && $priceEnd == 0) {
                $resultOffical = $ProductView->getProductViewByNumberPage($offset, $limit_per_pages, $id_brand);
            } else {
                $resultOffcialOld = $ProductView->getProductsView();
                $resultOffical = filterBrand($resultOffcialOld, $id_brand);
                $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
            }
        } else {
            if ($priceStart == 0 && $priceEnd == 0) {
                $result = $ProductView->getProductsView();
                $resultOffical = filterBrand($result, $id_brand);
                $resultOffical = filterSearch($resultOffical, $input_value);
                $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
            } else {
                $result = $ProductView->getProductsView();
                $resultOffical = filterBrand($result, $id_brand);
                $resultOffical = filterSearch($resultOffical, $input_value);
                $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
            }
        }
    }
} else {
    if ($classify == 'asc') {
        if ($id_brand == 0) {
            if ($input_value == "") {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                } else {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            } else {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOfficalOld = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterLimitPage($resultOfficalOld, $offset, $limit_per_pages);
                } else {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOfficalOld = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterPriceStartVsPriceEnd($resultOfficalOld, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            }
        } else {
            if ($input_value == "") {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                } else {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                    $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            } else {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                    $resultOffical = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                } else {
                    $resultOffical = $ProductView->getProductByASCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                    $resultOffical = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            }
        }
    } else {
        if ($id_brand == 0) {
            if ($input_value == "") {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                } else {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            } else {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOfficalOld = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterLimitPage($resultOfficalOld, $offset, $limit_per_pages);
                } else {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOfficalOld = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterPriceStartVsPriceEnd($resultOfficalOld, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            }
        } else {
            if ($input_value == "") {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                } else {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                    $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            } else {
                if ($priceStart == 0 && $priceEnd == 0) {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                    $resultOffical = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                } else {
                    $resultOffical = $ProductView->getProductDESCView();
                    $resultOffical = filterBrand($resultOffical, $id_brand);
                    $resultOffical = filterSearch($resultOffical, $input_value);
                    $resultOffical = filterPriceStartVsPriceEnd($resultOffical, $priceStart, $priceEnd);
                    $resultOffical = filterLimitPage($resultOffical, $offset, $limit_per_pages);
                }
            }
        }
    }
}


// Lọc theo brand

function filterBrand($arrayOld, $id_brand)
{
    $arrayNew = [];
    foreach ($arrayOld as $item) {
        $id = $item['ID_thuonghieu'];
        if ($id_brand == $id) {
            $arrayNew[] = $item;
        }
    }
    return $arrayNew;
}

// Loc san pham theo so trang
function filterLimitPage($arrayOld, $offset, $limit)
{

    if (count($arrayOld) == 0) {
        return  $arrayNew = [];
    } else {
        return array_slice($arrayOld, $offset, $limit);
    }
}

// Loc san pham theo ten
function filterSearch($arrayOld, $keyword)
{
    $arrayNew = [];
    foreach ($arrayOld as $item) {
        $name = strtolower($item['Tendt']);
        $keyword = strtolower($keyword);
        if (strpos($name, $keyword) !== false) {
            $arrayNew[] = $item;
        }
    }
    return $arrayNew;
}

// Loc theo priceStart va priceEnd 
function filterPriceStartVsPriceEnd($arrayOld, $priceStart, $priceEnd)
{
    $arrayNew = [];
    foreach ($arrayOld as $item) {
        $price = floatval($item['Giadt']) / 1000000;
        $priceStart = floatval($priceStart);
        $priceEnd = floatval($priceEnd);
        if ($price &&  $priceStart && $priceEnd) {
            if ($price >= $priceStart && $price <= $priceEnd) {
                $arrayNew[] = $item;
            }
        }
    }
    return $arrayNew;
}
if ($resultOffical) {
    foreach ($resultOffical as $product) {
        $product_img = $product['Anhdt'];
        $product_name = $product['Tendt'];
        $product_desc = $product['Motadt'];
        $product_price = $product['Giadt'];
        $id = $product['ID_dienthoai'];
        $output .= "<div class='col-4'>
                    <div class='product-item'>
                        <a class='text-decoration-none' href = 'productdetail.php?id={$id}'>
                        <div class='product-item_img'>
                            <img src='assets/img/{$product_img}' alt=''>
                        </div>
                        </a>
                        <div class='product-item-body'>
                            <h2>{$product_name}</h2>
                            <p>
                               {$product_desc}
                            </p>
                            <div class='product-item-body-price'>
                                <p>{$product_price}</p>
                                <p>{$product_price}</p>
                            </div>
                            <div class='product-item-body_control'>
                                <button id='{$id}'>Đặt ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
       ";
    }

    $output .= '</div>';
    if ($id_brand != 0) {
        if ($input_value == "") {
            if ($priceStart == 0 && $priceEnd == 0) {
                $result_total = $ProductView->getProductsViewByBrandView($id_brand);
            } else {
                $result_total = $ProductView->getProductsViewByBrandView($id_brand);
                $result_total = filterPriceStartVsPriceEnd($result_total, $priceStart, $priceEnd);
            }
        } else {
            if ($priceStart == 0 && $priceEnd == 0) {
                $result = $ProductView->getProductsViewByBrandView($id_brand);
                $result_total = filterSearch($result, $input_value);
            } else {
                $result = $ProductView->getProductsViewByBrandView($id_brand);
                $result_total = filterSearch($result, $input_value);
                $result_total = filterPriceStartVsPriceEnd($result_total, $priceStart, $priceEnd);
            }
        }
    } else {
        if ($input_value == "") {
            if ($priceStart == 0 && $priceEnd == 0) {
                $result_total = $ProductView->getProductsView();
            } else {
                $result_total = $ProductView->getProductsView();
                $result_total = filterPriceStartVsPriceEnd($result_total, $priceStart, $priceEnd);
            }
        } else {
            if ($priceStart == 0 && $priceEnd == 0) {
                $result = $ProductView->getProductsView();
                $result_total = filterSearch($result, $input_value);
            } else {
                $result = $ProductView->getProductsView();
                $result_total = filterSearch($result, $input_value);
                $result_total = filterPriceStartVsPriceEnd($result_total, $priceStart, $priceEnd);
            }
        }
    }
    $total_record = count($result_total);
    echo $total_record;
    $total_pages = ceil($total_record / $limit_per_pages);
    $output .= '

<div class="pagination">
    <div class="pagination_controll back"><i class="fa-solid fa-arrow-left"></i></div>
    <div class="pagination_btn">';
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $className = "active";
        } else {
            $className = "";
        }
        $output .= "
        <div class='{$className}' id='{$i}'>{$i}</div>
        ";
    }
    $output .= ' 
    </div>
    <div class="pagination_controll next"><i class="fa-solid fa-arrow-right"></i></div>
</div>';
    echo $output;
} else {
    echo "No Record Found.";
}
