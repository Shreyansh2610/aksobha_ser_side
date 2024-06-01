<div class="content-height">
    <div class="d-flex align-items-center justify-content-center">
        <span class="h3" style="color: #509e7a">Current Workshops</span>
    </div>
    @forelse ($workshops as $workshop)
        <div class="card mb-3" style="color: #509e7a">
            <div class="card-header d-flex align-center"
                style='background-image: url({{ asset("images/workshops/$workshop->img") }});background-size:cover; height:300px;'>
                <div class="" style="display: flex;align-items:flex-end;">
                    <div>
                        <h4 class="card-title text-white">{{$workshop->workshop_title}}</h4>
                        <h5 class="card-text text-white">Start date:
                            {{ \Carbon\Carbon::parse($workshop->start_date)->format('d-m-Y') }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body text-center pt-3">
                <div class="workshop-details">
                    <div class="border-end border-success">
                        <i class="far fa-calendar-alt" style="color: #509e7a"></i>
                        <p>Duration</p>
                        <p>{{$workshop->workshop_days}} days</p>
                    </div>
                    <div class="border-end border-success">
                        <i class="far fa-clock" style="color: #509e7a"></i>
                        <p>Timing</p>
                        <p>{{\Carbon\Carbon::parse($workshop->start_time)->format('H A').' - '.\Carbon\Carbon::parse($workshop->end_time)->format('H A')}}</p>
                    </div>
                    <div >
                        <i class="bx bx-volume-full" style="color: #509e7a"></i>
                        <p>Language</p>
                        <p>{{'English'}}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center p-0">
                <div class="d-grid">
                    <a href="#" class="btn btn-success">Enter Workshop</a>
                </div>
            </div>
        </div>
    @empty
    <div class="d-flex align-items-center justify-content-center">
        <div class="h3 text-center" style="color: #509e7a">No Workshops Found. Register for workshops</div>
    </div>
    @endforelse

    <div class="d-grid align-items-center">
        <a href="#" class="btn btn-success">Register for workshop</a>
    </div>
</div>
