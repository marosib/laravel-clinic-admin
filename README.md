# 🏥 Laravel Clinic Admin

## 📜 Leírás
Ebben a tesztfeladatban egy rendelő admin felületét kellett elkészítenem a megadott kritériumknak megfelelően.
A megvalósítás során igyekeztem olyan szerkezetet kialakítani, ami könnyen bővíthető és átlátható marad hosszabb távon is.

## 💻 Rendszerkövetelmények

A projekt futtatásához az alábbiak szükségesek:

- **Laravel 11**
- **PHP 8.2**
- **Composer**
- **MySQL**

---

## ✅ Megoldás

### Betegkezelés

- CRUD műveletek (listázás, keresés, létrehozás, szerkesztés, törlés).
- Beteg részletei oldalon a vizitek listája.
- Validáció minden űrlapnál.
- Flash üzenetek a sikeres műveletekhez.

### Vizitek

- Vizit létrehozás/törlés.
- Automatikus visited_at kitöltés, ha nincs megadva.
- Beteghez kötött lista nézet.

### Statisztika

- Heti vizitszám.
- Legutóbbi vizitek listája.
- Leggyakoribb okok.

## ✏️ Extra és hozzátett részek

Az alapfunkciókon túl bevezettem néhány olyan megoldást, ami ugyan nem volt elvárás, de a kód tisztaságát és bővíthetőségét segíti, vagy a kódolási stílusom része:

- **Repository pattern** -
Az adatelérési réteget egy külön Repository osztály kezeli. A Service réteg nem közvetlenül az Eloquenttel dolgozik, hanem egy interfészen keresztül hivatkozik rá (pl. `PatientRepositoryInterface`). Ezáltal a kód függetlenedik az Eloquenttől, könnyebben tesztelhető és bővíthető.
- **Invokable controllerek** -
Minden controller egyetlen felelősségre fókuszál, és nem gyűlik össze bennük több, egymástól független logika. Ez jobban illeszkedik a SOLID elvekhez, így a kód átláthatóbb és könnyebben karbantartható.
- **Vizitek további műveletei** -
A feladatban nem szerepelt de megvalósítottam a vizitek felvételét és törlését a jobb tesztelhetőség érdekében.
- **Átlátható route struktúra** -
A route-okat modulonként külön fájlba szerveztem (patient.php, visit.php, statistic.php), így sokkal kezelhetőbb a projekt, ha nő az alkalmazás mérete.
- **Statisztika modul bővítése** -
Nem csak az alap mutatók készültek el, hanem előkészítettem heti bontásokat, top okok és napi lebontás lekérdezéseit is.
- **Export funkció** -
A statisztikák letölthetők külön endpointon keresztül. Ez jó alap lehet riportkészítéshez.

## 🎒 További lehetőségek

- **Több orvos kezelése** -
Jelenleg csak egy orvos van fixen kezelve, érdemes lenne külön modell + CRUD felülettel kezelni egy adminnak/igazgatónak.
- **Szerepkörök** -
Admin és személyzet jogosultságok elkülönítése.
- **Teljes vizit CRUD** -
Jelenleg csak létrehozás és törlés van, a szerkesztés és részletesebb megtekintés hiányzik.
- **Feature tesztek bővítése** -
Vizitek és staztisztikák tesztjei hiányoznak.
- **Riportok** -
Többféle export és formátum.
- **Felhasználói élmény** -
Kereső finomítása, több flash üzenet típus (info, warning).
- **Queue Jobs** -
Felkészülve a nagyobb mennyiségű adatok kezelésére laravel queue bevezetése és az exportok emailben való kiküldése hasznosabb lehet.

---

## ⚙️ Telepítés

### 1. Laravel 11 projekt letöltése

```
git clone https://github.com/marosib/laravel-clinic-admin.git
cd laravel-admin-clinic
```

### 2. Függőségek telepítése
Telepítsd a PHP csomagokat:

```
composer install
```
### 3. Környezeti fájl létrehozása
Hozz létre egy `.env` fájlt a `.env.example` alapján:

```
cp .env.example .env
```

Majd generálj alkalmazás kulcsot:

```
php artisan key:generate
```

### 4. Adatbázis beállítása
Nyisd meg a `.env` fájlt és módosítsd az adatbázis hozzáférés adatait:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_admin_clinic
DB_USERNAME=root
DB_PASSWORD=secret
```

A `DB_DATABASE`, `DB_USERNAME` és `DB_PASSWORD` értékeket állítsd be a saját MySQL beállításaid szerint.

Ezután futtasd a migrációkat és töltsd fel az adatbázist:

```
php artisan migrate --seed
```

### 5. Szerver indítása

```
php artisan serve
```

Most elérhető lesz az API a következő címen:

`http://127.0.0.1:8000`

## 🔨 Használat

### 1. Belépés

A migrációk és seederek lefutása után a következő adatokkal lépj be a login felületen amit a főoldalról a `Belépés` gombra kattinva érsz el:
- Email cím: `dr_teszt@example.com`
- Jelszó: `teszt123`

### 2. Elérések

- Admin felület: `/admin/dashboard`
- Betegek: `/admin/patients`
- Vizitek: beteg részletei alatt `/admin/patients/{patient}`
- Statisztikák: `/admin/statistics`
- Export: `/admin/statistics/export`

---

## 📄 Feladat

👉 [Tesztfeladat](task.pdf)