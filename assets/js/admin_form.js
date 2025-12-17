// Generate Admin

function tampilkan_password() {
    document.getElementById("password").type = "text";
}

function sembunyikan_password() {
    document.getElementById("password").type = "password";
}

// CONTACT

function showNotif(message = "Saran berhasil dikirim!") {
    const n = document.getElementById("notif_saran");
    n.textContent = message;  // isi teks
    n.style.display = "block";

    setTimeout(() => {
        n.style.display = "none";
    }, 3000);
}