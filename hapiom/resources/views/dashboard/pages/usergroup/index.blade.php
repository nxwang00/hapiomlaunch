@extends('dashboard.layouts.master')
@section('title', ' Group Type')
@section('page', ' Group Type')
@section('page-css-link') @endsection
@section('page-css')
<style>
    .all-users {
        line-height: 26px;
        opacity: .8;
        width: 35px;
        height: 35px;
        border-radius: 100%;
        overflow: hidden;
        border: 2px solid green;
        background-color: #ff5e3a;
        font-size: 14px;
        font-weight: 800;
        display: inline-block !important;
    }

    .hide {
        display: none;
    }
</style>
@endsection
@section('main-content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container">
        <div class="iq-card shadow-none p-0">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Groups</h4>
                </div>
            </div>
        </div>
        @include('dashboard.includes.alert')
        <div class="row">
            @foreach ($groups as $group)
            <div class="col-md-6 col-lg-4">
                <div class="iq-card">
                    <div class="top-bg-image">
                        <img src="{{ url('assets/dashboard/images/page-img/profile-bg1.jpg') }}" class="img-fluid w-100" alt="group-bg">
                    </div>
                    <div class="iq-card-body text-center">
                        <div class="group-icon">
                            @if(isset($group->image) && file_exists('images/group/'.$group->image))
                            <img src="{{ url('images/group/'.$group->image) }}" alt="profile-img" class="rounded-circle img-fluid avatar-120">
                            @else
                            <img src="{{ url('assets/dashboard/images/page-img/gi-1.jpg') }}" alt="profile-img" class="rounded-circle img-fluid avatar-120">
                            @endif
                        </div>
                        <div class="group-info pt-3">
                            <h4>
                                <a href="{{ route('group-detail', ['id'=>$group->groupmaster_id]) }}">{{ $group->name }}</a>
                            </h4>
                            <span>{{ count($group->friends) }} {{ 'Friends in the Group' }}</span>
                        </div>
                        <div class="group-member mb-3">
                            <div class="iq-media-group">
                                @if (count($group->friends) > 0)
                                    @foreach ($group->friends as $friend)
                                        @if ($loop->index < 5) @if(isset($friend->groupUserName->userInfo->profile_image))
                                        <a href="#" class="iq-media">
                                            <img class="img-fluid avatar-40 rounded-circle" src="{{ url('images/profile/',$friend->groupUserName->userInfo->profile_image) }}">
                                        </a>
                                        @else
                                        <a href="#" class="iq-media">
                                            <img class="img-fluid avatar-40 rounded-circle" src="{{url('assets/dashboard/img/default-avatar.png')}}">
                                        </a>
                                        @endif
                                        @elseif ($loop->index == 6)
                                        <a href="#" class="iq-media all-users bg-blue">+15</a>
                                        @endif
                                    @endforeach
                                @else
                                <div style="height: 40px"></div>
                                @endif
                            </div>
                        </div>
                        <div class="group-details d-inline-block pb-3">
                            <ul class="d-flex align-items-center justify-content-between list-inline m-0 p-0">
                                <li class="pl-3 pr-3">
                                    <p class="mb-0">Members: <span class="font-weight-bolder">{{ count($group->members) }}</span></p>
                                </li>
                            </ul>
                        </div>
                        @if (isset($group->member))
                            @if ($group->member->status === 0)
                            <button class="btn btn-secondary d-block w-100" onclick="onCancelRequest({{ json_encode($group) }})">Cancel request</button>
                            @elseif ($group->member->status === 1)
                            <button class="btn btn-outline-danger d-block w-100" onclick="onLeaveGroup({{ json_encode($group) }})">Leave group</button>
                            @else
                            <button class="btn btn-primary d-block w-100 joingroup" onclick="onJoinGroup({{ json_encode($group) }})">Join group</button>
                            @endif
                        @elseif($group->created_by == Auth::user()->id)
                        <button class="btn btn-outline-danger d-block w-100" onclick="onLeaveGroup({{ json_encode($group) }})">Leave group</button>
                        @else
                        <button class="btn btn-primary d-block w-100 joingroup" onclick="onJoinGroup({{ json_encode($group) }})">Join group</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



<!-- Window-popup Create Friends Group Add Friends -->

<!-- Modal -->
<div class="modal fade" id="joingroupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Join Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group is-select" method="post" action="{{ route('user-join-group') }}" id="joinGroupForm">
                @csrf
                <div class="modal-body">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12 mb30">
                        <div class="checkbox">
                            <input type="checkbox" id="agreeGroupTerms" checked>
                            <label for="agreeGroupTerms">Agree?</label>
                        </div>
                        <p class="term_condition"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="group_id" id="group_id" value="">
                    <button type="button" class="btn btn-primary" id="submitJoinBtn">Join Group</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmLeave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group is-select" method="post" action="{{ route('user-leave-group') }}">
                @csrf
                <div class="modal-body">
                    Are you confirm to leave current group?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="group_id" id="leave_group_id" value="">
                    <button type="submit" class="btn btn-primary" id="submitLeaveBtn">Leave Group</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="stripePaymentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gridModalLabel">Pay for joining group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user-pay-group') }}" method="post" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" autocomplete="off" class="require-validation" id="payment-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="paid_group_id" id="paid_group_id" />
                    <div class="form-group">
                        <label for="card_name">Full name (on the card)</label>
                        <input class="form-control card-name" type="text" id="card_name" name="card_name" required>
                    </div>
                    <div class="form-group">
                        <label for="card_number">Card number</label>
                        <div class="input-group">
                            <input type="text" class="form-control card-number" name="card_number" id="card_number" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fab fa-cc-visa" aria-hidden="true" style="font-size: 24px"></i>
                                    <i class="fab fa-cc-amex" aria-hidden="true" style="font-size: 24px; margin-left:5px"></i>
                                    <i class="fab fa-cc-mastercard" aria-hidden="true" style="font-size: 24px; margin-left:5px"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="form-group expiration">
                                <label>Expiration</label>
                                <div class="d-flex">
                                    <select class="form-control" id="expiration_month" name="expiration_month" required>
                                        <option value="" hidden>MM</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <select class="form-control" id="expiration_year" name="expiration_year" required>
                                        <option value="" hidden>YY</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="form-group cvc">
                                <label for="cvc">CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='CVC' size='4' type='text' id="card_cvc" name="card_cvc" required>
                            </div>
                        </div>
                    </div>
                    <div class='form-row row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try again.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">
                        Pay now
                        <span class="spinner-border spinner-border-sm ml-2 hide" role="status" aria-hidden="true" id="payment_loader"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<!-- ... end Window-popup Create Friends Group Add Friends -->
@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">
    let targetGroup = null;

    $(document).ready(function() {
        $("#agreeGroupTerms").on('change', () => {
            let checked = $("#agreeGroupTerms").is(':checked');
            if (checked) {
                $("#submitJoinBtn").removeAttr('disabled');
            } else {
                $("#submitJoinBtn").attr('disabled', 'true');
            }
        })

        $("#submitJoinBtn").on('click', () => {
            if (targetGroup.group_type === 0) {
                $("#joinGroupForm").submit();
            } else {
                $("#joingroupmodal").modal('hide');
                $('#stripePaymentModal').modal('show');
                $('#paid_group_id').val(targetGroup.id);
            }
        })
    })

    function onJoinGroup(group) {
        targetGroup = group;
        $(".term_condition").html(group.terms_and_condition);
        $("#group_id").val(group.id);
        $('#joingroupmodal').modal('show');
    }

    function onLeaveGroup(group) {
        $("#leave_group_id").val(group.id);
        $('#confirmLeave').modal('show');
    }

    function onCancelRequest(group) {
        $("#leave_group_id").val(group.id);
        $('#submitLeaveBtn').click();
    }
</script>
@endsection