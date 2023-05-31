@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
<div class="modal modal-blur fade" id="planModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('prepare.payment.stripe', $selected_plan->plan_id) }}" method="post" id="payment-form">
                @csrf
                <div class="modal-body">
                    <div class="modal-title">{{ __('Card Information')}}</div>
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('Close')}}</button>
                    <button class="btn btn-primary mt-2" type="submit">Submit</button>

                    {{--                    <a class="btn plan_btn" id="plan_id">{{ __('Yes, proceed')}}</a>--}}
                </div>
            </form>

        </div>
    </div>
</div>


@push('custom-js')
    <script>
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/apikeys
        var stripe = Stripe('pk_test_51L5UFzIY8R27Jx6MlEfgNVpFow84IBg39WyKJUBXUkkWx4X4CqOqTorr6niTxjH6RQmSyxXqzAKvdo2SiDkJJ38r003mprYVyL');
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: '#32325d',
            },
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the customer that there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>
@endpush
