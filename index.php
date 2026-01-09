<?php
session_start();
include('dbcon.php');

if (isset($_POST['Login'])){
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    
    $login_query = mysqli_query($conn,"select * from voters where Username='$UserName' and Password='$Password' and Status='Unvoted' and Year='1st year'") or die(mysqli_error());
    $login_query3 = mysqli_query($conn,"select * from voters where Username='$UserName' and Password='$Password' and Status='Unvoted' and Year='2nd year'") or die(mysqli_error());
    $login_query4 = mysqli_query($conn,"select * from voters where Username='$UserName' and Password='$Password' and Status='Unvoted' and Year='3rd year'") or die(mysqli_error());
    $login_query5 = mysqli_query($conn,"select * from voters where Username='$UserName' and Password='$Password' and Status='Unvoted' and Year='4th year'") or die(mysqli_error());
    $login_query1 = mysqli_query($conn,"select * from voters where Username='$UserName' and Password='$Password' and Status='Voted'");
    
    $count = mysqli_num_rows($login_query);
    $count1 = mysqli_num_rows($login_query1);
    $count3 = mysqli_num_rows($login_query3);
    $count4 = mysqli_num_rows($login_query4);
    $count5 = mysqli_num_rows($login_query5);
    
    $row = mysqli_fetch_array($login_query);
    $row3 = mysqli_fetch_array($login_query3);
    $row4 = mysqli_fetch_array($login_query4);
    $row5 = mysqli_fetch_array($login_query5);
    
    if($count == 1){
        $_SESSION['id'] = $row['VoterID'];
        header('Location: voting.php');
        exit();
    }
    if($count3 == 1){
        $_SESSION['id'] = $row3['VoterID'];
        header('Location: voting2.php');
        exit();
    }
    if($count4 == 1){
        $_SESSION['id'] = $row4['VoterID'];
        header('Location: voting3.php');
        exit();
    }
    if($count5 == 1){
        $_SESSION['id'] = $row5['VoterID'];
        header('Location: voting4.php');
        exit();
    }
    
    if($count == 1 || $count1 == 1 || $count3 == 1 || $count4 == 1 || $count5 == 1){
        $error_message = "You Can Only Vote Once";
    } else {
        $error_message = "Please check your username and password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SONA College Voting System</title>
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
            overflow-x: hidden;
            position: relative;
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #00ffff;
            border-radius: 50%;
            animation: float 6s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }

        .container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            text-align: center;
            padding: 2rem 0;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 255, 255, 0.2);
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            border-radius: 50%;
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            color: white;
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.5);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 30px rgba(0, 255, 255, 0.5); }
            50% { transform: scale(1.05); box-shadow: 0 0 50px rgba(0, 255, 255, 0.8); }
        }

        .title {
            font-family: 'Orbitron', monospace;
            font-size: 2.5rem;
            font-weight: 900;
            color: #00ffff;
            text-shadow: 0 0 20px rgba(0, 255, 255, 0.8);
            margin-bottom: 0.5rem;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 20px rgba(0, 255, 255, 0.8); }
            to { text-shadow: 0 0 30px rgba(0, 255, 255, 1), 0 0 40px rgba(0, 255, 255, 0.8); }
        }

        .subtitle {
            font-size: 1.2rem;
            color: #ff00ff;
            text-shadow: 0 0 10px rgba(255, 0, 255, 0.6);
            font-weight: 500;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 255, 255, 0.3);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #00ffff, #ff00ff, #00ffff);
            border-radius: 20px;
            z-index: -1;
            animation: borderGlow 3s linear infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .login-title {
            font-family: 'Orbitron', monospace;
            font-size: 1.8rem;
            color: #00ffff;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 0 0 15px rgba(0, 255, 255, 0.8);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: #00ffff;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(0, 255, 255, 0.3);
            border-radius: 10px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Rajdhani', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #00ffff;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
            background: rgba(0, 0, 0, 0.7);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #00ffff, #0080ff);
            border: none;
            border-radius: 10px;
            color: #000;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Orbitron', monospace;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 255, 255, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-top: 1rem;
            font-weight: 500;
            text-align: center;
        }

        .alert-error {
            background: rgba(255, 0, 100, 0.2);
            border: 1px solid rgba(255, 0, 100, 0.5);
            color: #ff0064;
        }

        .footer {
            text-align: center;
            padding: 2rem;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(0, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.7);
        }

        .footer p {
            margin: 0.5rem 0;
        }

        @media (max-width: 768px) {
            .title { font-size: 2rem; }
            .login-container { margin: 1rem; padding: 2rem; }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <header class="header">
            <div class="logo">S</div>
            <h1 class="title">SONA COLLEGE OF TECHNOLOGY</h1>
            <p class="subtitle">Digital Voting System - Salem, Tamil Nadu</p>
        </header>

        <main class="main-content">
            <div class="login-container">
                <h2 class="login-title">Voter Login</h2>
                
                <form method="POST">
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" name="UserName" class="form-input" placeholder="Enter your username" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="Password" class="form-input" placeholder="Enter your password" required>
                    </div>
                    
                    <button type="submit" name="Login" class="login-btn">
                        Access Voting Portal
                    </button>
                </form>

                <?php if (isset($error_message)): ?>
                    <div class="alert alert-error">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
            </div>
        </main>

        <footer class="footer">
            <p>Copyright © 2024 SONA COLLEGE OF TECHNOLOGY</p>
            <p>Programmed by: Rahul Yadav</p>
        </footer>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 6 + 's';
                particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles when page loads
        document.addEventListener('DOMContentLoaded', createParticles);

        // Add interactive effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
