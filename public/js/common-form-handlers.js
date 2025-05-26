// Common form handling functions
const CommonFormHandlers = {
    // Initialize toastr configuration
    initToastr: function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "2000",
        };
    },

    clearValidationErrors: function () {
        $(".is-invalid").removeClass("is-invalid");
        $(".invalid-feedback-server").text("");
        $(".invalid-feedback-client").text("");
    },

    initFormSubmission: function (
        formSelector,
        submitButtonSelector,
        modalSelector,
    ) {
        $(formSelector).on("submit", function (e) {
            e.preventDefault();
            var form = $(this);
            var submitButton = $(submitButtonSelector);
            // var formData = form.serialize();
            var formData = new FormData(this);
            var formAction = form.attr("action");
            var formMethod = $("#form_method").val();

            if (formMethod === "PUT") {
                formData.append("_method", "PUT");
            }

            submitButton.prop("disabled", true);
            submitButton.find(".indicator-label").hide();
            submitButton.find(".indicator-progress").show();
            CommonFormHandlers.clearValidationErrors();

            $.ajax({
                url: formAction,
                // type: formMethod === "POST" ? "POST" : "PUT",
                type: "POST",
                data: formData,

                processData: false, // ফাইল আপলোডের জন্য জরুরি
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        if (response.toastr) {
                            toastr[response.toastr.type](
                                response.toastr.message,
                                response.toastr.title,
                            );
                        }
                        $(modalSelector).modal("hide");
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    }
                },
                error: function (xhr) {
                    submitButton.prop("disabled", false);
                    submitButton.find(".indicator-label").show();
                    submitButton.find(".indicator-progress").hide();

                    if (xhr.status === 422) {
                        var response = xhr.responseJSON;
                        if (response.toastr) {
                            toastr[response.toastr.type](
                                response.toastr.message,
                                response.toastr.title,
                            );
                        }
                        $.each(response.errors, function (field, messages) {
                            if (field === "brand_logo") {
                                // Special handling for image input
                                $(".image-input").addClass("is-invalid");
                                $(".card-body.text-center")
                                    .find(".invalid-feedback-server")
                                    .text(messages[0]);
                            } else {
                                // Regular form fields
                                var input = $('[name="' + field + '"]');
                                input.addClass("is-invalid");
                                input
                                    .closest(".form-floating")
                                    .find(".invalid-feedback-server")
                                    .text(messages[0]);
                            }
                        });
                    } else {
                        toastr.error(
                            "An error occurred. Please try again.",
                            "Error",
                        );
                    }
                },
            });
        });
    },

    initModalReset: function (modalSelector) {
        $(modalSelector).on("hidden.bs.modal", function () {
            $(this).find("form")[0].reset();
            CommonFormHandlers.clearValidationErrors();
        });
    },

    initDeleteConfirmation: function () {
        $(".show_confirm").click(function (event) {
            event.preventDefault();
            var form = $(this).closest("form");
            swal({
                title: "Are you sure ?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    },
    // product create page
    initPageFormSubmission: function (formSelector, submitButtonSelector) {
        $(formSelector).on("submit", function (e) {
            e.preventDefault();

            const form = $(this);
            const submitButton = $(submitButtonSelector);
            const formData = new FormData(this);
            const formAction = form.attr("action");
            const formMethod = "POST";

            // Disable button and show loading
            submitButton.prop("disabled", true);
            submitButton.find(".indicator-label").hide();
            submitButton.find(".indicator-progress").show();

            CommonFormHandlers.clearValidationErrors();

            $.ajax({
                url: formAction,
                type: formMethod,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content",
                    ),
                    Accept: "application/json",
                },
                success: function (response) {
                    if (response.success) {
                        if (response.toastr) {
                            toastr[response.toastr.type](
                                response.toastr.message,
                                response.toastr.title,
                            );
                        } else {
                            toastr.success(
                                response.message || "Operation successful",
                                response.title || "Success",
                            );
                        }

                        if (response.redirect) {
                            setTimeout(function () {
                                window.location.href = response.redirect;
                            }, 1500);
                        } else {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1500);
                        }
                    }
                },
                error: function (xhr) {
                    submitButton.prop("disabled", false);
                    submitButton.find(".indicator-label").show();
                    submitButton.find(".indicator-progress").hide();

                    let response = {};
                    try {
                        response =
                            xhr.responseJSON || JSON.parse(xhr.responseText);
                    } catch (e) {
                        console.error("Failed to parse error response", e);
                    }

                    if (xhr.status === 422 && response.errors) {
                        if (response.toastr) {
                            toastr[response.toastr.type](
                                response.toastr.message,
                                response.toastr.title,
                            );
                        }

                        $.each(response.errors, function (field, messages) {
                            const input = $(`[name="${field}"]`);
                            let container = input.closest(".fv-row");
                            if (!container.length)
                                container = input.closest(".form-group");
                            if (!container.length)
                                container = input.closest(".mb-10");

                            input.addClass("is-invalid");

                            let errorContainer = container.find(
                                ".invalid-feedback-server",
                            );
                            if (!errorContainer.length) {
                                errorContainer = $(
                                    '<div class="invalid-feedback-server text-danger mt-1"></div>',
                                );
                                input.after(errorContainer);
                            }

                            errorContainer.text(messages[0]);
                        });
                    } else {
                        toastr.error(
                            response.message ||
                                "An unexpected error occurred. Please try again.",
                            "Error",
                        );
                    }
                },
            });
        });
    },
};
