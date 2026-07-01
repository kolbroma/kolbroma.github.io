<?php
$variant = 15;
$lastName = "Колб"; 
$firstName = "Роман"; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тематический контроль знаний<?php echo $variant; ?></title>
    
    <!-- Подключение внешнего файла стилей CSS -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Скрипты, размещаемые в HEAD -->
    <script>
        // ЗАДАНИЕ 1
        function showTime() {
            const now = new Date();
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            alert("Секунды-часы: " + seconds + "-" + hours);
        }

        // ЗАДАНИЕ 4
        function calculateCircumference(radius) {
            return 2 * Math.PI * radius;
        }

        // ЗАДАНИЕ 6
        setTimeout(function() {
            const userAgent = window.navigator.userAgent;
            const platform = window.navigator.platform;
            let os = "Неизвестная ОС";

            if (platform.indexOf('Win') !== -1) os = "Windows";
            else if (platform.indexOf('Mac') !== -1) os = "Mac OS";
            else if (platform.indexOf('Linux') !== -1) os = "Linux";
            else if (/Android/.test(userAgent)) os = "Android";
            else if (/iPhone|iPad|iPod/.test(userAgent)) os = "iOS";

            alert("Информация об операционной системе клиента: " + os + "\nuserAgent: " + userAgent);
        }, 6000);
    </script>
</head>
<body>

    <h1>Тематический контроль знаний (Вариант №<?php echo $variant; ?>)</h1>

    <!-- БЛОК ЗАДАНИЯ 1 -->
    <div class="task-block">
        <h3 class="task-title">Задание 1: Работа с объектом Date</h3>
        <p>Выводит в диалоговое окно текущее время в формате секунды-часы.</p>
        <button onclick="showTime()">Показать время</button>
    </div>

    <!-- БЛОК ЗАДАНИЯ 2 -->
    <div class="task-block">
        <h3 class="task-title">Задание 2: Работа с операторами циклов (do..while)</h3>
        <p>Вывод имени и фамилии n+5 раз (для Варианта №<?php echo $variant; ?> это <?php echo $variant; ?> + 5 = <?php echo ($variant + 5); ?> раз):</p>
        <div style="background: #fcfcfc; padding: 10px; border: 1px solid #eee;">
            <script>
                const lastName = <?php echo json_encode($lastName); ?>;
                const firstName = <?php echo json_encode($firstName); ?>;
                const n = <?php echo $variant; ?>;
                const repetitions = n + 5; 
                
                let i = 0;
                do {
                    document.write((i + 1) + ". " + lastName + " " + firstName + "<br>");
                    i++;
                } while (i < repetitions);
            </script>
        </div>
    </div>

    <!-- БЛОК ЗАДАНИЯ 3 -->
    <div class="task-block">
        <h3 class="task-title">Задание 3: Работа с объектом Array</h3>
        <p>Подсчет количества элементов массива из 8 чисел, кратных 4:</p>
        <script>
            const arr = [12, 5, 8, 16, 22, 40, 7, 3];
            let count = 0;
            for (let j = 0; j < arr.length; j++) {
                if (arr[j] % 4 === 0) {
                    count++;
                }
            }
            document.write("<strong>Исходный массив:</strong> [" + arr.join(", ") + "]<br>");
            document.write("<strong>Количество элементов, кратных 4:</strong> " + count);
        </script>
    </div>

    <!-- БЛОК ЗАДАНИЯ 4 -->
    <div class="task-block">
        <h3 class="task-title">Задание 4: Работа с объектом Math</h3>
        <p>Вычисление длины окружности с помощью пользовательской функции:</p>
        <script>
            const radius = -10;
            const circumference = calculateCircumference(radius);
            document.write("<strong>Радиус круга:</strong> " + radius + "<br>");
            document.write("<strong>Длина окружности (C = 2 * π * r):</strong> " + circumference.toFixed(2));
        </script>
    </div>

    <!-- БЛОК ЗАДАНИЯ 5 -->
    <div class="task-block">
        <h3 class="task-title">Задание 5: Работа со строками STRING</h3>
        <script>
            const S1 = "Я люблю Беларусь";
            const S2 = "Я учусь в Политехническом колледже.";
            const variant = <?php echo $variant; ?>;
            
            const s1Length = S1.length;
            const targetChar = S1.charAt(variant - 1); 
            const charCode = targetChar.charCodeAt(0);
            const modifiedS2 = S2.replace(/о/g, "а");
            
            document.write("<strong>Строка S1:</strong> \"" + S1 + "\"<br>");
            document.write("<strong>Строка S2:</strong> \"" + S2 + "\"<br><br>");
            document.write("1. Длина строки S1: <strong>" + s1Length + "</strong> символов.<br>");
            document.write("2. " + variant + "-й символ в S1: \"<strong>" + targetChar + "</strong>\", его ASCII/Unicode код: <strong>" + charCode + "</strong>.<br>");
            document.write("3. Измененная строка S2: \"<strong>" + modifiedS2 + "</strong>\"");
        </script>
    </div>

    <!-- БЛОК ЗАДАНИЯ 6 -->
    <div class="task-block">
        <h3 class="task-title">Задание 6: Объектная модель браузера (BOM)</h3>
        <p>Информационное окно с типом операционной системы будет показано один раз через 6 секунд после загрузки страницы.</p>
    </div>

</body>
</html>