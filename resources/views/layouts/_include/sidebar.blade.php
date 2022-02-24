<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a>
        <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
    </div>
</div>

<div class="sidebar-inner slimscrollleft">

    <div id="sidebar-menu">
        <ul>
            {{-- <li class="menu-title">Main</li> --}}

            <li>
                <a href="/{{ auth()->user()->role }}/dashboard" class="waves-effect">
                    <i class="mdi mdi-airplay"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span>
                        Satya Lancana </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="#">Data Usulan</a></li>
                    <li><a href="#">Input Usulan</a></li>
                </ul>
            </li>



        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
