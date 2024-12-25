<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به اپلیکیشن</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-sm space-y-6">
        <h1 class="text-xl font-bold text-center">ورود به اپلیکیشن</h1>
        
        <!-- فرم اولیه -->
        <div id="step1">
            <!-- فیلد انتخاب کشور -->
            <div>
                <label for="country" class="block text-sm font-medium text-gray-700">انتخاب کشور:</label>
                <select id="country" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="IR">ایران</option>
                    <option value="US">آمریکا</option>
                    <option value="UK">انگلیس</option>
                </select>
            </div>

            <!-- فیلد شماره تلفن -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">شماره تلفن:</label>
                <input type="tel" id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="مثال: 09121234567" required>
            </div>

            <!-- فیلد انتخاب پیام‌رسان -->
            <div>
                <label for="messenger" class="block text-sm font-medium text-gray-700">پیام‌رسان:</label>
                <select id="messenger" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="telegram">تلگرام</option>
                    <option value="whatsapp">واتساپ</option>
                </select>
            </div>

            <!-- دکمه ارسال رمز یکبار مصرف -->
            <button id="sendOtpBtn" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">
                ارسال رمز یکبار مصرف
            </button>
        </div>

        <!-- فرم کد OTP -->
        <div id="step2" class="hidden space-y-4">
            <label for="otp" class="block text-sm font-medium text-gray-700">کد تأیید:</label>
            <div class="flex space-x-2">
                <input type="text" maxlength="1" class="otp-input w-10 h-10 text-center border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">
                <input type="text" maxlength="1" class="otp-input w-10 h-10 text-center border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">
                <input type="text" maxlength="1" class="otp-input w-10 h-10 text-center border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">
                <input type="text" maxlength="1" class="otp-input w-10 h-10 text-center border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">
                <input type="text" maxlength="1" class="otp-input w-10 h-10 text-center border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg">
            </div>

            <button id="loginBtn" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
                ورود
            </button>
        </div>
    </div>

    <script>
        // مدیریت مراحل فرم
        const step1 = document.getElementById("step1");
        const step2 = document.getElementById("step2");
        const sendOtpBtn = document.getElementById("sendOtpBtn");
        const loginBtn = document.getElementById("loginBtn");

        // وقتی دکمه ارسال OTP زده شد
        sendOtpBtn.addEventListener("click", () => {
            // چک کردن پر بودن فیلدها
            const country = document.getElementById("country").value;
            const phone = document.getElementById("phone").value;
            const messenger = document.getElementById("messenger").value;

            if (!phone || !messenger) {
                alert("لطفاً تمام فیلدها را پر کنید.");
                return;
            }

            // رفتن به مرحله دوم
            step1.classList.add("hidden");
            step2.classList.remove("hidden");
        });

        // وقتی دکمه ورود زده شد
        loginBtn.addEventListener("click", () => {
            const otpInputs = document.querySelectorAll(".otp-input");
            let otpCode = "";

            // جمع‌آوری کد OTP از فیلدها
            otpInputs.forEach(input => {
                otpCode += input.value;
            });

            if (otpCode.length !== 5) {
                alert("کد تأیید باید ۵ رقم باشد.");
                return;
            }

            // بررسی کد OTP (مثال)
            if (otpCode === "12345") {
                alert("ورود موفقیت‌آمیز بود!");
                // هدایت به اپلیکیشن
                window.location.href = "/app";
            } else {
                alert("کد تأیید اشتباه است.");
            }
        });
    </script>
</body>
</html>