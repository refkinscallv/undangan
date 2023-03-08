function error_alert(r,o,f = false){
    if(f == true){
        return Swal.fire({
            title:r,
            html:o,
            icon:"error",
            confirmButtonColor:"var(--red)",
            confirmButtonText:"Tutup"
        }).then(() => {
            location.reload();
        })
    } else {
        return Swal.fire({
            title:r,
            html:o,
            icon:"error",
            confirmButtonColor:"var(--red)",
            confirmButtonText:"Tutup"
        })
    }
}

function success_alert(r,o,f = false){
    if(f == true){
        return Swal.fire({
            title:r,
            html:o,
            icon:"success",
            confirmButtonColor:"var(--green)",
            confirmButtonText:"Ok"
        }).then(() => {
            location.reload();
        })
    } else {
        return Swal.fire({
            title:r,
            html:o,
            icon:"success",
            confirmButtonColor:"var(--green)",
            confirmButtonText:"Ok"
        })
    }
}

function show_hide(id, toggle){
    var thisID      = $("#"+ id);
    var thisToggle  = $("#"+ toggle);

    if(thisID.prop("type") == "password"){
        thisToggle.html("<i class='fas fa-eye-slash'></i>");
        thisID.prop("type", "text");
    } else {
        thisToggle.html("<i class='fas fa-eye'></i>");
        thisID.prop("type", "password");
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}