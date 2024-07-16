@section('content')
    <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image"
                                    {{-- style="max-height:250px !important;min-height:250px !important" --}}>
                                    <a href="{{route('product.category.show', $category->name)}}"><img src="{{ asset('assets\img\categories\\'.$category->image_path) }}" alt="{{ $category->name }}"></a>
                                </div>
                                <h3>{{ $category->name }}</h3>
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
@endsection