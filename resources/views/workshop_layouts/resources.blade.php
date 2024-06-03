<div class="content-height">
    <div class="d-flex align-items-center justify-content-center">
        <span class="h3" style="color: #509e7a">Resources</span>
    </div>
    <br>
    <input type="text" name="search_area_resource" class="form-control m-2" placeholder="Enter Resources" data-href="{{route('resources',['id'=>$workshop->id])}}" value="{{optional($request)->search}}">

    <div class="m-2">
        @forelse ($workshop->resources->groupBy('day') as $resources)
            <div class="container my-5 border-bottom border-secondary" style="border-bottom-color: rgb(233, 255, 233);">
                <h2>Day {{$resources->first()->day}}</h2>
                <h5 class="text-muted">{{$resources->first()->days->title}}</h5>
                {{-- <div class="row"> --}}
                    {{-- @dd($resources) --}}
                    @foreach ($resources as $resource)
                        {{-- @dd($resource) --}}

                        <a href='{{asset("resources/$resource->resource_link")}}' target="_blank" rel="noopener noreferrer">
                        <div class="row mb-2">
                            <div class="col-4">
                                <img src='{{asset("resources/$resource->title_icon_link")}}' alt="" class="h-100 w-100 rounded">
                            </div>
                            <div class="col-8">
                                <p class="h5">{{$resource->title}}</p>
                                <p class="h6">{{$resource->description ?? ''}}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                {{-- </div> --}}
            </div>
        @empty
            <div class="d-flex align-items-center justify-content-center">
                <div class="h3 text-center" style="color: #509e7a">No FAQ Found.</div>
            </div>
        @endforelse
    </div>
</div>

<script>
    $('[name="search_area_resource"]').on('change',function() {
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
