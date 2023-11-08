<script type="text/javascript">
    var isPhoneShown = true,
        countryData = window.intlTelInputGlobals.getCountryData(),
        input = document.querySelector("#phone-code");

    for (var i = 0; i < countryData.length; i++) {
        var country = countryData[i];
        if (country.iso2 == 'bd') {
            country.dialCode = '88';
        }
    }

    var iti = intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "us";
                callback(countryCode);
            });
        },
        separateDialCode: true,
        utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
        onlyCountries: @php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
        customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
            if (selectedCountryData.iso2 == 'bd') {
                return "01xxxxxxxxx";
            }
            return selectedCountryPlaceholder;
        }
    });

    var country = iti.getSelectedCountryData();
    $('input[name="country_code"]').val(country.dialCode);

    setInterval(() => {
        var thecode = $('.iti__flag-container')[0].innerText.replace('+','');
        if(thecode.length < 5) {
            $('input[name="country_code"]').val(thecode);
        }
    }, 1000);

    input.addEventListener("countrychange", function(e) {
        // var currentMask = e.currentTarget.placeholder;
        var country = iti.getSelectedCountryData();
        $('input[name="country_code"]').val(country.dialCode);

    });

    function toggleEmailPhone(el) {
        if (isPhoneShown) {
            $('.phone-form-group').addClass('d-none');
            $('.email-form-group').removeClass('d-none');
            isPhoneShown = false;
            $(el).html('{{ translate('Use Phone Instead') }}');
        } else {
            $('.phone-form-group').removeClass('d-none');
            $('.email-form-group').addClass('d-none');
            isPhoneShown = true;
            $(el).html('{{ translate('Use Email Instead') }}');
        }
    }
</script>