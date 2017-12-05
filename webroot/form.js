var pledgeForm = {
    init: function () {
        jQuery('#pledge-form').submit(function (event) {
            event.preventDefault();

            var button = jQuery('#pledge-form button[type=submit]').first();
            button.attr('disabled', 'disabled');
            var loading = jQuery('<img src="https://pledge.honestmuncie.org/img/loading.gif" id="pledge-loading" alt="Loading..." style="margin-left: 5px; vertical-align: text-bottom;" />');
            button.after(loading);

            var name = jQuery('#pledge-form input[name=name]').val();
            var version = jQuery('#pledge-form input[type=radio]:checked').val();
            var params = "name=" + encodeURIComponent(name) + "&version=" + version;

            var req = new XMLHttpRequest();
            req.open("GET", "https://pledge.honestmuncie.org/?" + params, true);
            req.responseType = "blob";
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            req.onload = function () {
                var blob = new Blob([req.response], {type: 'application/pdf'});
                var filename = 'honest-muncie-pledge.pdf';

                if (navigator.msSaveOrOpenBlob) {
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    var link = document.createElement('a');
                    document.body.appendChild(link);
                    link.href = window.URL.createObjectURL(blob);
                    link.download = filename;
                    link.click();
                }

                button.attr('disabled', null);
                jQuery('#pledge-loading').remove();
            };

            req.send();
        });
    }
};
