// --- 1. ФУНКЦИЯ ДЛЯ КНОПКИ "ЗАКАЗАТЬ ЗВОНОК" (Alert) ---
function showCallbackAlert() {
    alert("Наши менеджеры перезвонят вам в течение 15 минут!");
}

// --- 2. ФУНКЦИЯ ДЛЯ ПРАВОВОЙ ИНФОРМАЦИИ (Confirm + Switch + If) ---
function checkLegalAgreements() {
    const isAgreed = confirm("Вы подтверждаете, что ознакомлены с политикой конфиденциальности?");
    
    if (isAgreed) {
        let docType = prompt("Какой документ вас интересует? (1 - Гарантия, 2 - Кредитный договор, 3 - Трейд-ин)");
        
        switch (docType) {
            case "1":
                alert("Раздел: Сервисная поддержка до 5 лет.");
                break; 
            case "2":
                alert("Раздел: Кредитная ставка 0.01%.");
                break;
            case "3":
                alert("Раздел: Выгода до 450 000 руб.");
                break;
            default:
                alert("Информация подготавливается.");
        }
    } else {
        alert("Доступ к документам ограничен без согласия.");
    }
}

// --- 3. СИМУЛЯЦИЯ ПОДБОРА АВТОМОБИЛЯ (While, Do..While, String, Date) ---
function startAutoConsultant() {
    // --- РАБОТА С DATE ---
    let now = new Date();
    let hour = now.getHours();
    let greeting = "";
    if (hour < 12) greeting = "Доброе утро";
    else if (hour < 18) greeting = "Добрый день";
    else greeting = "Добрый вечер";

    let userName;
    // --- Использование DO..WHILE ---
    do {
        userName = prompt(greeting + "! Как к вам обращаться? (Введите имя)");
    } while (!userName || userName.trim().length === 0);

    // --- РАБОТА СО STRING ---
    // Убираем лишние пробелы, делаем первую букву заглавной, остальные строчные
    let fixedName = userName.trim();
    fixedName = fixedName.charAt(0).toUpperCase() + fixedName.slice(1).toLowerCase();

    alert("Приятно познакомиться, " + fixedName + "! Сегодня " + now.toLocaleDateString());

    // --- Использование WHILE ---
    let budget = 0;
    while (budget < 3000000) {
        let input = prompt("Введите ваш бюджет на покупку TANK (мин. 3 000 000):");
        budget = parseInt(input);
        
        if (budget < 3000000) {
            alert("К сожалению, моделей TANK в этом бюджете нет. Попробуйте еще раз.");
        }
    }
    
    // Переходим к обработке массивов и расчетам
    showAvailableCars(budget);
}

// --- 4. РАБОТА С МАССИВАМИ (Array) ---
function showAvailableCars(userBudget) {
    // Массив объектов (комплектации)
    const cars = [
        { name: "TANK 300 Adventure", price: 3649000 },
        { name: "TANK 300 Premium", price: 4049000 },
        { name: "TANK 500 Urban", price: 6299000 },
        { name: "TANK 500 Premium", price: 6899000 }
    ];

    let message = "За ваш бюджет мы можем предложить:\n";
    let found = false;

    // Проход по массиву
    for (let i = 0; i < cars.length; i++) {
        if (cars[i].price <= userBudget) {
            message += "- " + cars[i].name + " за " + cars[i].price + " руб.\n";
            found = true;
        }
    }

    if (!found) {
        alert("В наличии нет авто до " + userBudget + " руб.");
    } else {
        alert(message);
        // Если нашли машину, предложим рассчитать кредит (Math)
        calculateMonthlyPayment(userBudget);
    }
}

// --- 5. РАСЧЕТ ПО ФОРМУЛЕ (Math) ---
function calculateMonthlyPayment(amount) {
    alert("Рассчитаем кредит на 5 лет (ставка 1%)");
    
    // Формула примерного платежа: (Сумма / Месяцы)
    let months = 60;
    let basePayment = amount / months;
    
    // Использование Math.pow и Math.round
    let interest = 1.01; // 1%
    let totalWithInterest = amount * Math.pow(interest, 5);
    let finalMonthly = totalWithInterest / months;

    alert("Ваш ежемесячный платеж: " + Math.round(finalMonthly) + " руб.");
    
    // Вызов функции с подарками (там наши continue/break)
    calculateSpecialOffer(amount);
}

// --- 6. РАСЧЕТ ПРЕДЛОЖЕНИЯ (Return, For, Continue, Break) ---
function calculateSpecialOffer(amount) {
    const bonuses = ["Коврики", "Зимняя резина", "Керамика", "Защита картера", "СЕКРЕТНЫЙ ПРИЗ"];
    let message = "Также при покупке за " + amount + " руб. вы получаете:\n";

    // Использование FOR
    for (let i = 0; i < bonuses.length; i++) {
        
        // Использование CONTINUE (пропустим секретный приз, если бюджет меньше 6 млн)
        if (bonuses[i] === "СЕКРЕТНЫЙ ПРИЗ" && amount < 6000000) {
            continue;
        }

        // Использование BREAK (не дарим больше 4 подарков за раз)
        if (i === 4) {
            break;
        }

        message += "- " + bonuses[i] + "\n";
    }

    alert(message);
    return true; // Использование RETURN
}