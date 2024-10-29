$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $button = $form.find('button');
        const $message = $('#message');
        
        // Disable button and show loading state
        $button.prop('disabled', true).text('Mengirim...');
        
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: $form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $message
                        .removeClass('error')
                        .addClass('success')
                        .text(response.message)
                        .fadeIn();
                    $form[0].reset();
                } else {
                    $message
                        .removeClass('success')
                        .addClass('error')
                        .text(response.message)
                        .fadeIn();
                }
            },
            error: function() {
                $message
                    .removeClass('success')
                    .addClass('error')
                    .text('Terjadi kesalahan. Silakan coba lagi.')
                    .fadeIn();
            },
            complete: function() {
                $button.prop('disabled', false).text('Kirim');
                
                // Hide message after 5 seconds
                setTimeout(function() {
                    $message.fadeOut();
                }, 5000);
            }
        });
    });
});
