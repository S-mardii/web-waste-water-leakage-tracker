<h5>
    Reports
    <span class="badge badge-secondary">
        {{ count($datas['Low']['data']) + count($datas['Medium']['data']) + count($datas['Serious']['data']) }}
    </span>
</h5>

<div class="row">
    <div class="offset-2"></div>
    <div class="col text-center">
        <div class="circle fine">
            <span class="circle">
                {{ count($datas['Low']['data']) }}
            </span>
        </div>
        <div class="">
            <h5><span class="badge fine text-white">Low</span></h5>
        </div>
    </div>

    <div class="col text-center">
        <div class="circle warning">
            <span class="circle">
                {{ count($datas['Medium']['data']) }}
            </span>
        </div>
        <div class="">
            <h5><span class="badge warning text-white">Medium</span></h5>
        </div>
    </div>

    <div class="col text-center">
        <div class="circle serious">
            <span class="circle">
                {{ count($datas['Serious']['data']) }}
            </span>
        </div>
        <div class="">
            <h5><span class="badge serious text-white">Serious</span></h5>
        </div>
    </div>
    <div class="offset-2"></div>
</div>