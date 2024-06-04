<!-- open_window_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Open Window Example</title>
    <script>
        // Fungsi untuk menutup jendela setelah waktu tertentu
        function closeWindowAfterTime() {
            // Waktu dalam milidetik (misal: 5000 ms = 5 detik)
            var timeInSeconds = 5;

            setTimeout(function(){
                window.close();
            }, timeInSeconds * 1000); // Mengonversi detik ke milidetik
        }

        // Panggil fungsi closeWindowAfterTime saat halaman selesai dimuat
        window.onload = closeWindowAfterTime;
    </script>
</head>
<body>
    <h2>Open Window Example</h2>
    <p>Jendela ini akan ditutup secara otomatis setelah beberapa detik.</p>
</body>
</html>
