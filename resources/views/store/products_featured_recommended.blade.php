<div class="col-sm-9 padding-right">
    
    <div class="features_items"><!--recommended_items-->
    
        <h2 class="title text-center">Em destaque</h2>

        @include('store.partial.product',['products' => $productFeatured])
        
        
    </div><!--recommended-->
    
    <div class="features_items"><!--featured_items-->
    
        <h2 class="title text-center">Recomendados</h2>

        @include('store.partial.product',['products' => $productRecommended])
        
        
    </div><!--recommended-->