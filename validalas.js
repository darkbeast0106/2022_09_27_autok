addEventListener('DOMContentLoaded', () => {
    const rendszamInput = document.forms['auto_felvetel']['rendszam'];
    const markaInput = document.forms['auto_felvetel']['marka'];
    const modellInput = document.forms['auto_felvetel']['modell'];
    const gyartas_eveInput = document.forms['auto_felvetel']['gyartas_eve'];
    const uzemanyagInput = document.forms['auto_felvetel']['uzemanyag'];
    rendszamInput.addEventListener('input', () => {
        rendszamInput.classList.remove('is-valid');
        rendszamInput.classList.remove('is-invalid');
    });
    markaInput.addEventListener('input', () => {
        markaInput.classList.remove('is-valid');
        markaInput.classList.remove('is-invalid');
    });
    modellInput.addEventListener('input', () => {
        modellInput.classList.remove('is-valid');
        modellInput.classList.remove('is-invalid');
    });
    gyartas_eveInput.addEventListener('input', () => {
        gyartas_eveInput.classList.remove('is-valid');
        gyartas_eveInput.classList.remove('is-invalid');
    });
    uzemanyagInput.addEventListener('input', () => {
        uzemanyagInput.classList.remove('is-valid');
        uzemanyagInput.classList.remove('is-invalid');
    });
})

function validalas() {
    const rendszamInput = document.forms['auto_felvetel']['rendszam'];
    const markaInput = document.forms['auto_felvetel']['marka'];
    const modellInput = document.forms['auto_felvetel']['modell'];
    const gyartas_eveInput = document.forms['auto_felvetel']['gyartas_eve'];
    const uzemanyagInput = document.forms['auto_felvetel']['uzemanyag'];

    const rendszam = document.forms['auto_felvetel']['rendszam'].value;
    const marka = document.forms['auto_felvetel']['marka'].value;
    const modell = document.forms['auto_felvetel']['modell'].value;
    const gyartas_eve = document.forms['auto_felvetel']['gyartas_eve'].value;
    const uzemanyag = document.forms['auto_felvetel']['uzemanyag'].value;
    let hibaUzenetek = [];
    if (rendszam.trim().length == 0) {
        hibaUzenetek.push("Rendszám megadása kötelező");
        rendszamInput.classList.add("is-invalid");
    } else {
        rendszamInput.classList.add("is-valid");
    }
    if (marka.trim().length == 0) {
        hibaUzenetek.push("Márka megadása kötelező");
        markaInput.classList.add("is-invalid");
    } else {
        markaInput.classList.add("is-valid");
    }
    if (modell.trim().length == 0) {
        hibaUzenetek.push("Modell megadása kötelező");
        modellInput.classList.add("is-invalid");
    } else {
        modellInput.classList.add("is-valid");
    }
    const maiDatum = new Date();
    const maiEvszam = maiDatum.getFullYear();
    if (gyartas_eve.trim().length == 0) {
        hibaUzenetek.push("Gyártás éve megadása kötelező");
        gyartas_eveInput.classList.add("is-invalid");
    } else if (gyartas_eve != parseInt(gyartas_eve)) {
        hibaUzenetek.push("Gyártás éve csak szám lehet");
        gyartas_eveInput.classList.add("is-invalid");
    } else if (gyartas_eve < 1900 || gyartas_eve > maiEvszam) {
        hibaUzenetek.push(`Gyártás éve 1900 és ${maiEvszam} közé kell hogy essen`);
        gyartas_eveInput.classList.add("is-invalid");
    } else {
        gyartas_eveInput.classList.add("is-valid");
    }
    if (uzemanyag.trim().length == 0) {
        hibaUzenetek.push("Üzemanyag típus megadása kötelező");
        uzemanyagInput.classList.add("is-invalid");
    } else {
        uzemanyagInput.classList.add("is-valid");
    }
    if (hibaUzenetek.length > 0) {
        const hibaUzenet = hibaUzenetek.join("<br>");
        document.getElementById('hiba_modal_uzenet').innerHTML = hibaUzenet;
        const hibaModal = new bootstrap.Modal(document.getElementById("hiba_modal"));
        hibaModal.show();
    }
    return hibaUzenetek.length == 0;
}