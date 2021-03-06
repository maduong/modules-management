<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="small-box bg-green">
        <div class="inner">
            <h3>{{ $count or 0 }} <small class="font-white">{{ trans('edutalk-modules-management::base.plugins') }}</small></h3>
            <p>{{ trans('edutalk-core::base.status.activated') }}: <b>{{ $count or 0 }}</b></p>
        </div>
        <div class="icon">
            <i class="icon-paper-plane"></i>
        </div>
        <a href="{{ route('admin::plugins.index.get') }}" class="small-box-footer">
            {{ trans('edutalk-core::base.stat_box.more_info') }} <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
