@if ($user->kyc_status === 'pending')
    <!-- Message Start -->
    <div class="message">
        <div class="message-icon">
            <img src="{{asset('images/menu-icon/icon-6.png')}}" alt="">
        </div>
        <div class="message-content">
            <p>
                Your Mentor account is under review. You will be able to start creating courses after your account is approved.
                <br/>
                This should take between a few hours to a few days.
            </p>
        </div>
    </div>
    <!-- Message End -->
@endif
