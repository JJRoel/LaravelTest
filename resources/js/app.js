import './bootstrap';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/themes/dark.css'; // Gebruik het donkere thema dat lijkt op je voorbeeld

document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#date", {
        dateFormat: "Y-m-d"
    });
    flatpickr("#end_date", {
        dateFormat: "Y-m-d"
    });
});


