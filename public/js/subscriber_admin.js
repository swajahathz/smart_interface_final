
$("#addons_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_addons(username); 
})

$("#ledger_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_ledger(username); 
})

$("#invoice_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_invoice(username); 
})

$("#activity_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_activity(username); 
})

$("#auth_logs_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_auth_log(username); 
})

$("#session_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_session(username); 
})




$('#addon_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#addon_form input, #addon_form button').prop('disabled', true);
            $('#addonsubmitBtn').hide();
            $('#loadingBtn').show();

          
            // Prepare form data
            let formData = {
                name: $('#name').val(),
                addonPrice: $('#addonPrice').val(),
                staticip: $('#staticip').val(),
                username: u,
            };

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/addonadd',  // Replace with your API endpoint
                type: 'POST',
                data: JSON.stringify(formData),
                contentType: 'application/json',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log(response.status);

                    if (response.status === 1) {
                        showToast("bg-success","Addon Added.",response.message)
                        $('#modaldemo8').modal('hide');
                        load_addons(u); 
                        $('#addon_form')[0].reset();
                    } 
                    else if (response.status === 2) {
                        // ALREADY NAS AVALIABLE
                        // showToast("bg-warning","NAS IP Already Found.",response.message);

                        showAlert(response.message,"warning");

                        // alert(response.message);
                    } else if (response.status === 3) {
                        // ALREADY NAS AVALIABLE
                        // showToast("bg-warning","NAS IP Already Found.",response.message);

                        showAlert(response.message,"warning");

                        // alert(response.message);
                    } 
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        showAlert(response.message,"danger");
                    }
                    else if (response.status === 500) {
                        //RADIUS SERVER ERROR
                        showAlert(response.message,"danger");
                    }
                    else if (response.status === 404) {
                        //RADIUS SERVER ERROR
                        showAlert(response.message,"danger");
                    }
                    
                    
                },
                error: function (xhr, status, error) {
                    console.error(status);
                    showAlert('Something Wrong!',"danger");
                },
                complete: function () {
                // Hide the Loading button and show the Submit button again

                $('#addon_form input, #addon_form button').prop('disabled', false);
                $('#loadingBtn').hide();
                $('#addonsubmitBtn').show();
                 }
            });
});


