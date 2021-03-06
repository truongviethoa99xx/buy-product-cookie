@extends('layouts.layout')
@section('content')
<div class="app__container">
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-2 m-0 c-0">
                <nav class="category">
                    <h3 class="category__heading">
                        <i class="category__heading-icon bx bx-list-ul"></i>
                        <span class="category__heading-title"> Danh mục</span>
                    </h3>
                    <ul class="category-list">
                        <li class="category-item category-item-1 category-item--active" data-id="1">
                            <span class="category-item__link">
                                Nước uống
                            </span>
                        </li>
                        <li class="category-item category-item-2" data-id="2">
                            <span class="category-item__link">
                                Đồ chơi
                            </span>
                        </li>
                        <li class="category-item category-item-3" data-id="3">
                            <span class="category-item__link">
                                Xe máy
                            </span>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col l-10 m-12 c-12">
                <!-- product -->
                <div class="home-product">
                    <div class="row sm-gutter list_product">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush
