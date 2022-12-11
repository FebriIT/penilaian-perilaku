<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        {{-- <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a> --}}
        <a href="/" class="logo"><img src="{{ asset('img/bg.png') }}" height="80" alt="logo"></a>
        <h5></h5>
    </div>
</div>

<div class="sidebar-inner slimscrollleft">

    <div id="sidebar-menu">
        <ul>
            {{-- <li class="menu-title">{{ auth()->user()->username }}</li> --}}

            

            {{-- <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span>
                        Satya Lancana </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="/{{auth()->user()->role}}/satyalancana">Data Usulan</a></li>
                    <li><a href="/{{auth()->user()->role}}/inputsatyalancana">Input Usulan</a></li>
                </ul>
            </li> --}}
            
            
            @if (auth()->user()->role=='admin')
            <li>
                <a href="/{{ auth()->user()->role }}/dashboard" class="waves-effect">
                    <i class="mdi mdi-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="/{{auth()->user()->role}}/datauser" class="waves-effect">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    <span> Data User </span>
                </a>
            </li>
            {{--  <li>
                <a href="/{{ auth()->user()->role }}/opd" class="waves-effect">
                    <i class="mdi mdi-domain"></i>
                    <span> OPD </span>
                </a>
            </li>  --}}
            <li>
                <a href="/{{ auth()->user()->role }}/pertanyaan" class="waves-effect">
                    <i class="mdi mdi-domain"></i>
                    <span> Pertanyaan </span>
                </a>
            </li>
            @endif
            <li>
                <a href="/{{ auth()->user()->role }}/penilaian" class="waves-effect">
                    <i class="mdi mdi-domain"></i>
                    <span> Penilaian </span>
                </a>
            </li>
            @if(auth()->user()->role=='admin')
            <li>
                <a href="/admin/pengaturan" class="waves-effect">
                    <i class="mdi mdi-settings"></i>
                    <span> Pengaturan </span>
                </a>
            </li>
            @endif



        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
