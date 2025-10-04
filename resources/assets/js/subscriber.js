
$("#addons_btn").on('click',function(e){
    e.preventDefault();
    
    load_addons(); 
})

$("#ledger_btn").on('click',function(e){
    e.preventDefault();
    
    load_ledger(); 
})

$("#invoice_btn").on('click',function(e){
    e.preventDefault();
    
    load_invoice(); 
})

$("#activity_btn").on('click',function(e){
    e.preventDefault();
    
    load_activity(); 
})

$("#auth_logs_btn").on('click',function(e){
    e.preventDefault();
    
    load_auth_log(); 
})

$("#session_btn").on('click',function(e){
    e.preventDefault();
    
    load_session(); 
})




function load_addons(){
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
                                "url": baseUrl+"/subcriber/addon/fiberbeam-123", // Replace with your API URL
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
              
function load_ledger(){
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
                                "url": baseUrl+"/subcriber/ledger/fiberbeam-123", // Replace with your API URL
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
              
function load_invoice(){
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
                                "url": baseUrl+"/subcriber/invoiceList/fiberbeam-123", // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "tranID" },
                                { "data": "renewDate" },
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
                                        return `
                                            <button type="button" data-id="${row.id}" class="btn btn-warning btn-sm btn-wave update">Print</button>
                                        `;
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }
              
function load_activity(){
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
                                "url": baseUrl+"/subcriber/logs/fiberbeam-123", // Replace with your API URL
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
              
function load_auth_log(){
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
                                "url": baseUrl+"/bad_logs_single/fiberbeam-123", // Replace with your API URL
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
                                { "data": "nas" },
                                { "data": "mac" }
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
              
function load_session(){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#session_table')) {
                    $('#session_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#session_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/sessionsingle/waqas", // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "acctstarttime" },
                                { "data": "acctstoptime" },
                                { "data": "duration" },
                                { "data": "download" },
                                { "data": "upload" },
                                { "data": "nasipaddress" },
                                { "data": "callingstationid" }
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