/* تنظیمات عمومی */
body {
    font-family: Arial, sans-serif;
    text-align: center;
    direction: rtl;
    margin: 0;
    padding: 0;
    background-color: #121212;
    color: white;
}

.screen {
    display: none;
    padding: 20px;
}

.screen.visible {
    display: block;
}

button {
    background-color: #00cc66;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background-color: #00994d;
}

.input-group {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

input, select {
    margin-top: 10px;
    padding: 10px;
    width: 80%;
    max-width: 300px;
    border-radius: 5px;
    border: 1px solid #ccc;
} 