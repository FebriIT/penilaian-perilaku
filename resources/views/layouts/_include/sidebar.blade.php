<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        {{-- <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a> --}}
        <a href="/" class="logo"><img src="{{ asset('img/bg.png') }}" height="80" alt="logo"></a>
    </div>
</div>

<div class="sidebar-inner slimscrollleft">

    <div id="sidebar-menu">
        <ul>
            {{-- <li class="menu-title">Main</li> --}}

            <li>
                <a href="/{{ auth()->user()->role }}/dashboard" class="waves-effect">
                    <i class="mdi mdi-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            {{-- <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span>
                        Satya Lancana </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="/{{auth()->user()->role}}/satyalancana">Data Usulan</a></li>
                    <li><a href="/{{auth()->user()->role}}/inputsatyalancana">Input Usulan</a></li>
                </ul>
            </li> --}}
            <li>
                <a href="/{{auth()->user()->role}}/satyalancana" class="waves-effect">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    <span> Satya Lancana </span>
                </a>
            </li>
            @if (auth()->user()->role=='admin')

            <li>
                <a href="/{{ auth()->user()->role }}/opd" class="waves-effect">
                    <i class="mdi mdi-domain"></i>
                    <span> OPD </span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('logout') }}" class="waves-effect">
                    <i class="mdi mdi-logout"></i>
                    <span> Logout </span>
                </a>
            </li>



        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
