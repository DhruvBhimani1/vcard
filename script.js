$(document).ready(function () {
    function clearformfields() {
        $("#first_name").val("");
        $("#last_name").val("");
        $("#email_work").val("");
        $("#email_home").val("");
        $("#company").val("");
        $("#phone_work").val("");
        $("#phone_home").val("");
        $("#city").val("");
        $("#state").val("");
        $("#job_title").val("");
        $("#website").val("");
        $("#note").val("");
    }

    $(document).on("submit", "#contact_form", function (event) {
        event.preventDefault();
        $("#errortitle_messages, #errortitle2_messages, #success_messages").text("").hide();
        var formData = new FormData(this);
        formData.append('action', 'add_contact');
        var first_name = $("#first_name").val();
        var phone_work = $("#phone_work").val();
        var phone_home = $("#phone_home").val();
        if (first_name.trim() === "") {
            $("#errortitle_messages").text("Please note that the First name is a required field and must be filled out before saving the contact.").show();
            window.scrollTo(0, 0);
            return;
        }

        if (phone_work.trim() === "" && phone_home.trim() === "") {
            $("#errortitle2_messages").text("Please note that the Phone Number is a required field and must be filled out before saving the contact.").show();
            window.scrollTo(0, 0);
            return;
        }
        $.ajax({
            url: "action.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.status === "error") {
                    $("#errortitle_messages").text(response.message).show();
                    window.scrollTo(0, 0);
                } else {
                    $("#errortitle_messages").text("").hide();
                    $("#success_messages").text("contact saved successfully!").show();
                    window.scrollTo(0, 0);

                    setTimeout(function () {
                        clearformfields();
                        $("#errortitle_messages, #errortitle2_messages, #success_messages").text("").hide();
                    }, 5000);
                }
            },
            error: function (xhr, status, error) {
                window.scrollTo(0, 0);
                $("#errortitle_messages").text("An error occurred while processing your request. Please try again later.").show();
            }
        });
    });

    let offset = 0;
    const limit = 2;

    function loadContacts() {
        $.ajax({
            url: 'load_contact.php',
            type: 'GET',
            data: {
                limit: limit,
                offset: offset
            },
            success: function (response) {
                const contacts = JSON.parse(response);
                if (contacts.length > 0) {
                    contacts.forEach(contact => {
                        $('#contacts').append(`
                            <div class="rounded-lg bg-white shadow-md overflow-hidden">
                                <div class="p-6">
                                    <h2 class="text-lg font-semibold text-gray-800">Contact Information</h2>
                                    <hr class="my-4">

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-sm text-gray-600">First Name:</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.firstname}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Last Name:</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.lastname}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Phone (Work):</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.phonework}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Phone (Home):</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.phonehome || '-'}</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 mt-4">
                                        <div>
                                            <p class="text-sm text-gray-600">Email (Work):</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.emailwork}</p>
                                        </div>
                                        <div>
                                                <p class="text-sm text-gray-600">Email (Home):</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.emailhome || '-'}</p>
                                            </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Address:</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.city} ${contact.state}</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 mt-4">
                                        <div>
                                            <p class="text-sm text-gray-600">Company:</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.company}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Job Title:</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.jobtitle}</p>
                                        </div>
                                        
                                        <div>
                                            <p class="text-sm text-gray-600">Website:</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.website || '-'}</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 mt-4">
                                        <div>
                                            <p class="text-sm text-gray-600">Note:</p>
                                            <p class="text-lg font-medium text-gray-900">${contact.note || '-'}</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-center mt-6">
                                        <a href="${contact.vcardFileName}" class="text-blue-500 hover:underline">Download vCard</a>
                                    </div>
                                </div>
                                <div class="bg-gray-100 px-6 py-4">
                                    <div class="flex justify-center">
                                        <img src="${contact.qrCodePath}" alt="QR Code" class="w-32 h-32">
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                    offset += limit;
                    if (contacts.length < limit) {
                        $('#loadMore').hide();
                    } else {
                        $('#loadMore').show();
                    }
                }
            }
        });
    }
    loadContacts();

    $('#loadMore').click(function () {
        loadContacts();
    });
});
