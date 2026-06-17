function updateClock() {
    const now = new Date();

    const jam = document.getElementById("jam");

    if (jam) {
        jam.innerHTML = now.toLocaleTimeString("id-ID");
    }
}

setInterval(updateClock, 1000);
updateClock();

// Pencarian realtime kamera

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