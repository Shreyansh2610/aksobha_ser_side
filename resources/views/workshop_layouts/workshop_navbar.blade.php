{{-- <nav class="navbar"> --}}
{{-- <div class="row">
    <div class="col-4">
        <div class="d-flex align-items-center justify-content-center">
            <a href="javascript:;" class="w-100 border border-success">
                <div class="d-flex align-items-center justify-content-center">

                    <i class="bi bi-clock-history"></i>
                </div>
                <span>Previous</span>
            </a>
        </div>
    </div>
    <div class="col-4"></div>
    <div class="col-4"></div>
</div> --}}
{{-- </nav> --}}


<ul class="nav nav-pills nav-fill bg-white p-1 position-fixed bottom-0 start-0 w-100 translate-end" style="background-color: white;z-index:10000;">
    <li class="nav-item">
        <a class="nav-link nav-btns" href="javascript:;" data-href="/faq/{{$workshop->id}}" id="faqBtn">
            <div class="d-flex align-items-center flex-column flex-sm-row">
                <i class="bx bx-help-circle"></i><span class="fw-bold">FAQ</span>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link nav-btns" href="javascript:;" data-href="/course/{{$workshop->id}}" id="faqCourseBtn">
            <div class="d-flex align-items-center flex-column flex-sm-row">
                <i class="bx bx-trophy bx-sm"></i><span class="fw-bold">Course</span>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link nav-btns active" href="javascript:;" data-href="/today/{{$workshop->id}}" id="faqTodayBtn">
            <div class="d-flex align-items-center flex-column flex-sm-row">
                <i class="bx bx-check-circle bx-sm"></i><span class="fw-bold">Today</span>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link nav-btns" href="javascript:;" data-href="/resources/{{$workshop->id}}" id="faqResourceBtn">
            <div class="d-flex align-items-center flex-column flex-sm-row">
                <i class="bx bx-library bx-sm"></i><span class="fw-bold">Resources</span>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link nav-btns" target="_BLANK" href="https://www.facebook.com">
            <div class="d-flex align-items-center flex-column flex-sm-row">
                <i class="bx bx-smile bx-sm"></i><span class="fw-bold">Community</span>
            </div>
        </a>
    </li>
</ul>

