<?php
session_start();
include('dbcon.php');

if (isset($_POST['Login'])){
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    
    $login_query = mysqli_query($conn,"select * from users where UserName='$UserName' and Password='$Password'");
    $count = mysqli_num_rows($login_query);
    $row = mysqli_fetch_array($login_query);
    $f = $row['FirstName'];
    $l = $row['LastName'];
    
    if ($count > 0){
        $_SESSION['id'] = $row['User_id'];
        $_SESSION['User_Type'] = $row['User_Type'];
        $type = $row['User_Type'];
        
        mysqli_query($conn,"INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')")or die(mysqli_error());
        
        header('Location: home.php');
        exit();
    } else {
        $error_message = "Please check your Username and Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - SONA College</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background: linear-gradient(135deg, #1a0033 0%, #2d1b69 50%, #0f3460 100%);
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
            background: #ff00ff;
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
            border-bottom: 1px solid rgba(255, 0, 255, 0.2);
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff00ff, #8000ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            color: white;
            box-shadow: 0 0 30px rgba(255, 0, 255, 0.5);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 30px rgba(255, 0, 255, 0.5); }
            50% { transform: scale(1.05); box-shadow: 0 0 50px rgba(255, 0, 255, 0.8); }
        }

        .title {
            font-family: 'Orbitron', monospace;
            font-size: 2.5rem;
            font-weight: 900;
            color: #ff00ff;
            text-shadow: 0 0 20px rgba(255, 0, 255, 0.8);
            margin-bottom: 0.5rem;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 20px rgba(255, 0, 255, 0.8); }
            to { text-shadow: 0 0 30px rgba(255, 0, 255, 1), 0 0 40px rgba(255, 0, 255, 0.8); }
        }

        .subtitle {
            font-size: 1.2rem;
            color: #00ffff;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.6);
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
            border: 1px solid rgba(255, 0, 255, 0.3);
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
            background: linear-gradient(45deg, #ff00ff, #8000ff, #ff00ff);
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
            color: #ff00ff;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 0 0 15px rgba(255, 0, 255, 0.8);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: #ff00ff;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 0, 255, 0.3);
            border-radius: 10px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Rajdhani', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #ff00ff;
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.4);
            background: rgba(0, 0, 0, 0.7);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #ff00ff, #8000ff);
            border: none;
            border-radius: 10px;
            color: #fff;
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
            box-shadow: 0 10px 25px rgba(255, 0, 255, 0.4);
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
            border-top: 1px solid rgba(255, 0, 255, 0.2);
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
            <div class="logo">A</div>
            <h1 class="title">ADMIN PORTAL</h1>
            <p class="subtitle">SONA College Management System</p>
        </header>

        <main class="main-content">
            <div class="login-container">
                <h2 class="login-title">Administrator Login</h2>
                
                <form method="POST">
                    <div class="form-group">
                        <label class="form-label">Admin Username</label>
                        <input type="text" name="UserName" class="form-input" placeholder="Enter admin username" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Admin Password</label>
                        <input type="password" name="Password" class="form-input" placeholder="Enter admin password" required>
                    </div>
                    
                    <button type="submit" name="Login" class="login-btn">
                        Access Admin Panel
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
            <p>Admin Portal - Secure Access</p>
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
