$('.like-btn').click(function() {
    var imgId = $(this).parent().parent().parent().attr('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('like') }}",
        data: {
            'imgId': imgId
        },
        type: 'post',
        success: function(response) {
            if (response == 0) {
                window.location = "{{ route('auth') }}"
            }
            let data = JSON.parse(response);
            if (data[0] == "liked") {
                $('#like-' + imgId).css('color', 'red');
                $('#like-span-' + imgId).text(data[1])
            } else {
                $('#like-' + imgId).css('color', 'black');
                $('#like-span-' + imgId).text(data[0])
            }
        }

    })
})