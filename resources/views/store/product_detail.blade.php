
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                
                @if(count($product->images) > 0)
                    <img src="{{ url('uploads') . '/'.$product->images->first()->id . '.' .$product->images->first()->extension }}" alt="{{ $product->name }}" width="200"/>
                @else
                    <img src="{{ url('images/no-img.jpg')}}" alt="{{ $product->name }}" width="200"/>
                @endif    


            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @if(count($product->images) > 0)
                            @foreach($product->images as $image)
                                <a href="#"><img src="{{ url('uploads') . '/'.$image->id . '.' .$image->extension }}" alt="{{ $product->name }}" width="80"></a>
                            @endforeach
                        @endif
                    </div>

                </div>

            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                <p>{{ $product->description }}</p>
                                <span>
                                    <span>R$ {{ number_format($product->price,'2',',','.') }}</span>
                                        <a href="#" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
</div>