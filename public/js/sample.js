document.querySelector('.menu-toggle').addEventListener('click', function() {
    const nav = document.querySelector('.dashboard-nav');
    nav.classList.toggle('mobile-show'); // Tambahkan atau hapus kelas mobile-show
});
