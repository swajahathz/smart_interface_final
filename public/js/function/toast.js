function showToast(type,header,message) {
    // Set the message for the toast body
    document.querySelector('#dangerToast .toast-body').textContent = message;
    document.querySelector('#dangerToast .header').textContent = header;
    // Initialize the toast
    var toastElement = document.getElementById('dangerToast');

    var backtoastElement = document.getElementById('backToast');
    backtoastElement.classList.remove('bg-danger'); // Remove existing background classes
    backtoastElement.classList.add(type);

    toastElement.classList.remove('bg-danger-transparent'); // Remove existing background classes
    toastElement.classList.add(type+'-transparent');
   


    var toast = new bootstrap.Toast(toastElement);

    // Show the toast
    toast.show();
}