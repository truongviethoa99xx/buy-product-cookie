<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('css\index.css')}}" />
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" type="text/css" href="{{asset('css\bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css\dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css\select2.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css\base.css')}}" />
        <link rel="stylesheet" href="{{asset('css\grid.css')}}" />
        <link rel="stylesheet" href="{{asset('css\reponsive.css')}}" />
        <link rel="stylesheet" href="{{asset('css\styles.css')}}" />
        <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
        

    </head>
    <body>
       <div id="toast"></div>
        <header class="header">
            <div class="grid wide">
                <!-- header with search -->
                <div class="header-with-search">
                    <div class="header__logo hide-on-tablet">
                        <a href="/layout" class="header__logo-link">
                            <div class="header__logo-img">
                                <img src="{{asset('images\logo.png')}}" alt="Logo" />
                            </div>
                        </a>
                    </div>
                    <input type="checkbox" hidden id="mobile-search-checkbox" class="header__search-checkbox" />
                    <!-- Search -->
                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input id="search" type="text" class="header__search-input" placeholder="T??n s???n ph???m, ho???c gi??" />
                        </div>
                        <div class="header__search-menu">
                            <a class="header__search-menu-select">Ch???n danh m???c</a>
                            <i class="header__search-menu-icon bx bx-chevron-down"></i>
                            <div class="header__search-menu-wrap">
                                <ul class="header__search-menu-list">
                                    <li data-id="1" class="header__search-menu-item">
                                        <span class="header__search-menu-sp">N?????c u???ng</span>
                                    </li>
                                    <li data-id="2" class="header__search-menu-item">
                                        <span class="header__search-menu-sp">????? ch??i</span>
                                    </li>
                                    <li data-id="3" class="header__search-menu-item">
                                        <span class="header__search-menu-sp">Xe m??y</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Cart layout -->
                    <div class="header__cart">
                        <a href="{{url('/cart')}}">
                            <div class="header__cart-wrap">
                                <i class="header__cart-icon bx bx-cart"></i>
                                <span class="header__cart-quantity"><p></p></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js\jquery.dataTables.min.js')}}"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
        integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

        
    <script type="text/javascript" src="{{asset('js/course/index.js')}}"></script>
    <script type="text/javascript" src="{{asset('js\bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    



  

    <script src="{{asset('js\dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js\data-table-custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('js\select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js\select2-custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/course/cart.js')}}"></script>
    <script>
       function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");

        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
            if (e.target.closest(".toast__close")) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        };

        const icons = {
            success: "fas fa-check-circle",
            info: "fas fa-info-circle",
            warning: "fas fa-exclamation-circle",
            error: "fas fa-exclamation-circle",
        };
        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);

        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
        main.appendChild(toast);
    }
}

    </script>
    @stack('scripts')
</html>
