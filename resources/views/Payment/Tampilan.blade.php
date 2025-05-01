<form id="payment-form">
    <button type="button" id="pay-button">Pay Now</button>
</form>

<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        window.snap.pay('{{ $snap_token }}'); // Token dari API Midtrans
    };
</script>