<div class="col-sm-9 padding-right">
    
    <div class="features_items"><!--products of Tags-->
    
        <h2 class="title text-center">Produtos com a Tag {{ $tag->name }}:</h2>

        @include('store.partial.product',['products' => $productOfTag])
    
    </div><!--productsOfCategory-->