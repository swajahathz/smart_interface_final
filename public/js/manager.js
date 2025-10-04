$("#service_btn").on('click',function(e){
    e.preventDefault();
    
    let userId = $(this).attr("data-userId");
    let rolesId = $(this).attr("data-rolesId");
    
    
    load_service(userId,rolesId);
    load_withoutassingservice(userId); 
});

$("#subscriber_btn").on('click',function(e){
    e.preventDefault();
    
    let user_id = $(this).attr("data-userId");
    load_subscriber(user_id); 
});


$("#ledger_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_ledger(username); 
})

$("#managerledger_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_managerledger(username); 
})

$("#invoice_btn").on('click',function(e){
    e.preventDefault();
    
    let username = $(this).attr("data-username");
    load_invoice(username); 
})

function load_service(id,rolesId){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#service_table')) {
                    $('#service_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#service_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/assignservice/"+id+"/"+rolesId, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "service.srvname" },
                                { "data": "totalPrice" },
                                { "data": "commission" },
                                { "data": "total" },
                                { "data": "totaluser" },
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
                                    targets: -1,  // Last column for action buttons
                                    searchable: false,
                                    orderable: false,
                                    render: function(data, type, row, meta) {
                                        let buttons = `
                                            <button type="button" data-srv_id="${row.srvid}" data-user_id="${row.user_id}" data-commission="${row.commission}" class="btn btn-warning btn-sm btn-wave update">Update</button>
                                        `;
                                
                                        if (row.totaluser == 0) {
                                            buttons += `
                                                <button type="button" data-srv_id="${row.srvid}" data-user_id="${row.user_id}" class="btn btn-danger btn-sm btn-wave alert-confirm">Unassign</button>
                                            `;
                                        }else{
                                            buttons += `
                                                <button type="button" class="btn btn-danger btn-sm btn-wave" disabled>Unassign</button>
                                            `;
                                        }
                                
                                        return buttons;
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              } 
              
            
              
function load_withoutassingservice(id){
                    $.ajax({
                        url: baseUrl+'/withoutassignservice/'+id, // Replace with your API URL
                        type: 'GET',
                        dataType: 'json', // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                },
                        success: function(response) {
                            let dropdown = $('#serviceDropdown');
                            dropdown.empty().append('<option value="">Select Service</option>'); // Reset dropdown
                            
                            $.each(response, function(index, item) {
                                dropdown.append('<option value="' + item.srvid + '">' + item.service.srvname + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data:', error);
                        }
                    });
              } 
              
              
function load_subscriber(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#subscriber_table')) {
                    $('#subscriber_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#subscriber_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/subscriber/"+id, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "username" },
                                { "data": "address" },
                                { "data": "mobile" },
                                { "data": "srvid.srvname" },
                                { "data": "expiration" }
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
                                    "targets": 1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                                   const initials = (
  (row.firstname?.charAt(0) || '') + 
  (row.lastname?.charAt(0) || '')
).toUpperCase();
                                        const ed = row.subscriber_enable === 1 ? 'bg-success-transparent' : 'bg-danger-transparent';
                                        return `
                                            <div class="d-flex">
                                                            <div class="lh-1">
                                                                <span class="avatar avatar-sm avatar-rounded ${ed} fw-semibold">
                                                                        ${initials}
                                                                    </span>
                                                            </div>
                                                            <div class="ms-2">
                                                                <p class="fw-semibold mb-0 d-flex align-items-center"><a href="/subscriber_info/${row.username}">  ${row.firstname} ${row.lastname ? row.lastname : ''}</a></p>
                                                                <p class="fs-12 text-muted mb-0">${row.username}</p>
                                                            </div>
                                                        </div>
                                        `;
                                    }
                                },
                                {
                                    "targets": 4,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" class="btn btn-primary btn-sm btn-wave" style="font-size: .65rem;">${row.srvid.srvname}</button>
                                        `;
                                    }
                                },
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
                                "url": baseUrl+"/manager/walletledger/"+id, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "tranId" },
                                { "data": "datetime" },
                                { "data": "particular" },
                                { "data": "type" },
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
              
function load_managerledger(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#managerledger_table')) {
                    $('#managerledger_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#managerledger_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/manager/ledger/"+id, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "tranId" },
                                { "data": "datetime" },
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
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/manager/invoice/"+id, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "tranID" },
                                { "data": "datetime" },
                                { "data": "Invtype" },
                                { "data": "payment_type" },
                                { "data": "amount" },
                                { "data": "remarks" },
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
                                            <button type="button" data-id="${row.id}" class="btn btn-warning btn-sm btn-wave update">Print</button>
                                        `;
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }