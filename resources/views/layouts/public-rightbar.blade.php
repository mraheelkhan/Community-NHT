<div class="right-sidebar-mini right-sidebar">
    @php $all_users = App\Models\User::all(); @endphp
    <div class="right-sidebar-panel p-0">
        <div class="card shadow-none">
            <div class="card-body p-0">
                <h4 class="p-3 pb-0"> Other members</h4>
                <hr/>
                <div class="media-height p-3" data-scrollbar="init">
                    @foreach($all_users as $member)
                        <a href="{{ route('public.profile', $member->username) }}" class="card-link">
                    <div class="d-flex align-items-center mb-4">
                        <div class="iq-profile-avatar status-away">
                            <img class="rounded-circle avatar-50" src="{{ $member->image }}" alt="">
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"> {{ $member->full_name }}</h6>
                            <p class="mb-0"> {{ __('Member') }}</p>
                        </div>
                    </div>
                        </a>
                    @endforeach
                </div>
                <div class="right-sidebar-toggle bg-primary text-white mt-3">
                    <i class="ri-arrow-left-line side-left-icon"></i>
                    <i class="ri-arrow-right-line side-right-icon"><span class="ms-3 d-inline-block">Close
                           Menu</span></i>
                </div>
            </div>
        </div>
    </div>
</div>
