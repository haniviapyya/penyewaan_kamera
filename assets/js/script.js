// JAM DIGITAL

function updateClock() {
    const now = new Date();

    const jam = document.getElementById("jam");

    if (jam) {
        jam.innerHTML = now.toLocaleTimeString("id-ID");
    }
}

setInterval(updateClock, 1000);
updateClock();


// PENCARIAN REALTIME

const searchInput = document.getElementById("searchKamera");

if (searchInput) {

    searchInput.addEventListener("keyup", function () {

        let keyword = this.value.toLowerCase();

        let rows = document.querySelectorAll("#tabelKamera tbody tr");

        rows.forEach(function (row) {

            let isiBaris = row.textContent.toLowerCase();

            if (isiBaris.includes(keyword)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }

        });

    });

}


// DARK MODE

// Terapkan dark mode saat halaman dibuka
if (localStorage.getItem("darkMode") === "enabled") {
    document.body.classList.add("dark-mode");
}

// Tombol dark mode
const darkModeBtn = document.getElementById("darkModeBtn");

if (darkModeBtn) {
    darkModeBtn.addEventListener("click", function () {

        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
        } else {
            localStorage.setItem("darkMode", "disabled");
        }

    });
}

// VALIDASI FORM TAMBAH KAMERA

const formKamera = document.getElementById("formKamera");

if (formKamera) {

    formKamera.addEventListener("submit", function (e) {

        const nama =
            document.getElementById("nama_kamera").value.trim();

        const harga =
            document.getElementById("harga_sewa").value;

        const stok =
            document.getElementById("stok").value;

        if (nama.length < 3) {

            alert("Nama kamera minimal 3 karakter!");
            e.preventDefault();
            return;

        }

        if (harga <= 0) {

            alert("Harga sewa harus lebih dari 0!");
            e.preventDefault();
            return;

        }

        if (stok < 0) {

            alert("Stok tidak boleh negatif!");
            e.preventDefault();
            return;

        }

    });

}