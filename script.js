// نمایش صفحه مورد نظر بر اساس شناسه
function showScreen(screenId) {
    document.querySelectorAll('.screen').forEach(screen => {
        screen.classList.add('hidden');
        screen.classList.remove('visible');
    });
    document.getElementById(screenId).classList.remove('hidden');
    document.getElementById(screenId).classList.add('visible');
}

// مدیریت رویداد دکمه‌ها
document.getElementById('continue-to-login').addEventListener('click', () => {
    showScreen('phone-login');
});

document.getElementById('submit-phone').addEventListener('click', () => {
    showScreen('code-verification');
});

document.getElementById('submit-code').addEventListener('click', () => {
    alert('ورود موفقیت‌آمیز بود!');
});

// نمایش صفحه اول در ابتدا
showScreen('language-selection');