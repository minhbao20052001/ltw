<?php
    class Products extends Controller {

        function defaultView(){
            $productDB = $this->model("ProductsModel");
            $productsView = $this->view("ProductsView", 
            [
                "all-pro"=>$productDB->getAllProducts(),
                "all-type"=>$productDB->getAllCategories(),
            ]);
        }

        function category($category){
            $productDB = $this->model("ProductsModel");
            $this->view("ProductsView", [
                "all-pro"=>$productDB->getAllProductsOfCategory($category),
                "all-type"=>$productDB->getAllCategories(),
                "type"=>$category,
            ]);
        }

        function price($p1, $p2){
            $productDB = $this->model("ProductsModel");
            $priceTitle = "";
            if ($p1 == 0) $priceTitle = "Under $25";
            else if ($p1 == 25) $priceTitle = "$25 to $50";
            else if ($p1 == 50) $priceTitle = "$50 to $100";
            else if ($p1 == 100) $priceTitle = "$100 to $200";
            else $priceTitle = "$200 & Above";

            $this->view("ProductsView", [
                "all-pro"=>$productDB->getAllProductsWithPrice($p1, $p2),
                "all-type"=>$productDB->getAllCategories(),
                "price"=>$priceTitle,
            ]);
        }

        function productdetail($product_id){
            $productDB = $this->model("ProductsModel");
            $product = mysqli_fetch_array($productDB->getProduct($product_id));
            $related_product = $productDB->getRelatedProducts($product["product_type"]);
            $this->view("ProductDetailView", ["pro"=>$product, "related-pro"=>$related_product]);
        }
    }
?>