@push('styles')
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('js/front-nav.js')}}"></script>
@endpush

<div class="category-section section section-padding-02">
    <div class="container">
      <div class="section-title mb-4">
        <h2>Browse with top category</h2>
      </div>
      @php
          $badges = ['badge-color-1', 'badge-color-2', 'badge-color-3', 'badge-color-4', 'badge-color-5', 'badge-color-6'];
      @endphp
      <div class="row">
          @foreach ($categories as $key => $category)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a class="d-block" href="/courses?category={{$category->slug}}">
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
        {{-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-2">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M25 19.1076L20.4004 23.7072C20.2783 23.8294 20.1266 23.9178 19.9602 23.9639C19.7938 24.0099 19.6182 24.0122 19.4507 23.9703L12.2061 22.1591C12.0702 22.1252 11.943 22.063 11.8326 21.9767L5 16.6339L9.0718 8.97363L15.4868 7.10344C15.716 7.03664 15.9614 7.054 16.1789 7.1524L20.5 9.1076H17.9142C17.7829 9.1076 17.6529 9.13347 17.5315 9.18372C17.4102 9.23398 17.3 9.30764 17.2071 9.4005L12.3153 14.2923C12.214 14.3936 12.1356 14.5155 12.0855 14.6497C12.0354 14.784 12.0148 14.9274 12.0249 15.0703C12.0351 15.2132 12.0758 15.3523 12.1444 15.4781C12.213 15.6039 12.3078 15.7134 12.4224 15.7994L13.1 16.3076C13.7924 16.8269 14.6345 17.1076 15.5 17.1076C16.3655 17.1076 17.2076 16.8269 17.9 16.3076L19.5 15.1076L25 19.1076Z" fill="#23BD33" />
                  <path d="M30.0897 15.2231L27 16.7679L23 9.10768L26.1212 7.5471C26.3557 7.42986 26.6268 7.40939 26.8763 7.4901C27.1257 7.57082 27.3335 7.74626 27.4548 7.97866L30.5289 13.8658C30.5904 13.9835 30.6278 14.1123 30.639 14.2446C30.6501 14.377 30.6348 14.5102 30.5939 14.6365C30.553 14.7629 30.4874 14.8798 30.4008 14.9805C30.3143 15.0812 30.2085 15.1637 30.0897 15.2231V15.2231Z" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5.00016 16.634L1.91045 15.0892C1.79167 15.0298 1.68591 14.9473 1.59934 14.8466C1.51277 14.7459 1.44713 14.629 1.40624 14.5026C1.36535 14.3763 1.35004 14.243 1.3612 14.1107C1.37236 13.9784 1.40977 13.8496 1.47124 13.7319L4.54536 7.84475C4.66671 7.61236 4.87447 7.43691 5.12391 7.35619C5.37334 7.27548 5.6445 7.29594 5.879 7.41319L9.00016 8.97377L5.00016 16.634Z" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M27 16.7679L25 19.1076L20.4004 23.7073C20.2783 23.8294 20.1266 23.9178 19.9602 23.9639C19.7938 24.01 19.6182 24.0122 19.4507 23.9703L12.2061 22.1592C12.0702 22.1252 11.943 22.063 11.8326 21.9768L5 16.6339" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M24.9999 19.1077L19.4999 15.1077L17.8999 16.3077C17.2075 16.827 16.3654 17.1077 15.4999 17.1077C14.6345 17.1077 13.7923 16.827 13.0999 16.3077L12.4223 15.7995C12.3077 15.7135 12.2129 15.6039 12.1443 15.4781C12.0758 15.3523 12.035 15.2133 12.0249 15.0704C12.0147 14.9275 12.0354 14.784 12.0855 14.6498C12.1356 14.5156 12.2139 14.3937 12.3152 14.2924L17.207 9.40056C17.2999 9.3077 17.4101 9.23404 17.5315 9.18379C17.6528 9.13353 17.7828 9.10767 17.9141 9.10767H22.9999" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M9.07166 8.97363L15.4867 7.10344C15.7158 7.03664 15.9613 7.054 16.1788 7.1524L20.4999 9.10761" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M14 26.6077L10.2326 25.6658C10.0797 25.6276 9.938 25.5538 9.81907 25.4504L7 23" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Business</h4>
                <span>52,822 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-3">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M2.99933 12.1064H28.9993L29.0001 23.9999C29.0001 24.2651 28.8947 24.5195 28.7072 24.707C28.5196 24.8946 28.2653 24.9999 28.0001 24.9999H4.00006C3.73484 24.9999 3.48049 24.8946 3.29295 24.707C3.10542 24.5195 3.00006 24.2651 3.00006 23.9999L2.99933 12.1064Z" fill="#FD8E1F" />
                  <path d="M28 7H4C3.44772 7 3 7.44772 3 8V24C3 24.5523 3.44772 25 4 25H28C28.5523 25 29 24.5523 29 24V8C29 7.44772 28.5523 7 28 7Z" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M20.9994 21H24.9994" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M14.9993 21H16.9993" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M2.99933 12.1064H28.9993" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Finance & Accounting</h4>
                <span>33,841 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-4">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M27 13H5V19H27V13Z" fill="#E34444" />
                  <path d="M5 27V5" stroke="#E34444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5 7H21V13" stroke="#E34444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M27 13H5V19H27V13Z" stroke="#E34444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M17 19V25H5" stroke="#E34444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>IT & Software</h4>
                <span>22,649 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-2">
              <div class="category-content-left">
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
                <h4>Personal Development</h4>
                <span>63,476 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-6">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M4 26V7C4 6.73478 4.10536 6.48043 4.29289 6.29289C4.48043 6.10536 4.73478 6 5 6H27C27.2652 6 27.5196 6.10536 27.7071 6.29289C27.8946 6.48043 28 6.73478 28 7V26L24 24L20 26L16 24L12 26L8 24L4 26Z" fill="#1D2026" />
                  <path d="M9.5 13H22.5" stroke="#1D2026" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M9.5 17H22.5" stroke="#1D2026" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M4 26V7C4 6.73478 4.10536 6.48043 4.29289 6.29289C4.48043 6.10536 4.73478 6 5 6H27C27.2652 6 27.5196 6.10536 27.7071 6.29289C27.8946 6.48043 28 6.73478 28 7V26L24 24L20 26L16 24L12 26L8 24L4 26Z" stroke="#1D2026" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Office Productivity</h4>
                <span>13,932 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-1">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M5.27933 5.37337C5.13029 5.32991 4.97318 5.32173 4.82044 5.3495C4.6677 5.37728 4.52352 5.44023 4.39933 5.53337C4.27513 5.62652 4.17433 5.74731 4.1049 5.88616C4.03547 6.02502 3.99933 6.17813 3.99933 6.33337V23.6667C3.99933 23.822 4.03547 23.9751 4.1049 24.1139C4.17433 24.2528 4.27513 24.3736 4.39933 24.4667C4.52352 24.5599 4.6677 24.6228 4.82044 24.6506C4.97318 24.6783 5.13029 24.6702 5.27933 24.6267L17.0001 21.2082V8.79192L5.27933 5.37337Z" fill="#564FFD" />
                  <path d="M3.99933 6.33337V23.6667C3.99933 23.822 4.03547 23.9751 4.1049 24.1139C4.17433 24.2528 4.27513 24.3736 4.39933 24.4667C4.52352 24.5599 4.6677 24.6228 4.82044 24.6506C4.97318 24.6783 5.13029 24.6702 5.27933 24.6267L27.2793 18.21C27.487 18.1495 27.6695 18.0231 27.7993 17.85C27.9291 17.6769 27.9993 17.4664 27.9993 17.25V12.75C27.9993 12.5337 27.9291 12.3231 27.7993 12.15C27.6695 11.9769 27.487 11.8506 27.2793 11.79L5.27933 5.37337C5.13029 5.32991 4.97318 5.32173 4.82044 5.3495C4.6677 5.37728 4.52352 5.44023 4.39933 5.53337C4.27513 5.62652 4.17433 5.74731 4.1049 5.88616C4.03547 6.02502 3.99933 6.17813 3.99933 6.33337V6.33337Z" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M23 19.4581V24C23 24.2652 22.8946 24.5196 22.7071 24.7071C22.5196 24.8946 22.2652 25 22 25H18C17.7348 25 17.4804 24.8946 17.2929 24.7071C17.1054 24.5196 17 24.2652 17 24V8.79187" stroke="#564FFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Marketing</h4>
                <span>12,068 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-6">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M26 8H21.9993L19.9993 5H11.9993L9.99927 8H6C5.46957 8 4.96086 8.21071 4.58579 8.58579C4.21071 8.96086 4 9.46957 4 10V24C4 24.5304 4.21071 25.0391 4.58579 25.4142C4.96086 25.7893 5.46957 26 6 26H26C26.5304 26 27.0391 25.7893 27.4142 25.4142C27.7893 25.0391 28 24.5304 28 24V10C28 9.46957 27.7893 8.96086 27.4142 8.58579C27.0391 8.21071 26.5304 8 26 8V8ZM16 21C15.11 21 14.24 20.7361 13.4999 20.2416C12.7599 19.7471 12.1831 19.0443 11.8425 18.2221C11.5019 17.3998 11.4128 16.495 11.5865 15.6221C11.7601 14.7492 12.1887 13.9474 12.818 13.318C13.4474 12.6887 14.2492 12.2601 15.1221 12.0865C15.995 11.9128 16.8998 12.0019 17.7221 12.3425C18.5443 12.6831 19.2471 13.2599 19.7416 13.9999C20.2361 14.74 20.5 15.61 20.5 16.5C20.5 17.6935 20.0259 18.8381 19.182 19.682C18.3381 20.5259 17.1935 21 16 21V21Z" fill="#1D2026" />
                  <path d="M26 26H6C5.46957 26 4.96086 25.7893 4.58579 25.4142C4.21071 25.0391 4 24.5304 4 24V10C4 9.46957 4.21071 8.96086 4.58579 8.58579C4.96086 8.21071 5.46957 8 6 8H9.99927L11.9993 5H19.9993L21.9993 8H26C26.5304 8 27.0391 8.21071 27.4142 8.58579C27.7893 8.96086 28 9.46957 28 10V24C28 24.5304 27.7893 25.0391 27.4142 25.4142C27.0391 25.7893 26.5304 26 26 26Z" stroke="#1D2026" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M16 21C18.4853 21 20.5 18.9853 20.5 16.5C20.5 14.0147 18.4853 12 16 12C13.5147 12 11.5 14.0147 11.5 16.5C11.5 18.9853 13.5147 21 16 21Z" stroke="#1D2026" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Photography & Video</h4>
                <span>6,196 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-3">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M4.13848 9.32715C4.04778 9.48098 3.99997 9.6563 4 9.83487V22.1652C4 22.3426 4.04721 22.5169 4.13679 22.67C4.22637 22.8232 4.35509 22.9498 4.50974 23.0368L15.5097 29.2243C15.6594 29.3085 15.8283 29.3527 16 29.3527L16.0013 29.3527L16.1186 16L4.1385 9.32717L4.13848 9.32715Z" fill="#FD8E1F" />
                  <path d="M28 22.1651V9.83484C28 9.6574 27.9528 9.48316 27.8632 9.32999C27.7736 9.17683 27.6449 9.05025 27.4903 8.96326L16.4903 2.77576C16.3406 2.69157 16.1717 2.64734 16 2.64734C15.8283 2.64734 15.6594 2.69157 15.5097 2.77576L4.50974 8.96326C4.35509 9.05025 4.22637 9.17683 4.13679 9.32999C4.04721 9.48316 4 9.6574 4 9.83484V22.1651C4 22.3426 4.04721 22.5168 4.13679 22.67C4.22637 22.8232 4.35509 22.9497 4.50974 23.0367L15.5097 29.2242C15.6594 29.3084 15.8283 29.3526 16 29.3526C16.1717 29.3526 16.3406 29.3084 16.4903 29.2242L27.4903 23.0367C27.6449 22.9497 27.7736 22.8232 27.8632 22.67C27.9528 22.5168 28 22.3426 28 22.1651Z" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M22.1278 19.0639V12.5639L10 5.875" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M27.8621 9.3284L16.1186 16L4.13849 9.32715" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M16.1186 16L16.0013 29.3527" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Lifestyle</h4>
                <span>2,736 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-4">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M15.0008 7.00049L7.5412 9.79785C7.37689 9.85946 7.23168 9.96322 7.12017 10.0987C7.00866 10.2342 6.93476 10.3967 6.90592 10.5698L4.00079 28.0005L21.4315 25.0953C21.6046 25.0665 21.7671 24.9926 21.9026 24.8811C22.0381 24.7696 22.1418 24.6244 22.2034 24.4601L25.0008 17.0005L15.0008 7.00049ZM14.5001 20.0001C14.0056 20.0001 13.5223 19.8534 13.1111 19.5787C12.7 19.304 12.3796 18.9136 12.1904 18.4568C12.0011 18 11.9516 17.4973 12.0481 17.0123C12.1446 16.5274 12.3827 16.0819 12.7323 15.7323C13.0819 15.3827 13.5274 15.1446 14.0123 15.0481C14.4973 14.9516 15 15.0011 15.4568 15.1904C15.9136 15.3796 16.304 15.7 16.5787 16.1111C16.8534 16.5223 17.0001 17.0056 17.0001 17.5001C17.0001 17.8284 16.9354 18.1535 16.8098 18.4568C16.6841 18.7601 16.5 19.0357 16.2678 19.2678C16.0357 19.5 15.7601 19.6841 15.4568 19.8098C15.1535 19.9354 14.8284 20.0001 14.5001 20.0001Z" fill="#FF6636" />
                  <path d="M14.5 20C15.8807 20 17 18.8807 17 17.5C17 16.1193 15.8807 15 14.5 15C13.1193 15 12 16.1193 12 17.5C12 18.8807 13.1193 20 14.5 20Z" stroke="#FF6636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M4.00067 28.0004L12.7322 19.2677" stroke="#FF6636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M4.00067 28.0005L21.4314 25.0954C21.6045 25.0665 21.7669 24.9926 21.9024 24.8811C22.0379 24.7696 22.1417 24.6244 22.2033 24.4601L25.0007 17.0005L15.0007 7.00049L7.54106 9.79785C7.37675 9.85946 7.23155 9.96323 7.12004 10.0987C7.00853 10.2342 6.93464 10.3967 6.90579 10.5698L4.00067 28.0005Z" stroke="#FF6636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M25.0007 17.0003L28.2936 13.7074C28.3864 13.6146 28.4601 13.5043 28.5103 13.383C28.5606 13.2617 28.5865 13.1317 28.5865 13.0003C28.5865 12.869 28.5606 12.739 28.5103 12.6177C28.4601 12.4963 28.3864 12.3861 28.2936 12.2932L19.7078 3.70744C19.5202 3.51991 19.2659 3.41455 19.0007 3.41455C18.7355 3.41455 18.4811 3.51991 18.2936 3.70744L15.0007 7.00034" stroke="#FF6636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Design</h4>
                <span>2,600 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-2">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M27.001 9H5.00104C4.44875 9 4.00104 9.44772 4.00104 10V26C4.00104 26.5523 4.44875 27 5.00104 27H27.001C27.5533 27 28.001 26.5523 28.001 26V10C28.001 9.44772 27.5533 9 27.001 9Z" fill="#23BD33" />
                  <path d="M16 14.5V21.5" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M19.5 18H12.5" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M27.001 9H5.00104C4.44875 9 4.00104 9.44772 4.00104 10V26C4.00104 26.5523 4.44875 27 5.00104 27H27.001C27.5533 27 28.001 26.5523 28.001 26V10C28.001 9.44772 27.5533 9 27.001 9Z" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M21 9V7C21 6.46957 20.7893 5.96086 20.4142 5.58579C20.0391 5.21071 19.5304 5 19 5H13C12.4696 5 11.9609 5.21071 11.5858 5.58579C11.2107 5.96086 11 6.46957 11 7V9" stroke="#23BD33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Health & Fitness</h4>
                <span>1,678 Courses</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <a class="d-block" href="category.html">
            <div class="category-content  badge-color-3">
              <div class="category-content-left">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M4 17V24C4 24.5304 4.21071 25.0391 4.58579 25.4142C4.96086 25.7893 5.46957 26 6 26H8C8.53043 26 9.03914 25.7893 9.41421 25.4142C9.78929 25.0391 10 24.5304 10 24V19C10 18.4696 9.78929 17.9609 9.41421 17.5858C9.03914 17.2107 8.53043 17 8 17H4Z" fill="#FD8E1F" />
                  <path opacity="0.2" d="M24.1821 18H27.1821V24C27.1821 24.2652 27.0768 24.5196 26.8892 24.7071C26.7017 24.8946 26.4473 25 26.1821 25H24.1821C23.9169 25 23.6626 24.8946 23.475 24.7071C23.2875 24.5196 23.1821 24.2652 23.1821 24V19C23.1821 18.7348 23.2875 18.4804 23.475 18.2929C23.6626 18.1054 23.9169 18 24.1821 18Z" fill="#FD8E1F" stroke="#FD8E1F" stroke-width="2" />
                  <path d="M28.182 17H24.182C23.6515 17 23.1428 17.2107 22.7678 17.5858C22.3927 17.9609 22.182 18.4696 22.182 19V24C22.182 24.5304 22.3927 25.0391 22.7678 25.4142C23.1428 25.7893 23.6515 26 24.182 26H26.182C26.7124 26 27.2211 25.7893 27.5962 25.4142C27.9713 25.0391 28.182 24.5304 28.182 24V17ZM28.182 17C28.182 15.4165 27.8686 13.8486 27.2598 12.3868C26.651 10.925 25.759 9.59808 24.635 8.48262C23.5111 7.36715 22.1775 6.48517 20.7111 5.88751C19.2447 5.28986 17.6745 4.98834 16.091 5.00034C14.5075 4.98834 12.9373 5.28986 11.4709 5.88751C10.0045 6.48517 8.6709 7.36715 7.54695 8.48262C6.423 9.59808 5.53093 10.925 4.92217 12.3868C4.31341 13.8486 4 15.4165 4 17V24C4 24.5304 4.21071 25.0391 4.58579 25.4142C4.96086 25.7893 5.46957 26 6 26H8C8.53043 26 9.03914 25.7893 9.41421 25.4142C9.78929 25.0391 10 24.5304 10 24V19C10 18.4696 9.78929 17.9609 9.41421 17.5858C9.03914 17.2107 8.53043 17 8 17H4" stroke="#FD8E1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="category-content-right">
                <h4>Music</h4>
                <span>959 Courses</span>
              </div>
            </div>
          </a>
        </div> --}}
      </div>
      {{-- <div class="icon-bottom-btn mt-4">
        <p>We have more category & subcategory. <a href="category.html">Browse All
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.75 12H20.25" stroke="#FF6636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M13.5 5.25L20.25 12L13.5 18.75" stroke="#FF6636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </a></p>
      </div> --}}
    </div>
  </div>
  <!--End category-section -->
