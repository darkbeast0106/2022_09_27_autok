function validalas() {
    const rendszam = document.forms['auto_felvetel']['rendszam'].value;
    const marka = document.forms['auto_felvetel']['marka'].value;
    const modell = document.forms['auto_felvetel']['modell'].value;
    const gyartas_eve = document.forms['auto_felvetel']['gyartas_eve'].value;
    const uzemanyag = document.forms['auto_felvetel']['uzemanyag'].value;
    if (rendszam.trim().length == 0) {
        alert("Rendszám megadása kötelező");
        return false;
    }
    if (marka.trim().length == 0) {
        alert("Márka megadása kötelező");
        return false;
    }
    if (modell.trim().length == 0) {
        alert("Modell megadása kötelező");
        return false;
    }
    if (gyartas_eve.trim().length == 0) {
        alert("Gyártás éve megadása kötelező");
        return false;
    }
    if (gyartas_eve != parseInt(gyartas_eve)) {
        alert("Gyártás éve csak szám lehet");
        return false;
    }
    const maiDatum = new Date();
    const maiEvszam = maiDatum.getFullYear();
    if (gyartas_eve < 1900 || gyartas_eve > maiEvszam) {
        alert(`Gyártás éve 1900 és ${maiEvszam} közé kell hogy essen`);
        return false;
    }
    if (uzemanyag.trim().length == 0) {
        alert("Üzemanyag típus megadása kötelező");
        return false;
    }
    return true;
}