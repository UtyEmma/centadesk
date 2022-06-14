@push('styles')
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('js/front-nav.js')}}"></script>
@endpush

<div class="category-section section section-padding-02">
    <div class="container">
      <div class="section-title mb-4">
        <h2>Checkout our Top categories</h2>
      </div>
      @php
          $badges = ['badge-color-1', 'badge-color-2', 'badge-color-3', 'badge-color-4', 'badge-color-5', 'badge-color-6'];
      @endphp
      <div class="row">
          @foreach ($categories as $key => $category)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a class="d-block" href="/sessions?category={{$category->slug}}">
                <div class="category-content {{$badges[$key]}} radius">
                    <div class="category-content-left radius">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.2" d="M25 6H7C6.86868 6 6.73864 6.02586 6.61732 6.07612C6.49599 6.12637 6.38575 6.20003 6.29289 6.29289C6.20003 6.38575 6.12637 6.49599 6.07612 6.61732C6.02586 6.73864 6 6.86868 6 7V25C6 25.1313 6.02586 25.2614 6.07612 25.3827C6.12637 25.504 6.20003 25.6143 6.29289 25.7071C6.38575 25.8 6.49599 25.8736 6.61732 25.9239C6.73864 25.9741 6.86868 26 7 26H25C25.1313 26 25.2614 25.9741 25.3827 25.9239C25.504 25.8736 25.6143 25.8 25.7071 25.7071C25.8 25.6143 25.8736 25.504 25.9239 25.3827C25.9741 25.2614 26 25.1313 26 25V7C26 6.86868 25.9741 6.73864 25.9239 6.61732C25.8736 6.49599 25.8 6.38575 25.7071 6.29289C25.6143 6.20003 25.504 6.12637 25.3827 6.07612C25.2614 6.02586 25.1313 6 25 6ZM19.5 19.5H12.5V12.5H19.5V19.5Z" fill="#564FFD" />
                            <path d="M19.5 12.5H12.5V19.5H19.5V12.5Z" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M25 6H7C6.44772 6 6 6.44772 6 7V25C6 25.5523 6.44772 26 7 26H25C25.5523 26 26 25.5523 26 25V7C26 6.44772 25.5523 6 25 6Z" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M26 13H29" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M26 19H29" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 13H6" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 19H6" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19 26V29" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13 26V29" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19 3V6" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13 3V6" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="category-content-right">
                    <h4>{{$category->name}}</h4>
                    <span>{{$category->batches_count}} {{Str::plural('Session', $category->batches_count)}}</span>
                    </div>
                </div>
                </a>
            </div>
          @endforeach
    </div>
  </div>
