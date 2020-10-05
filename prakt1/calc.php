<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Biasa | Jago Ngoding</title>
</head>
<body>
    <h1>Kalkulator Biasa</h1>
    <form>
        <input type="number" name="a" placeholder="Bilangan a">

        <select name="operator">
            <option selected disabled>Pilih Operator</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input type="number" name="b" placeholder="Bilangan b">

        <div style="margin-top: 1rem">
            <button type="button" onclick="location.href = '?clear'">Clear</button>
            <button type="submit">Hitung</button>
        </div>
    </form>
</body>
</html>