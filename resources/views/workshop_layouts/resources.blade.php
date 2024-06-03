<div class="content-height">
    <div class="d-flex align-items-center justify-content-center">
        <span class="h3" style="color: #509e7a">Resources</span>
    </div>
    <br>
    <input type="text" name="search_area" class="form-control m-2" placeholder="Enter Resources" data-href="{{route('faq',['id'=>$workshop->id])}}" value="{{optional($request)->search}}">

    <div class="m-2">
        @forelse ($workshop->faqs->groupBy('day') as $faqs)
            <div class="container my-5" style="border-bottom-color: rgb(233, 255, 233);">
                <h2>Day {{$faqs->first()->day}}</h2>
                <h5 class="text-muted">{{$faqs->first()->days->title}}</h5>
                <div class="accordion accordion-header-primary" id="accordion_day_{{$faqs->first()->day}}" style="background-color: rgb(233, 255, 233);">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading_{{$faq->id}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse_{{$faq->id}}" aria-expanded="false" aria-controls="collapse_{{$faq->id}}">
                                    {{$faq->question}}
                                </button>
                            </h2>
                            <div id="collapse_{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="heading_{{$faq->id}}"
                                data-bs-parent="#accordion_day_{{$faqs->first()->day}}">
                                <div class="accordion-body">
                                    {{nl2br($faq->answer)}}
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    $('[name="search_area"]').on('change',function() {
        setTimeout(() => {
            $.ajax({
            type: "GET",
            url: $(this).data('href'),
            data: {search:$(this).val()},
            dataType: "JSON",
            success: function (response) {
                $("#content-section").html(response.html);
            },
            error: function (response) {
                if(response.responseJSON.message=="Unauthenticated.") {
                    window.location.reload();
                }
            },
        });
        }, 1000);

    });
</script>
