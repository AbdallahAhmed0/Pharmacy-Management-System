<style>
    li.dropdown:hover,
    li.dropdown:active,
    .activeField {
        font-weight: 700;
        background-color: #00d0f1;
        color: white;
        margin-left: 12px;
        margin-right: 12px;
        border-radius: 5px;
        transition: all 0.2s ease-in-out 0s;
    }


    .class-btn:hover {
        font-weight: 700;
        color: white;
        background-color: red;
        border: solid #1b5a90;
        transition: all 0.2s ease-in-out 0s;
    }
</style>

<aside id="left-panel" class="left-panel pt-3" style="background-color: #1b5a90;">
    <nav class="navbar navbar-expand-sm navbar-default" style="background-color: #1b5a90;">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul id="myDIV" class="nav navbar-nav">
                <li class="dropdown activeField">
                    <a href="{{ route('dashboard') }}" class="text-white"><i
                            class="text-white menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title text-white">Tables</li><!-- /.menu-title -->

                @if (auth()->user()->is_admin)
                    <li class=" dropdown">
                        <a href="{{ route('categories.index') }}" class="dropdown-toggle text-white"> <i
                                class="menu-icon fa fa-list-alt text-white"></i>Categories</a>
                    </li>
                    <li class=" dropdown">
                        <a href="{{ route('products.index') }}" class="text-white dropdown-toggle"> <i
                                class="menu-icon fa fa-file-text-o text-white"></i>Products</a>
                    </li>
                @endif

                <li class=" dropdown">
                    <a href="{{ route('purchases.index') }}" class="text-white dropdown-toggle"> <i
                            class="text-white menu-icon fa fa-star-o"></i>Purchases</a>
                </li>
                <li class=" dropdown">
                    <a href="{{ route('sales.index') }}" class="dropdown-toggle text-white"> <i
                            class="menu-icon fa fa-bar-chart-o text-white"></i>Sales</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-flag text-white"></i>Reports</a>
                    <ul class="sub-menu children dropdown-menu" style="background-color: #00d0f1 ">
                        <li class="dropdown-list"><i class="fa fa-star-o text-white"></i><a href="{{ route('purchase.getReport') }}"
                                class="text-white">Purchases</a></li>
                        <li class="dropdown-list"><i class="fa fa-bar-chart-o text-white"></i><a href="{{ route('sales.report') }}"
                                class="text-white">Sales</a></li>
                    </ul>
                </li>
                @if (auth()->user()->is_admin)
                    <li class=" dropdown">
                        <a href="{{ route('suppliers.index') }}" class="dropdown-toggle text-white"> <i
                                class="menu-icon fa fa-user-o text-white"></i>Supplier</a>
                    </li>
                    <li class=" dropdown">
                        <a href="{{ route('user.index') }}" class="dropdown-toggle text-white"> <i
                                class="menu-icon fa fa-users text-white"></i>Users</a>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
        {{-- <div class="panel-footer"
            style="margin-left: 23px;
            margin-right: 23px; transition: all 0.2s ease-in-out 0s;">
            <buttons-bar>
                <div class="text-center">
                    <a href="{{ route('products.restoreArchive', $v['id']) }}" title="restore"><button
                            class="btn btn-primary class-btn"
                            style="margin-top: 39px; color: white; border: solid #1b5a90 ; width: 100%; border-radius: 10px">
                            <i class="fa fa-sign-out"></i> Log out</button></a>
                </div>
            </buttons-bar>
        </div> --}}
    </nav>
</aside>

<script>
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("dropdown");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("activeField");
            current[0].className = current[0].className.replace(" activeField", "");
            this.className += " activeField";
        });
    }
</script>
