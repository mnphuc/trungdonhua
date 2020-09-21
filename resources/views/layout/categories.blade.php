 <div id="column-left" class="left-column compliance">
        <div class="col-md-3 hidden-sm hidden-xs">
            <div class="mainmenu">
                                        <span class="edit-span">
                                            <i class="fa fa-dashcube" aria-hidden="true"></i>Danh mục sản phẩm
                                        </span>
                <div class="nav-cate">
                    <ul id="menu2017">
                        @foreach($cate as $cat)
                            <li class="menu-item-count">
                                <h3>
                                    <img src="{{$cat->images ? $cat->images : asset('assets/images/no-image-news.png')}}" data-lazyload="{{$cat->images ? $cat->images : asset('assets/images/no-image-news.png')}}" alt="{{$cat->categories_name}}" />
                                    <a href="{{route('categories', $cat->slug)}}">{{$cat->categories_name}}</a>
                                </h3>
                            </li>
                            @endforeach
                            </li>
                    </ul>
                </div>
            </div>
        </div>
 </div>
