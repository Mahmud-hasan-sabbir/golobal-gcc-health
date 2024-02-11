$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function errorCallbackFunc(data){
    if (data.responseJSON.errors) {
        $.each(data.responseJSON.errors, function (k, v) {
            if (isArray(v)) {
                $.each(v, function (n, m) {
                    toastr.error(m)
                })
            } else {
                if (v !== '') {
                    toastr.error(v);
                }
            }
        });
    }
}

function ajaxCallAsyncCallbackAPI(url, data, method, callback,errorCallback) {
    $.ajax({
        async: true,
        type: method,
        url: url,
        data: data,
        cache: false,
        success: function (data, textStatus) {
            callback(data);
        },
        error: function (data) {
           if (errorCallback){
               errorCallback(data);
           }
           else {
               errorCallbackFunc(data);
           }
        },
    });
}