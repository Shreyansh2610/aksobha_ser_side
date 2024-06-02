<div class="content-height">
    <style>
        body {
            background-color: rgb(239, 253, 239) !important;
        }
        .profile-container {
            max-width: 400px;
            margin: 50px auto;
            /* text-align: center; */
        }
        .profile-container .profile-pic {
            width: 80px;
            height: 80px;
            background-color: #e0e0e0;
            border-radius: 50%;
            display: inline-block;
        }
        .profile-container a {
            text-decoration: none;
        }
        .profile-container .profile-info {
            margin-top: 10px;
            font-size: 18px;
        }
        .profile-container .list-group-item {
            border: none;
        }
        .profile-container .list-group-item + .list-group-item {
            border-top: 1px solid #e0e0e0;
        }
        .profile-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
    <div class="d-flex align-items-center justify-content-center">
        <span class="h3" style="color: #509e7a">Profile</span>
    </div>
    <div class="container profile-container">
        <div class="d-flex">
            <div><img src="{{asset('assets/img/avatars/1.png')}}" alt="" srcset="" class="profile-pic"></div>
            &nbsp;
            <div class="profile-info d-flex align-items-center fs-3">{{auth()->user()->name}}</div>
        </div>

        <ul class="list-group list-group-flush mt-4">
            <a href="#" class="list-group-item list-group-item-action fs-4">
                <div class="d-flex justify-content-between align-items-center"><span>Personal information</span><i class="bx bx-right-arrow-alt"></i></div>
            </a>
            <a href="#" class="list-group-item list-group-item-action fs-4">
                <div class="d-flex justify-content-between align-items-center"><span>Settings</span><i class="bx bx-right-arrow-alt"></i></div>
            </a>
            <a href="#" class="list-group-item list-group-item-action fs-4">
                <div class="d-flex justify-content-between align-items-center"><span>Contact us</span><i class="bx bx-right-arrow-alt"></i></div>
            </a>
            <a href="{{route('logout')}}" class="list-group-item list-group-item-action fs-4">
                <div class="d-flex justify-content-between align-items-center"><span>Log out</span><i class="bx bx-right-arrow-alt"></i></div>
            </a>
        </ul>
        <div class="profile-footer mt-4">
            <div class="d-flex align-items-center justify-content-center flex-column mt-2">
                <a href="#">Terms Of Service</a><br>
                <a href="#">Privacy Policy</a><br>
                <a href="#">Returns & Refunds</a><br>
                <a href="#">Shipping Policy</a>
            </div>
        </div>
    </div>
</div>
