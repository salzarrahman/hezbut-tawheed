<style>

.pagination{
  list-style: none;
  display: inline-block;
  padding: 0;
}

.pagination li{
  display: inline;
  text-align: center;
}

.pagination a{
  float: left;
  display: block;
  font-size: 14px;
  font-weight: 500;
  text-decoration: none;
  padding: 5px 12px;
  color: #fff;
  margin-left: -1px;
  border: 1px solid transparent;
  line-height: 1.5;
}

.pagination a:active{
  outline: none;
}

.modal a{
  margin: 0 5px;
  padding: 0;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 100%;
  background-color: #16327a;
  transform: translateY(0);
  transition: all .3s ease-out;
}

.modal a.prev{
  border-radius: 50px 0 0 50px;
  width: 100px;
}

.modal a.next{
  border-radius: 0 50px 50px 0;
  width: 100px;
}

.modal a:hover{
  background-color: #e70f47;
  color: #fff;
  font-weight: 1000;
  transform: translateY(8px);
  transition: all .3s ease-out;
}

.modal a.active, .modal a:active{
  background-color: #e70f47;
}
.custom-w-container-pagination {
    display: flex;
    justify-content: center;
    padding-top: 30px;

}
</style>

<!-- HTML MARKUP-->
@if ($paginator->hasPages())
<div class="container w-container custom-w-container-pagination">
    <ul class="pagination modal">
        @if ($paginator->onFirstPage())
            <li>
                <a href="#" class="prev">@lang('pagination.previous')</a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">@lang('pagination.previous')</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                        <li>
                            <a href="#" class="active">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>

                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="next">@lang('pagination.next')</a>
            </li>
        @else
            <li>
                <a href="#" class="next">@lang('pagination.next')</a>
            </li>
        @endif

    </ul>
</div>
@endif