$('#addons_table').on('click', '.alert-confirm', function() {
   
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(e => {
            if (e.isConfirmed) {
                // Perform AJAX request here

                let id = $(this).data("id");
                $.ajax({
                    url: baseUrl+'/addondelete/'+id, // replace with your API URL
                    method: 'POST',
                    data: {
                        // Add any necessary data here
                    },
                    contentType: 'application/json',
                    headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                    success: function(response) {
                        if (response.status === 1) { // Check if status is 1
                            Swal.fire("Deleted!", "Your addon has been deleted successfully.", "success");
                            load_addons(u); 
                        } else {
                            Swal.fire("Error!", "There was an issue deleting the data.", "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error!", "An unexpected error occurred.", "error");
                    }
                });
            }
        });
    
});


function load_addons(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#addons_table')) {
                    $('#addons_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#addons_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/subcriber/addon/"+id, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "name" },
                                { "data": "addonPrice" },
                                { "data": null }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,  // Target the first column for serial number
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1; // Generate serial number based on row index
                                    }
                                },
                                {
                                    "targets": -1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" data-id="${row.id}" class="btn btn-warning btn-sm btn-wave update">Update</button>
                                            <button type="button" data-id="${row.id}" class="btn btn-danger btn-sm btn-wave alert-confirm">Delete</button>
                                        `;
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }  
              
function load_ledger(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#ledger_table')) {
                    $('#ledger_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#ledger_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/subcriber/ledger/"+id, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "tranId" },
                                { "data": "particular" },
                                { "data": "debit" },
                                { "data": "credit" },
                                { "data": "balance" }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,  // Target the first column for serial number
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1; // Generate serial number based on row index
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }  
              
function load_invoice(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#invoice_table')) {
                    $('#invoice_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#invoice_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "drawCallback": function (settings) {
        var api = this.api();

        // poore table ke rows
        var allRows = api.rows().nodes();
        var lastIndex = allRows.length - 1;

        // sab buttons disable karo
        $(allRows).find("button.refund").prop("disabled", true);

        // sirf poore table ka last button enable karo
        if (lastIndex >= 0) {
            $(allRows).eq(lastIndex).find("button.refund").prop("disabled", false);
        }
    },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/subcriber/invoiceList/"+id, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "tranID" },
                                { "data": "invType"},
                                { "data": "qty" }
                                ,
                                { "data": "renewDate" },
                                { "data": "lastExpirationDate" },
                                { "data": "newExpirationDate" },
                                 { 
                                    "data": "newExpirationDate",
                                    "render": function(data, type, row) {
                                        if (!data) return "N/A";
                        
                                        let expirationDate = new Date(data);
                                        let currentDate = new Date();
                        
                                        if (expirationDate < currentDate) {
                                            return '<span class="text-danger">Expire</span>';
                                        } else {
                                            let diffMs = expirationDate - currentDate;
                                            let diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
                                            let diffHrs = Math.floor((diffMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            let diffMins = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
                        
                                            return `<span class="text-success">Valid for ${diffDays}d ${diffHrs}h</span>`;
                                        }
                                    }
                                },
                                { "data": "ownerPrice" },
                                { "data": null }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,  // Target the first column for serial number
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1; // Generate serial number based on row index
                                    }
                                },
                                {
                                    "targets": -1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        
                                      var tranId = row.tranID;
                                var rowId = meta.row;

//                                     if (rowId === 0) {
//                                         // first row ka button disable nahi karna
//                                     } else {
//                                         // previous row ka button disable karna
//                                         let prevBtn = document.getElementById(String(rowId - 1));
//                                         if (prevBtn) {
//                                             prevBtn.disabled = true;
//                                         }
// }
                                       
                                      
                        
                                        let expirationDate = new Date(row.newExpirationDate);
                                             let currentDate = new Date();
                        
                                        if (expirationDate < currentDate) {
                                                // expired invoice -> refund button disable, sirf print allow
                                                        return `<button class="btn btn-warning btn-sm btn-wave" disabled>Used</button>
                                                                <a href="/print/${tranId}" target="_blank" class="btn btn-warning btn-sm btn-wave print">Print</a>`;
                                                    } else {
                                                        // valid invoice -> refund + print dono allow
                                                        return `<button class="btn btn-danger btn-sm btn-wave refund" data-tranId="${tranId}" id="${rowId}">Refund</button>
                                                                <a href="/print/${tranId}" target="_blank" class="btn btn-warning btn-sm btn-wave print">Print</a>`;
                                                    }
                                        
                                      
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }
              
function load_activity(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#activity_table')) {
                    $('#activity_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#activity_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/subcriber/logs/"+id, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "created_at" },
                                { "data": "particular" },
                                { "data": "actionBy" }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,  // Target the first column for serial number
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1; // Generate serial number based on row index
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }
              
function load_auth_log(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#auth_logs_table')) {
                    $('#auth_logs_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#auth_logs_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/bad_logs_single/"+id, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "authdate" },
                                { "data": "pass" },
                                { "data": "reply" },
                                { "data": "type" },
                                { "data": "nas" },
                                { "data": "mac" },
                                
                                {
                                    "data": "type",
                                    "render": function (data, type, row) {
                                      if (data === "Wrong Password.") {
                                            return `<button data-pass="${row.pass}" data-subscriber="${row.username}" class="btn btn-danger btn-sm logs_change_pass">Set Password</button>`;
                                        } else if (data === "Account Expired") {
                                            return `<button class="btn btn-danger btn-sm openRechargeTab" data-bs-target="#recharge">Recharge Account</button>`;

                                        } else {
                                            return data; // show text normally if not "Wrong Password." or "Account Expired"
                                        }
                                    }
                                }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,  // Target the first column for serial number
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1; // Generate serial number based on row index
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }
              

              
