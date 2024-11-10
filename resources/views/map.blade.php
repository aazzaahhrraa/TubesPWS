@extends('layouts.app')

@section('title', 'Find a Food - Pencarian Makanan')

<style>
    

    .judul {
        text-align: center;
        margin: 100px 0 60px;
        font-size: 36px;
        color: #ffffff;
        z-index: 2;
        position: relative;
    }

    #info-box {
        margin: 20px auto;
        padding: 10px;
        width: 60%;
        text-align: center;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 12px;
        font-size: 18px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 2;
        position: relative;
    }

    #info-box input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-top: 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-sizing: border-box;
    }

    #map-container {
        width: 100%;
        text-align: center;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    #indonesia-map {
        width: 60%;
        height: auto;
        margin: 0 auto;
        z-index: 2;
        position: relative;
        margin-left: 340px;
    }

    #city-image {
        width: 300px;
        height: auto;
        margin: 20px auto;
        display: block;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 2;
        position: relative;
    }
</style>

<body>

    <!-- Judul Halaman -->
    <h1 class="judul">Cari Makanan Berdasarkan Provinsinya</h1>

    <!-- Kontainer untuk Peta -->
    <div id="map-container">
        <object id="indonesia-map" type="image/svg+xml" data="{{ asset('images/indonesia.svg') }}"></object>
    </div>

    <!-- Kotak untuk menampilkan nama wilayah dan input pencarian -->
    <div id="info-box">
        <div id="info-text">Pilih wilayah pada peta atau cari disini</div>
        <input type="text" id="search-box" placeholder="Cari wilayah..." />
    </div>

    <!-- Gambar representasi kota -->
    <img id="city-image" src="{{ asset('images/default-city.jpg') }}" alt="City Image" />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const homeCarouselImg = parent.document.getElementById('home-carousel-img');
            
            if (homeCarouselImg) {
                homeCarouselImg.style.transition = 'transform 0.8s ease, opacity 0.8s ease';
                homeCarouselImg.style.transform = 'scale(0.6)';
                homeCarouselImg.style.opacity = '0.8';
            }
        });

        document.getElementById('indonesia-map').addEventListener('load', function () {
            const svgDoc = this.contentDocument;
            const paths = svgDoc.querySelectorAll('path');
            const infoBox = document.getElementById('info-box');
            const infoText = document.getElementById('info-text');
            const searchBox = document.getElementById('search-box');
            const cityImage = document.getElementById('city-image');

            paths.forEach(function (path) {
                path.addEventListener('mouseover', function () {
                    path.setAttribute('fill', 'black');
                    path.style.transform = 'scale(1.02)';

                    paths.forEach(function (otherPath) {
                        if (otherPath !== path) {
                            otherPath.style.opacity = '0.2';
                        }
                    });

                    const title = path.getAttribute('title');
                    searchBox.value = title; // Tampilkan nama wilayah di kotak pencarian

                    // Ubah gambar kota
                    switch (title) {
                        case 'Sumatera Utara':
                            cityImage.src = "{{ asset('images/sumatera-utara.jpg') }}";
                            break;
                        case 'Bali':
                            cityImage.src = "{{ asset('images/bali.jpg') }}";
                            break;
                        case 'Bangka Belitung':
                            cityImage.src = "{{ asset('images/bangka-belitung.jpg') }}";
                            break;
                        case 'Bengkulu':
                            cityImage.src = "{{ asset('images/bengkulu.jpg') }}";
                            break;
                        case 'Banten':
                            cityImage.src = "{{ asset('images/banten.jpg') }}";
                            break;
                        default:
                            cityImage.src = "{{ asset('images/default-city.jpg') }}";
                    }
                });

                path.addEventListener('mouseout', function () {
                    path.removeAttribute('fill');
                    path.style.transform = 'scale(1)';

                    paths.forEach(function (otherPath) {
                        otherPath.style.opacity = '1';
                    });

                    searchBox.value = ''; // Kosongkan kotak pencarian
                    cityImage.src = "{{ asset('images/default-city.jpg') }}";
                });

                path.addEventListener('click', function () {
                    const title = path.getAttribute('title');
                    console.log('Clicked island:', title);

                    switch (title) {
                        case 'Sumatera Utara':
                            window.location.href = '/pulau-aceh';
                            break;
                        case 'Bali':
                            window.location.href = '/pulau-bali';
                            break;
                        case 'Bangka Belitung':
                            window.location.href = '/pulau-bangka-belitung';
                            break;
                        case 'Bengkulu':
                            window.location.href = '/pulau-bengkulu';
                            break;
                        case 'Banten':
                            window.location.href = '/pulau-banten';
                            break;
                        default:
                            alert('Halaman untuk ' + title + ' belum tersedia.');
                    }
                });
            });

            // Fitur pencarian wilayah
            searchBox.addEventListener('keyup', function (event) {
                if (event.key === 'Enter') {
                    const searchTerm = searchBox.value.toLowerCase();
                    let found = false;

                    // Reset message to "Pilih wilayah pada peta" before searching
                    infoText.textContent = 'Pilih wilayah pada peta atau cari disini';

                    // Reset opacity of all paths to default (visible state)
                    paths.forEach(function (path) {
                        path.style.opacity = '1';  // Pastikan semua wilayah terlihat normal
                        path.removeAttribute('fill'); // Reset warna fill
                        path.style.transform = 'scale(1)'; // Reset transform
                    });

                    // Loop through each path to check if it matches the search term
                    paths.forEach(function (path) {
                        const title = path.getAttribute('title').toLowerCase();

                        // If the title includes the search term, highlight it
                        if (title.includes(searchTerm)) {
                            path.setAttribute('fill', 'black');
                            path.style.transform = 'scale(1.02)';

                            // Update city image based on found title
                            switch (title) {
                                case 'sumatera utara':
                                    cityImage.src = "{{ asset('images/sumatera-utara.jpg') }}";
                                    break;
                                case 'bali':
                                    cityImage.src = "{{ asset('images/bali.jpg') }}";
                                    break;
                                case 'bangka belitung':
                                    cityImage.src = "{{ asset('images/bangka-belitung.jpg') }}";
                                    break;
                                case 'bengkulu':
                                    cityImage.src = "{{ asset('images/bengkulu.jpg') }}";
                                    break;
                                case 'banten':
                                    cityImage.src = "{{ asset('images/banten.jpg') }}";
                                    break;
                                default:
                                    cityImage.src = "{{ asset('images/default-city.jpg') }}";
                            }

                            found = true;
                        } else {
                            // Apply opacity reduction to non-matching paths (blur effect)
                            path.style.opacity = '0.2';
                        }
                    });

                    // If no match found, show the "Wilayah tidak ditemukan" message
                    if (!found) {
                        infoText.textContent = 'Wilayah tidak ditemukan.';
                    }
                }
            });
        });
    </script>

</body>
