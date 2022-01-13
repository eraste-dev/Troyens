function Toast(title, message, type = "success") {
    $.notify(
        {
            title: title,
            message: message,
        },
        {
            type: type,
            allow_dismiss: false,
            newest_on_top: true,
            mouse_over: true,
            showProgressbar: false,
            spacing: 10,
            timer: 5000,
            placement: {
                from: "top",
                align: "right",
            },
            offset: {
                x: 30,
                y: 30,
            },
            delay: 1000,
            z_index: 10000,
            animate: {
                enter: "animated bounce",
                exit: "animated bounce",
            },
        }
    );
}
