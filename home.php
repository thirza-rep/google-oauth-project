<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Simulasi login dummy
    $_SESSION['user'] = [
        'name' => 'Admin Kelompok 4',
        'picture' => 'img/admin.jpg'
    ];
}
$user = $_SESSION['user'];

$berita = [
    [
        'judul' => 'Retno Dwi Pangestika',
        'isi' => 'Kamu lebih kuat dari yang kamu pikirkan, dan lebih mampu dari yang kamu bayangkan. Selalu percaya pada dirimu sendiri, bahkan ketika orang lain meragukanmu.',
        'tanggal' => '22230018',
        'link' => 'https://github.com/redkaapangestika',
        'role' => 'Front-End Developer',
        'foto' => 'retno.jpg'
    ],
    [
        'judul' => 'Prasetio Umbu Sangaji Pateduk',
        'isi' => 'Kesuksesan tidak datang secara instan, ia adalah hasil dari usaha yang konsisten. Percayalah pada proses, bukan hanya pada hasil.',
        'tanggal' => '22230024',
        'link' => 'https://github.com/tioA81',
        'role' => 'Back-End Developer',
        'foto' => 'tio.jpg'
    ],
    [
        'judul' => 'M. Thirza Salendra',
        'isi' => 'Setiap tantangan adalah kesempatan untuk tumbuh dan belajar. Jangan menyerah hanya karena perjalanan terasa berat.',
        'tanggal' => '22230029',
        'link' => 'https://github.com/thirza-rep/',
        'role' => 'Data Analyst',
        'foto' => 'thirza.jpg'
    ],
    [
        'judul' => 'Langgeng Prayitno',
        'isi' => 'Ketika dunia jahat kepadamu, maka berusahalah untuk menghadapinya, karena tidak ada orang yang membantumu jika kau tidak berusaha.',
        'tanggal' => '22230013',
        'link' => 'https://github.com/Langgengprayitno',
        'role' => 'Full-Stack Developer',
        'foto' => 'langgeng.jpg'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portofolio Kelompok 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">Portofolio</div>
        <div class="nav-center">
            <form class="search-box" autocomplete="off">
                <input type="text" name="q" placeholder="Cari anggota...">
            </form>
        </div>
        <div class="nav-right">
            <div class="profile-dropdown">
                <button class="profile-btn" type="button">
                    <img src="<?php echo $user['picture']; ?>" alt="Foto Profil">
                    <span><?php echo $user['name']; ?></span>
                </button>
                <div class="dropdown-content">
                    <a href="#">Profil Saya</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        <h2>Anggota Kelompok 4</h2>
        <p>Total anggota: <strong><?php echo count($berita); ?></strong></p>
        <div class="berita" id="berita-list">
            <?php foreach ($berita as $item): ?>
            <div class="berita-item">
                <img src="<?php echo $item['foto']; ?>" alt="Foto" class="berita-foto">
                <div class="berita-judul"><?php echo $item['judul']; ?></div>
                <div class="berita-role"><?php echo $item['role']; ?></div>
                <div class="berita-tanggal">ID: <?php echo $item['tanggal']; ?></div>
                <div class="berita-isi"><?php echo $item['isi']; ?></div>
                <a class="github-link" href="<?php echo $item['link']; ?>" target="_blank">🔗 GitHub</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle dropdown profil
            const profileBtn = document.querySelector('.profile-btn');
            const dropdown = document.querySelector('.profile-dropdown');

            if (profileBtn && dropdown) {
                profileBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('show');
                });

                document.addEventListener('click', function () {
                    dropdown.classList.remove('show');
                });
            }

            // Filter anggota saat diketik
            const searchInput = document.querySelector('input[name="q"]');
            const beritaItems = document.querySelectorAll('.berita-item');

            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase();
                beritaItems.forEach(function (item) {
                    const title = item.querySelector('.berita-judul').textContent.toLowerCase();
                    const id = item.querySelector('.berita-tanggal').textContent.toLowerCase();
                    if (title.includes(query) || id.includes(query)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
