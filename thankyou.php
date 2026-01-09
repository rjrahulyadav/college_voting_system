<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Submitted - SONA College</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .success-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #00ffff;
            animation: confettiFall 3s linear infinite;
        }

        .confetti:nth-child(odd) { background: #ff00ff; }
        .confetti:nth-child(3n) { background: #00ff00; }

        @keyframes confettiFall {
            0% { transform: translateY(-100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
        }

        .thank-you-container {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(0, 255, 255, 0.4);
            border-radius: 30px;
            padding: 4rem;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 10;
            animation: containerSlide 1s ease-out;
        }

        @keyframes containerSlide {
            from { opacity: 0; transform: translateY(50px) scale(0.9); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .success-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 2rem;
            border-radius: 50%;
            background: linear-gradient(45deg, #00ff00, #00ffff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
            box-shadow: 0 0 50px rgba(0, 255, 0, 0.6);
            animation: successPulse 2s ease-in-out infinite;
            position: relative;
        }

        .success-icon::before {
            content: '✓';
            animation: checkAditya 1s ease-out 0.5s both;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 50px rgba(0, 255, 0, 0.6); }
            50% { transform: scale(1.1); box-shadow: 0 0 80px rgba(0, 255, 0, 0.8); }
        }

        @keyframes checkAditya {
            from { opacity: 0; transform: scale(0); }
            to { opacity: 1; transform: scale(1); }
        }

        .thank-you-title {
            font-family: 'Orbitron', monospace;
            font-size: 3rem;
            font-weight: 900;
            color: #00ffff;
            text-shadow: 0 0 30px rgba(0, 255, 255, 0.8);
            margin-bottom: 1rem;
            animation: titleGlow 2s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            from { text-shadow: 0 0 30px rgba(0, 255, 255, 0.8); }
            to { text-shadow: 0 0 40px rgba(0, 255, 255, 1), 0 0 50px rgba(0, 255, 255, 0.8); }
        }

        .thank-you-message {
            font-size: 1.4rem;
            color: #ffffff;
            margin-bottom: 2rem;
            line-height: 1.6;
            font-weight: 500;
        }

        .vote-details {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(0, 255, 255, 0.3);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: left;
        }

        .vote-details h3 {
            color: #00ffff;
            font-family: 'Orbitron', monospace;
            margin-bottom: 1rem;
            text-align: center;
        }

        .vote-info {
            color: #ffffff;
            font-size: 1.1rem;
            margin: 0.5rem 0;
        }

        .home-btn {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(45deg, #00ffff, #0080ff);
            border: none;
            border-radius: 15px;
            color: #000;
            font-size: 1.2rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.4s ease;
            font-family: 'Orbitron', monospace;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 30px rgba(0, 255, 255, 0.3);
            margin-top: 1rem;
        }

        .home-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 255, 255, 0.5);
        }

        .footer-message {
            margin-top: 2rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .thank-you-container { 
                margin: 1rem; 
                padding: 2rem; 
            }
            .thank-you-title { 
                font-size: 2.2rem; 
            }
            .success-icon {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="success-animation" id="confetti"></div>
    
    <div class="thank-you-container">
        <div class="success-icon"></div>
        
        <h1 class="thank-you-title">Vote Submitted!</h1>
        
        <p class="thank-you-message">
            Thank you for participating in the SONA College of Technology voting process. 
            Your vote has been successfully recorded and will be counted in the final results.
        </p>
        
        <div class="vote-details">
            <h3>Vote Confirmation</h3>
            <div class="vote-info">✓ Your vote has been encrypted and stored securely</div>
            <div class="vote-info">✓ Vote timestamp: <?php echo date('Y-m-d H:i:s'); ?></div>
            <div class="vote-info">✓ Status: Successfully Submitted</div>
        </div>
        
        <a href="logout.php" class="home-btn">Return to Login</a>
        
        <div class="footer-message">
            <p>Your participation makes democracy stronger!</p>
            <p><strong>SONA COLLEGE OF TECHNOLOGY</strong> - Salem, Tamil Nadu</p>
        </div>
    </div>

    <script>
        // Create confetti animation
        function createConfetti() {
            const confettiContainer = document.getElementById('confetti');
            const confettiCount = 100;

            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.animationDelay = Math.random() * 3 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                confettiContainer.appendChild(confetti);
            }

            // Remove confetti after animation
            setTimeout(() => {
                confettiContainer.innerHTML = '';
            }, 5000);
        }

        // Start confetti when page loads
        document.addEventListener('DOMContentLoaded', createConfetti);

        // Auto redirect after 10 seconds
        setTimeout(() => {
            window.location.href = 'logout.php';
        }, 10000);
    </script>
</body>
</html>
