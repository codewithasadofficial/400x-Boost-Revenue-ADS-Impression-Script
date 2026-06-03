<?php
$girlImage = isset($_GET['girl']) ? $_GET['girl'] : 'https://watch.futureshareprice.com/media/video.webp';
function getFakeNumber() {
    return '+91 9' . rand(6, 9) . rand(10000000, 99999999);
}
$fakeNumber = getFakeNumber();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fake Chat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; background: #d9dbd5; }
    .chat-container {
      max-width: 600px;
      margin: 0 auto;
      height: 100vh;
      display: flex;
      flex-direction: column;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .top-bar {
      background: #f0f0f0;
      padding: 10px;
      display: flex;
      align-items: center;
      border-bottom: 1px solid #ccc;
    }
    .top-bar img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover;
    }
    .top-bar .info {
      flex-grow: 1;
    }
    .top-bar .info .name { font-weight: bold; color: #111; }
    .top-bar .info .status { font-size: 12px; color: green; }
    .top-bar .icons {
      display: flex;
      gap: 15px;
    }
    .top-bar i {
      font-size: 18px;
      color: #555;
      cursor: pointer;
    }

    .chat-box {
      flex: 1;
      background: #e5ddd5;
      overflow-y: auto;
      padding: 15px;
      display: flex;
      flex-direction: column;
    }
    .message {
      max-width: 75%;
      padding: 10px;
      border-radius: 10px;
      margin-bottom: 10px;
      line-height: 1.4;
      position: relative;
    }
    .bot { background: #fff; align-self: flex-start; }
    .user { background: #dcf8c6; align-self: flex-end; }
    .message img {
      max-width: 200px;
      border-radius: 10px;
      margin-top: 5px;
    }
    .message audio {
      margin-top: 5px;
      width: 200px;
    }
    .typing {
      font-style: italic;
      opacity: 0.6;
    }

    .input-area {
      padding: 10px;
      background: #f0f0f0;
      display: flex;
      border-top: 1px solid #ccc;
    }
    .input-area input {
      flex: 1;
      padding: 10px 15px;
      font-size: 16px;
      border-radius: 20px;
      border: 1px solid #ccc;
      outline: none;
    }
    .input-area button {
      background: #0084ff;
      color: white;
      border: none;
      padding: 0 20px;
      margin-left: 10px;
      border-radius: 20px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="chat-container">
  <!-- Top bar -->
  <div class="top-bar">
    <img src="<?= htmlspecialchars($girlImage) ?>" alt="Profile">
    <div class="info">
      <div class="name"><?= $fakeNumber ?></div>
      <div class="status">online</div>
    </div>
    <div class="icons">
      <i class="fas fa-video"></i>
      <i class="fas fa-phone-alt"></i>
    </div>
  </div>

  <!-- Chat box -->
  <div class="chat-box" id="chatBox">
    <div class="message bot">Hi</div>
    <div class="message bot">How are you?</div>
    <div class="message bot">
      <audio controls>
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
      </audio>
    </div>
    <div class="message bot">
      <a href="" target="_blank">
        <img src="https://watch.futureshareprice.com/media/video.webp" alt="Video">
      </a>
    </div>
  </div>

  <!-- Input -->
  <div class="input-area">
    <input type="text" id="messageInput" placeholder="Type a message..." />
    <button onclick="sendMessage()">Send</button>
  </div>
</div>

<script>
const chatBox = document.getElementById('chatBox');
const input = document.getElementById('messageInput');

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}

function sendMessage() {
  const msg = input.value.trim();
  if (!msg) return;

  const userMsg = document.createElement('div');
  userMsg.className = 'message user';
  userMsg.textContent = msg;
  chatBox.appendChild(userMsg);
  scrollToBottom();
  input.value = '';

  // Add typing indicator
  const typing = document.createElement('div');
  typing.className = 'message bot typing';
  typing.textContent = 'typing...';
  chatBox.appendChild(typing);
  scrollToBottom();

  setTimeout(() => {
    typing.remove();

    const reply = document.createElement('div');
    reply.className = 'message bot';
    reply.innerHTML = `Telegram pr raabta kry ye link hai <a href="https://t.me/" target="_blank">t.me/</a>`;
    chatBox.appendChild(reply);
    scrollToBottom();
  }, 2000);
}

input.addEventListener('keypress', e => {
  if (e.key === 'Enter') sendMessage();
});
</script>
</body>
</html>
