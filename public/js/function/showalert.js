function showAlert(msg,type) {
    // Create the alert HTML dynamically
    var alertHTML = `
        <div class="alert alert-solid-${type} alert-dismissible fade show" role="alert">
            <div id="alert_text">${msg}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="bi bi-x"></i>
            </button>
        </div>
    `;
    
    // Append the alert to the container
    $(".alert-container").html(alertHTML);

    // Optionally, automatically close the alert after 5 seconds
    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000);  // Adjust time as needed
}