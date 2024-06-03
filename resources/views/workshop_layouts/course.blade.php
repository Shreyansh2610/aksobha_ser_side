<div class="content-height">
    <div class="d-flex align-items-center justify-content-center">
        <span class="h3" style="color: #509e7a">{{ $workshop->workshop_title }}</span>
    </div>
    <br>
    {{-- <input type="text" name="search_area" class="form-control m-2" placeholder="Enter FAQ" data-href="{{route('faq',['id'=>$workshop->id])}}" value="{{optional($request)->search}}"> --}}

    <div class="m-2">
        @forelse ($workshop->days as $day)
            <div class="card mb-4 border-success border-sm">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src='{{ asset("images/days/$day->image_link") }}' class="w-100 h-100" alt=""
                            srcset="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card-title">Day {{ $day->day }}</div>
                            <div class="card-text">Biggest Learning {{ $day->description }}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row d-flex mx-0">
                            <button type="button" class="col-4 btn btn-success get-data"
                                data-href="{{ route('workshopShow', ['id' => $workshop->id]) }}"
                                onclick="resourceClick()">Resources</button>
                            <button type="button" class="col-4 btn btn-success get-data"
                                data-href="{{ route('workshopShow', ['id' => $workshop->id]) }}"
                                onclick="faqClick()">FAQ</button>
                            <button type="button" class="col-4 btn btn-success get-data"
                                data-href="{{ route('workshopShow', ['id' => $workshop->id]) }}"
                                onclick="resourceClick()">Notes</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex align-items-center justify-content-center">
                <div class="h3 text-center" style="color: #509e7a">No FAQ Found.</div>
            </div>
        @endforelse
    </div>
</div>

<script>
    function faqClick() {
        $('#faqBtn').filter('.nav-btns').trigger('click');
    }

    function resourceClick() {
        $('#faqResourceBtn').filter('.nav-btns').trigger('click');
    }

    function todayClick() {
        $('#faqTodayBtn').filter('.nav-btns').trigger('click');
    }

    function notesClick() {
        $('#faqResourceBtn').filter('.nav-btns').trigger('click');
    }
    $_workshop.layoutPage();
</script>
