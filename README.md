# Chat-gpt-telegram-bot: Fast. No daily limits. Use base SK key API
<h2>Features</h2>  
- No request limits
<br>
- Control and limit token text generator
<br>	
- Simple and fast setup
<br>	
- Support only text generator
<br>
 <h2>Bot commands<h2>
 <code>/start</code> to start the bot
 
 <code>/gpt </code> chat with gpt bot
<h2>Setup bot</h2>
<h3>Step 1: Get API key</h3>

1. Get your [OpenAI API](https://openai.com/api/) key

2. Get your Telegram bot token from [@BotFather](https://t.me/BotFather)

<h3>Step 2: Setup Bot</h3>

3. Clone this repo in to your repl.com

4. Set webhook for your bot 
```bash
https://api.telegram.org/bot<your_bot_token>/setwebhook?url=<url>
```
The URL is your repl link or your host

If you want fast setup in repl [Click Here](https://replit.com/@vovabj/Chat-GPT-bot-temple)

5. Edit `file index.php` to set your SK keys and tokens
```bash
$botToken = " "; // Enter your bot token
$data = '{
      "model": "text-davinci-003",
      "prompt": "'.$text.'",
      "max_tokens": 100, 
      "temperature": 0
    }';
    //In max_tokens you can set custom tokens coin. If you set it higher, your bill will be higher and you get more text.
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Authorization: Bearer YOUR_API_KEY'
  ));
  //In Authorization: Bearer you can GET your API key from https://platform.openai.com/account/api-keys
		
```

