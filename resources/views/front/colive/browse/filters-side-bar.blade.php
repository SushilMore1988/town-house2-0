<div id="mySidenavTabs" class="sidetabs col-md-4 pl-md-0 clearfix pt-md-0 pt-5 colive-list-sidebar">
	<a href="javascript:void(0)" class="closetabBtn d-md-none d-lock mb-3" id="closeSideTab">
		<i class="far fa-times-circle"></i>
	</a>
  	<div class="card-listing-filter-tab pt-md-0 sticky-top-sidebar">
		<ul class="nav nav-tabs" role='tab-list'>
			<li class="nav-item">
				<a href="#coWorkerTab" data-toggle='tab' class="nav-link active text-uppercase n-bold f-9 tab-clicked" data-tab_clicked ="coWorkerTab">
					Basic
				</a>
			</li>
			<li class="nav-item">
				<a href="#meetingTab" data-toggle='tab' class="nav-link text-uppercase n-bold f-9 tab-clicked" data-tab_clicked ="meetingTab">
					PERSONALISE
				</a>
			</li>
		</ul>
		<div class="tab-content pt-lg-5">
			@include('front.colive.browse.co-live-filter-tab')
			@include('front.colive.browse.meeting-filter-tab')
			
		</div>
	</div>
</div>