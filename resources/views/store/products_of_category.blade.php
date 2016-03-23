<div class="col-sm-9 padding-right">
    
    <div class="features_items"><!--products of categories-->
    
        <h2 class="title text-center">Produtos da Categoria {{ $category->name }}:</h2>

        @include('store.partial.product',['products' => $productOfCategory])
    
    </div><!--productsOfCategory-->